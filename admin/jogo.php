<?php
// Register, edit or delete a game, with optional quarter scores.
require __DIR__ . '/_admin.php';
require_login();

const QUARTERS = ['q1' => '1.º período', 'q2' => '2.º período', 'q3' => '3.º período', 'q4' => '4.º período'];

$id = (int) ($_GET['id'] ?? 0);
$game = $id ? get_game($db, $id) : null;
if ($id && !$game) {
    flash('Este jogo não existe.', 'error');
    redirect('admin/jogos.php');
}

$clubs = get_clubs($db);
$clubIds = array_map('intval', array_column($clubs, 'clubeId'));
$data = $game ?? ['jogoData' => date('Y-m-d'), 'jogoCasaClubeId' => 0, 'jogoForaClubeId' => 0,
                  'jogoResultadoCasa' => '', 'jogoResultadoFora' => '', 'quartos' => []];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    if (isset($_POST['apagar']) && $game) {
        execute($db, 'DELETE FROM jogos WHERE jogoId = ?', 'i', [$id]); // quarters are deleted with it (ON DELETE CASCADE)
        flash('Jogo apagado.');
        redirect('admin/jogos.php');
    }

    $num = fn($v) => ($v === '' || $v === null) ? null : (ctype_digit((string) $v) ? (int) $v : -1);
    $data = [
        'jogoData' => (string) ($_POST['data'] ?? ''),
        'jogoCasaClubeId' => (int) ($_POST['casa'] ?? 0),
        'jogoForaClubeId' => (int) ($_POST['fora'] ?? 0),
        'jogoResultadoCasa' => $num($_POST['pontos_casa'] ?? ''),
        'jogoResultadoFora' => $num($_POST['pontos_fora'] ?? ''),
        'quartos' => [],
    ];
    foreach (QUARTERS as $q => $label) {
        $h = $num($_POST[$q . '_casa'] ?? '');
        $a = $num($_POST[$q . '_fora'] ?? '');
        if ($h !== null || $a !== null) {
            $data['quartos'][$q] = [$h, $a];
        }
    }

    if (!valid_date($data['jogoData'])) $errors[] = 'Indique uma data válida.';
    if (!in_array($data['jogoCasaClubeId'], $clubIds, true) || !in_array($data['jogoForaClubeId'], $clubIds, true)) $errors[] = 'Escolha as duas equipas.';
    elseif ($data['jogoCasaClubeId'] === $data['jogoForaClubeId']) $errors[] = 'Uma equipa não pode jogar contra si própria.';
    if ($data['jogoResultadoCasa'] === null || $data['jogoResultadoFora'] === null
        || $data['jogoResultadoCasa'] < 0 || $data['jogoResultadoFora'] < 0) $errors[] = 'Indique os pontos das duas equipas (números inteiros).';
    elseif ($data['jogoResultadoCasa'] === $data['jogoResultadoFora']) $errors[] = 'No basquetebol não há empates: verifique o resultado.';

    if ($data['quartos']) {
        $complete = count($data['quartos']) === 4
            && !array_filter($data['quartos'], fn($p) => $p[0] === null || $p[1] === null || $p[0] < 0 || $p[1] < 0);
        if (!$complete) {
            $errors[] = 'Preencha os quatro períodos para as duas equipas, ou deixe-os todos vazios.';
        } elseif (!$errors) {
            $sumHome = array_sum(array_column($data['quartos'], 0));
            $sumAway = array_sum(array_column($data['quartos'], 1));
            if ($sumHome > $data['jogoResultadoCasa'] || $sumAway > $data['jogoResultadoFora']) {
                $errors[] = "A soma dos períodos ($sumHome-$sumAway) é superior ao resultado final.";
            }
        }
    }

    if (!$errors) {
        $db->begin_transaction();
        $values = [$data['jogoData'], $data['jogoResultadoCasa'], $data['jogoResultadoFora'], $data['jogoCasaClubeId'], $data['jogoForaClubeId']];
        if ($game) {
            execute($db, 'UPDATE jogos SET jogoData = ?, jogoResultadoCasa = ?, jogoResultadoFora = ?, jogoCasaClubeId = ?,
                jogoForaClubeId = ? WHERE jogoId = ?', 'siiiii', [...$values, $id]);
        } else {
            $id = execute($db, 'INSERT INTO jogos (jogoData, jogoResultadoCasa, jogoResultadoFora, jogoCasaClubeId, jogoForaClubeId)
                VALUES (?, ?, ?, ?, ?)', 'siiii', $values);
        }
        execute($db, 'DELETE FROM parciais WHERE parcialJogoId = ?', 'i', [$id]);
        foreach ($data['quartos'] as $q => [$h, $a]) {
            execute($db, 'INSERT INTO parciais (parcialQuarto, parcialCasaPontos, parcialForaPontos, parcialJogoId) VALUES (?, ?, ?, ?)',
                'siii', [$q, $h, $a, $id]);
        }
        $db->commit();
        flash($game ? 'Jogo guardado. A classificação foi atualizada.' : 'Jogo registado. A classificação foi atualizada.');
        redirect('admin/jogos.php');
    }
}

function club_options(array $clubs, int $selected): string
{
    $html = '<option value="">Escolher equipa</option>';
    foreach (['east' => 'Conferência Este', 'west' => 'Conferência Oeste'] as $conf => $label) {
        $html .= '<optgroup label="' . $label . '">';
        foreach ($clubs as $c) {
            if ($c['clubeConferencia'] === $conf) {
                $html .= '<option value="' . (int) $c['clubeId'] . '"' . ((int) $c['clubeId'] === $selected ? ' selected' : '') . '>'
                    . e($c['clubeNome'] . ' ' . $c['clubeSobrenome']) . '</option>';
            }
        }
        $html .= '</optgroup>';
    }
    return $html;
}

$quarter = fn(string $q, int $side) => e((string) ($data['quartos'][$q][$side] ?? ''));

admin_header($game ? 'Editar jogo' : 'Registar jogo', 'jogos');
?>
<div class="toolbar"><h1><?= $game ? 'Editar jogo' : 'Registar jogo' ?></h1></div>
<?php form_errors($errors); ?>
<form class="form" method="post">
    <?= csrf_field() ?>
    <label>Data <input type="date" name="data" required value="<?= e($data['jogoData']) ?>"></label>
    <div class="row">
        <label>Equipa da casa <select name="casa" required><?= club_options($clubs, (int) $data['jogoCasaClubeId']) ?></select></label>
        <label>Pontos <input type="number" name="pontos_casa" min="0" required value="<?= e((string) $data['jogoResultadoCasa']) ?>"></label>
    </div>
    <div class="row">
        <label>Equipa visitante <select name="fora" required><?= club_options($clubs, (int) $data['jogoForaClubeId']) ?></select></label>
        <label>Pontos <input type="number" name="pontos_fora" min="0" required value="<?= e((string) $data['jogoResultadoFora']) ?>"></label>
    </div>
    <fieldset>
        <legend>Parciais (opcional)</legend>
        <p class="hint">Pontos por período: casa e visitante. Com prolongamento, a soma pode ser inferior ao resultado final.</p>
        <?php foreach (QUARTERS as $q => $label): ?>
            <div class="row">
                <label><?= e($label) ?>, casa <input type="number" min="0" name="<?= $q ?>_casa" value="<?= $quarter($q, 0) ?>"></label>
                <label><?= e($label) ?>, visitante <input type="number" min="0" name="<?= $q ?>_fora" value="<?= $quarter($q, 1) ?>"></label>
            </div>
        <?php endforeach; ?>
    </fieldset>
    <div class="form-actions">
        <button type="submit"><?= $game ? 'Guardar jogo' : 'Registar jogo' ?></button>
        <a href="<?= e(url('admin/jogos.php')) ?>">Cancelar</a>
    </div>
</form>
<?php if ($game): ?>
    <form class="danger-zone" method="post" onsubmit="return confirm('Apagar este jogo? A classificação será recalculada.')">
        <?= csrf_field() ?>
        <button class="link-danger" name="apagar" value="1">Apagar jogo</button>
    </form>
<?php endif; ?>
<?php admin_footer();
