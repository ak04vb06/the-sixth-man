<?php
require __DIR__ . '/_admin.php';
require_login();

$games = get_games($db);
admin_header('Jogos', 'jogos');
?>
<div class="toolbar">
    <h1>Jogos</h1>
    <a class="button" href="<?= e(url('admin/jogo.php')) ?>">Registar jogo</a>
</div>
<table class="list">
    <thead><tr><th scope="col">Data</th><th scope="col">Casa</th><th scope="col" class="num">Resultado</th><th scope="col">Fora</th>
        <th scope="col" class="hide-sm">Parciais</th><th scope="col"><span class="sr">Ações</span></th></tr></thead>
    <tbody>
    <?php foreach ($games as $g): ?>
        <tr>
            <td><?= e(data_curta($g['jogoData'])) ?></td>
            <td><span class="cell-team"><?= team_badge($g, 'casa') ?><span class="hide-sm"><?= e($g['casaSobrenome']) ?></span></span></td>
            <td class="num"><?= (int) $g['jogoResultadoCasa'] ?>-<?= (int) $g['jogoResultadoFora'] ?></td>
            <td><span class="cell-team"><?= team_badge($g, 'fora') ?><span class="hide-sm"><?= e($g['foraSobrenome']) ?></span></span></td>
            <td class="hide-sm"><?= count($g['quartos']) === 4 ? 'Sim' : '—' ?></td>
            <td class="actions"><a href="<?= e(url('admin/jogo.php?id=' . $g['jogoId'])) ?>">Editar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php if (!$games): ?><p class="empty">Ainda não há jogos. Registe o primeiro.</p><?php endif; ?>
<?php admin_footer();
