<?php
require __DIR__ . '/_admin.php';
require_login();

$news = get_news($db);
admin_header('Notícias', 'noticias');
?>
<div class="toolbar">
    <h1>Notícias</h1>
    <a class="button" href="<?= e(url('admin/noticia.php')) ?>">Escrever notícia</a>
</div>
<table class="list">
    <thead><tr><th scope="col">Data</th><th scope="col">Título</th><th scope="col" class="hide-sm">Imagem</th><th scope="col"><span class="sr">Ações</span></th></tr></thead>
    <tbody>
    <?php foreach ($news as $n): ?>
        <tr>
            <td><?= e(data_curta($n['noticiaData'])) ?></td>
            <td><?= e($n['noticiaTitulo']) ?></td>
            <td class="hide-sm"><?= $n['noticiaImagemURL'] !== '' ? 'Sim' : '—' ?></td>
            <td class="actions"><a href="<?= e(url('noticia.php?id=' . $n['noticiaId'])) ?>" target="_blank">Ver</a><a href="<?= e(url('admin/noticia.php?id=' . $n['noticiaId'])) ?>">Editar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php if (!$news): ?><p class="empty">Ainda não há notícias. Escreva a primeira.</p><?php endif; ?>
<?php admin_footer();
