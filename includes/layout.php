<?php
// Header and footer shared by the public pages.

const NAV = [
    'inicio'        => ['Início', 'index.php'],
    'jogos'         => ['Jogos', 'jogos.php'],
    'classificacao' => ['Classificação', 'classificacao.php'],
    'noticias'      => ['Notícias', 'noticias.php'],
];

function brand_mark(): string
{
    // A basketball drawn in SVG: the only "logo" of the site, no third-party branding.
    return '<svg class="mark" viewBox="0 0 32 32" aria-hidden="true"><circle cx="16" cy="16" r="15" fill="var(--ball)"/>'
        . '<path d="M1 16h30M16 1v30M5 5c6 5 6 17 0 22M27 5c-6 5-6 17 0 22" fill="none" stroke="var(--ink)" stroke-width="1.6"/></svg>';
}

function page_header(string $title, string $active): void
{
    ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?> | The Sixth Man</title>
    <link rel="stylesheet" href="<?= e(url('assets/css/site.css')) ?>">
    <link rel="icon" href="data:image/svg+xml,<?= rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><circle cx="16" cy="16" r="15" fill="#E8601C"/><path d="M1 16h30M16 1v30M5 5c6 5 6 17 0 22M27 5c-6 5-6 17 0 22" fill="none" stroke="#15203A" stroke-width="1.6"/></svg>') ?>">
</head>
<body>
<a class="skip" href="#conteudo">Saltar para o conteúdo</a>
<header class="site-header">
    <div class="wrap header-row">
        <a class="brand" href="<?= e(url('index.php')) ?>"><?= show_logos()
            ? '<img class="league-logo" src="' . e(url('assets/logos/league.svg')) . '" alt="">'
            : brand_mark() ?><span>The Sixth Man</span></a>
        <nav aria-label="Principal">
            <?php foreach (NAV as $key => [$label, $href]): ?>
                <a href="<?= e(url($href)) ?>"<?= $key === $active ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>
<main id="conteudo">
    <?php
}

function page_footer(): void
{
    ?>
</main>
<footer class="site-footer">
    <div class="wrap footer-row">
        <p>The Sixth Man. Resultados, classificação e notícias da época 2026-27.</p>
        <p>Projeto de portfólio, sem ligação oficial à liga nem aos clubes.</p>
    </div>
</footer>
</body>
</html>
    <?php
}

/** One game as a scoreboard: home team on top, winner highlighted. */
function scoreboard(array $g, bool $large = false): string
{
    $homeWon = $g['jogoResultadoCasa'] > $g['jogoResultadoFora'];
    $row = function (string $side, int $score, bool $won) use ($g) {
        return '<div class="line' . ($won ? ' won' : '') . '">'
            . team_badge($g, $side)
            . '<span class="team"><span class="city">' . e($g[$side . 'Nome']) . '</span> ' . e($g[$side . 'Sobrenome']) . '</span>'
            . '<span class="score">' . $score . '</span></div>';
    };
    return '<div class="board' . ($large ? ' board-large' : '') . '">'
        . $row('casa', (int) $g['jogoResultadoCasa'], $homeWon)
        . $row('fora', (int) $g['jogoResultadoFora'], !$homeWon)
        . '</div>';
}

/** Quarter-by-quarter table, only when the quarters were registered. */
function quarters_table(array $g): string
{
    if (count($g['quartos']) < 4) {
        return '';
    }
    $cells = fn(int $i) => implode('', array_map(fn($q) => '<td>' . (int) $g['quartos'][$q][$i] . '</td>', ['q1', 'q2', 'q3', 'q4']));
    return '<details class="quarters"><summary>Parciais</summary><table>'
        . '<thead><tr><th scope="col">Equipa</th><th scope="col">1.º</th><th scope="col">2.º</th><th scope="col">3.º</th><th scope="col">4.º</th><th scope="col">Final</th></tr></thead><tbody>'
        . '<tr><th scope="row">' . e($g['casaSigla']) . '</th>' . $cells(0) . '<td><b>' . (int) $g['jogoResultadoCasa'] . '</b></td></tr>'
        . '<tr><th scope="row">' . e($g['foraSigla']) . '</th>' . $cells(1) . '<td><b>' . (int) $g['jogoResultadoFora'] . '</b></td></tr>'
        . '</tbody></table></details>';
}

/** Standings table. $limit shows only the top teams (home page). */
function standings_table(array $teams, string $caption, ?int $limit = null): string
{
    $rows = '';
    foreach (array_slice($teams, 0, $limit ?? count($teams)) as $i => $t) {
        $zone = $i < 6 ? 'playoff' : ($i < 10 ? 'playin' : '');
        $rows .= '<tr class="' . $zone . '"><td class="pos">' . ($i + 1) . '</td>'
            . '<th scope="row">' . team_badge($t, 'clube') . '<span class="team"><span class="city">' . e($t['clubeNome']) . '</span> ' . e($t['clubeSobrenome']) . '</span></th>'
            . '<td>' . $t['vitorias'] . '</td><td>' . $t['derrotas'] . '</td>'
            . '<td>' . format_pct($t['pct']) . '</td>'
            . '<td>' . ($t['atraso'] == 0 ? '–' : rtrim(rtrim(number_format($t['atraso'], 1, ',', ''), '0'), ',')) . '</td></tr>';
    }
    return '<table class="standings"><caption>' . e($caption) . '</caption>'
        . '<thead><tr><th scope="col"><span class="sr">Posição</span></th><th scope="col">Equipa</th>'
        . '<th scope="col"><abbr title="Vitórias">V</abbr></th><th scope="col"><abbr title="Derrotas">D</abbr></th>'
        . '<th scope="col"><abbr title="Percentagem de vitórias">%</abbr></th><th scope="col"><abbr title="Jogos de atraso para o líder">JA</abbr></th></tr></thead>'
        . '<tbody>' . $rows . '</tbody></table>';
}
