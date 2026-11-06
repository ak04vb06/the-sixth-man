<?php
// All SQL lives here, always with prepared statements when a value comes from outside.

/**
 * Runs a SELECT with prepared statement and returns all rows.
 * $types: one letter per value, 's' = string, 'i' = integer. Example: 'si' for [$name, $id].
 */
function fetch_all(mysqli $db, string $sql, string $types = '', array $params = []): array
{
    $stmt = $db->prepare($sql);
    if ($types !== '') {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

/** First row of a SELECT, or null. */
function fetch_one(mysqli $db, string $sql, string $types = '', array $params = []): ?array
{
    return fetch_all($db, $sql, $types, $params)[0] ?? null;
}

/** INSERT, UPDATE or DELETE. Returns the new id after an INSERT, otherwise the number of rows changed. */
function execute(mysqli $db, string $sql, string $types = '', array $params = []): int
{
    $stmt = $db->prepare($sql);
    if ($types !== '') {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    return $stmt->insert_id ?: $stmt->affected_rows;
}

// -- Games --------------------------------------------------------------------

// Games with both teams: the clubs table is joined twice (c = home, f = away)
const GAME_SELECT = "SELECT j.*,
        c.clubeNome AS casaNome, c.clubeSobrenome AS casaSobrenome, c.clubeSigla AS casaSigla, c.clubeCor AS casaCor,
        f.clubeNome AS foraNome, f.clubeSobrenome AS foraSobrenome, f.clubeSigla AS foraSigla, f.clubeCor AS foraCor
    FROM jogos j
    JOIN clubes c ON c.clubeId = j.jogoCasaClubeId
    JOIN clubes f ON f.clubeId = j.jogoForaClubeId";

/** Games between two dates (both optional), newest first, with their quarter scores. */
function get_games(mysqli $db, ?string $from = null, ?string $to = null, ?int $limit = null): array
{
    $sql = GAME_SELECT . ' WHERE j.jogoData BETWEEN ? AND ? ORDER BY j.jogoData DESC, j.jogoId DESC';
    if ($limit) {
        $sql .= ' LIMIT ' . (int) $limit;
    }
    // No date given = no limit on that side
    $games = fetch_all($db, $sql, 'ss', [$from ?? '1900-01-01', $to ?? '2999-12-31']);
    return attach_quarters($db, $games);
}

function get_game(mysqli $db, int $id): ?array
{
    $game = fetch_one($db, GAME_SELECT . ' WHERE j.jogoId = ?', 'i', [$id]);
    return $game ? attach_quarters($db, [$game])[0] : null;
}

/** Adds $game['quartos'] = ['q1' => [home, away], ...] to each game, with ONE query for all games. */
function attach_quarters(mysqli $db, array $games): array
{
    if (!$games) {
        return [];
    }
    $ids = array_column($games, 'jogoId');
    $marks = implode(',', array_fill(0, count($ids), '?'));
    $rows = fetch_all($db, "SELECT * FROM parciais WHERE parcialJogoId IN ($marks) ORDER BY parcialQuarto",
        str_repeat('i', count($ids)), $ids);
    $byGame = [];
    foreach ($rows as $r) {
        $byGame[$r['parcialJogoId']][$r['parcialQuarto']] = [$r['parcialCasaPontos'], $r['parcialForaPontos']];
    }
    foreach ($games as &$g) {
        $g['quartos'] = $byGame[$g['jogoId']] ?? [];
    }
    return $games;
}

function latest_game_day(mysqli $db): ?string
{
    return fetch_one($db, 'SELECT MAX(jogoData) AS d FROM jogos')['d'] ?? null;
}

// -- Standings ----------------------------------------------------------------

/**
 * Standings of one conference: wins, losses, win percentage and games behind the leader.
 * Wins and losses = record before the site started (clubeVitoriasBase/DerrotasBase) + games registered.
 * Teams without games stay at the bottom instead of breaking the division.
 */
function get_standings(mysqli $db, string $conference): array
{
    // For each club, count the games it won and lost, at home or away
    $teams = fetch_all($db, "SELECT c.*,
            SUM(CASE WHEN (j.jogoCasaClubeId = c.clubeId AND j.jogoResultadoCasa > j.jogoResultadoFora)
                       OR (j.jogoForaClubeId = c.clubeId AND j.jogoResultadoFora > j.jogoResultadoCasa) THEN 1 ELSE 0 END) AS vitorias,
            SUM(CASE WHEN (j.jogoCasaClubeId = c.clubeId AND j.jogoResultadoCasa < j.jogoResultadoFora)
                       OR (j.jogoForaClubeId = c.clubeId AND j.jogoResultadoFora < j.jogoResultadoCasa) THEN 1 ELSE 0 END) AS derrotas
        FROM clubes c
        LEFT JOIN jogos j ON c.clubeId IN (j.jogoCasaClubeId, j.jogoForaClubeId)
        WHERE c.clubeConferencia = ?
        GROUP BY c.clubeId", 's', [$conference]);

    foreach ($teams as &$t) {
        $t['vitorias'] = (int) $t['vitorias'] + (int) $t['clubeVitoriasBase'];
        $t['derrotas'] = (int) $t['derrotas'] + (int) $t['clubeDerrotasBase'];
        $played = $t['vitorias'] + $t['derrotas'];
        $t['pct'] = $played ? $t['vitorias'] / $played : 0.0;
    }
    unset($t);

    // Best win percentage first; same percentage: more wins first, then alphabetical
    usort($teams, fn($a, $b) => [$b['pct'], $b['vitorias'], $a['clubeNome']] <=> [$a['pct'], $a['vitorias'], $b['clubeNome']]);

    $leader = $teams[0] ?? null;
    foreach ($teams as &$t) {
        $t['atraso'] = $leader ? (($leader['vitorias'] - $t['vitorias']) + ($t['derrotas'] - $leader['derrotas'])) / 2 : 0;
    }
    return $teams;
}

/** 0.75 -> ".750", the usual way to write a win percentage */
function format_pct(float $pct): string
{
    return $pct >= 1 ? '1.000' : '.' . str_pad((string) round($pct * 1000), 3, '0', STR_PAD_LEFT);
}

// -- News ---------------------------------------------------------------------

function get_news(mysqli $db, ?string $from = null, ?string $to = null, ?int $limit = null): array
{
    $sql = 'SELECT * FROM noticias WHERE noticiaData BETWEEN ? AND ? ORDER BY noticiaData DESC, noticiaId DESC';
    if ($limit) {
        $sql .= ' LIMIT ' . (int) $limit;
    }
    return fetch_all($db, $sql, 'ss', [$from ?? '1900-01-01', $to ?? '2999-12-31']);
}

function get_news_item(mysqli $db, int $id): ?array
{
    return fetch_one($db, 'SELECT * FROM noticias WHERE noticiaId = ?', 'i', [$id]);
}

// -- Clubs --------------------------------------------------------------------

function get_clubs(mysqli $db): array
{
    return fetch_all($db, 'SELECT c.*, (SELECT COUNT(*) FROM jogos j
            WHERE c.clubeId IN (j.jogoCasaClubeId, j.jogoForaClubeId)) AS jogos
        FROM clubes c ORDER BY c.clubeConferencia, c.clubeNome');
}

function get_club(mysqli $db, int $id): ?array
{
    return fetch_one($db, 'SELECT * FROM clubes WHERE clubeId = ?', 'i', [$id]);
}
