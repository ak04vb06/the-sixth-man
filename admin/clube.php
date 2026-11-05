<?php
// Add, edit or delete a club.
require __DIR__ . '/_admin.php';
require_login();

$id = (int) ($_GET['id'] ?? 0);
$club = $id ? get_club($db, $id) : null;
if ($id && !$club) {
    flash('Este clube não existe.', 'error');
    redirect('admin/clubes.php');
}

$data = $club ?? ['clubeNome' => '', 'clubeSobrenome' => '', 'clubeSigla' => '', 'clubeCor' => '#1B2A4A',
                  'clubeConferencia' => 'east', 'clubeVitoriasBase' => 0, 'clubeDerrotasBase' => 0];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    if (isset($_POST['apagar']) && $club) {
        $games = (int) fetch_one($db, 'SELECT COUNT(*) AS n FROM jogos WHERE ? IN (jogoCasaClubeId, jogoForaClubeId)', 'i', [$id])['n'];
        if ($games > 0) {
            flash("Não é possível apagar: este clube tem $games jogo(s) registado(s). Apague primeiro os jogos.", 'error');
            redirect('admin/clube.php?id=' . $id);
        }
        execute($db, 'DELETE FROM clubes WHERE clubeId = ?', 'i', [$id]);
        flash('Clube apagado.');
        redirect('admin/clubes.php');
    }

    $data = [
        'clubeNome' => trim((string) ($_POST['nome'] ?? '')),
        'clubeSobrenome' => trim((string) ($_POST['sobrenome'] ?? '')),
        'clubeSigla' => strtoupper(trim((string) ($_POST['sigla'] ?? ''))),
        'clubeCor' => (string) ($_POST['cor'] ?? ''),
        'clubeConferencia' => (string) ($_POST['conferencia'] ?? ''),
        'clubeVitoriasBase' => (int) ($_POST['vitorias'] ?? 0),
        'clubeDerrotasBase' => (int) ($_POST['derrotas'] ?? 0),
    ];

    if ($data['clubeNome'] === '' || $data['clubeSobrenome'] === '') $errors[] = 'Indique a cidade e o nome do clube.';
    if (!preg_match('/^[A-Z0-9]{3}$/', $data['clubeSigla'])) $errors[] = 'A sigla tem de ter exatamente 3 letras (ex.: BOS).';
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $data['clubeCor'])) $errors[] = 'Escolha uma cor válida.';
    if (!in_array($data['clubeConferencia'], ['east', 'west'], true)) $errors[] = 'Escolha a conferência.';
    if ($data['clubeVitoriasBase'] < 0 || $data['clubeDerrotasBase'] < 0) $errors[] = 'As vitórias e derrotas não podem ser negativas.';

    if (!$errors) {
        $values = [$data['clubeNome'], $data['clubeSobrenome'], $data['clubeSigla'], $data['clubeCor'],
                   $data['clubeConferencia'], $data['clubeVitoriasBase'], $data['clubeDerrotasBase']];
        if ($club) {
            execute($db, 'UPDATE clubes SET clubeNome = ?, clubeSobrenome = ?, clubeSigla = ?, clubeCor = ?, clubeConferencia = ?,
                clubeVitoriasBase = ?, clubeDerrotasBase = ? WHERE clubeId = ?', 'sssssiii', [...$values, $id]);
            flash('Clube guardado.');
        } else {
            execute($db, 'INSERT INTO clubes (clubeNome, clubeSobrenome, clubeSigla, clubeCor, clubeConferencia,
                clubeVitoriasBase, clubeDerrotasBase) VALUES (?, ?, ?, ?, ?, ?, ?)', 'sssssii', $values);
            flash('Clube adicionado.');
        }
        redirect('admin/clubes.php');
    }
}

admin_header($club ? 'Editar clube' : 'Adicionar clube', 'clubes');
?>
<div class="toolbar"><h1><?= $club ? 'Editar ' . e($club['clubeSobrenome']) : 'Adicionar clube' ?></h1></div>
<?php form_errors($errors); ?>
<form class="form" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <label>Cidade <input name="nome" required maxlength="45" value="<?= e($data['clubeNome']) ?>"></label>
        <label>Nome <input name="sobrenome" required maxlength="45" value="<?= e($data['clubeSobrenome']) ?>"></label>
    </div>
    <div class="row">
        <label>Sigla <input name="sigla" required maxlength="3" pattern="[A-Za-z0-9]{3}" value="<?= e($data['clubeSigla']) ?>">
            <span class="hint">3 letras, aparece no emblema.</span></label>
        <label>Cor <input type="color" name="cor" value="<?= e($data['clubeCor']) ?>"></label>
        <label>Conferência
            <select name="conferencia">
                <option value="east"<?= $data['clubeConferencia'] === 'east' ? ' selected' : '' ?>>Este</option>
                <option value="west"<?= $data['clubeConferencia'] === 'west' ? ' selected' : '' ?>>Oeste</option>
            </select>
        </label>
    </div>
    <fieldset>
        <legend>Registo anterior</legend>
        <p class="hint">Vitórias e derrotas da época antes do primeiro jogo registado neste site. Deixe 0 se registar todos os jogos.</p>
        <div class="row">
            <label>Vitórias <input type="number" name="vitorias" min="0" value="<?= (int) $data['clubeVitoriasBase'] ?>"></label>
            <label>Derrotas <input type="number" name="derrotas" min="0" value="<?= (int) $data['clubeDerrotasBase'] ?>"></label>
        </div>
    </fieldset>
    <div class="form-actions">
        <button type="submit"><?= $club ? 'Guardar clube' : 'Adicionar clube' ?></button>
        <a href="<?= e(url('admin/clubes.php')) ?>">Cancelar</a>
    </div>
</form>
<?php if ($club): ?>
    <form class="danger-zone" method="post" onsubmit="return confirm('Apagar este clube?')">
        <?= csrf_field() ?>
        <button class="link-danger" name="apagar" value="1">Apagar clube</button>
    </form>
<?php endif; ?>
<?php admin_footer();
