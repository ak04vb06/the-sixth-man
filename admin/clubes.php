<?php
require __DIR__ . '/_admin.php';
require_login();

$clubs = get_clubs($db);
admin_header('Clubes', 'clubes');
?>
<div class="toolbar">
    <h1>Clubes</h1>
    <a class="button" href="<?= e(url('admin/clube.php')) ?>">Adicionar clube</a>
</div>
<table class="list">
    <thead><tr><th scope="col">Clube</th><th scope="col">Conferência</th><th scope="col" class="num hide-sm">Jogos</th><th scope="col"><span class="sr">Ações</span></th></tr></thead>
    <tbody>
    <?php foreach ($clubs as $c): ?>
        <tr>
            <td><span class="cell-team"><?= team_badge($c, 'clube') ?><?= e($c['clubeNome'] . ' ' . $c['clubeSobrenome']) ?></span></td>
            <td><?= $c['clubeConferencia'] === 'east' ? 'Este' : 'Oeste' ?></td>
            <td class="num hide-sm"><?= (int) $c['jogos'] ?></td>
            <td class="actions"><a href="<?= e(url('admin/clube.php?id=' . $c['clubeId'])) ?>">Editar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php admin_footer();
