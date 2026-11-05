<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout.php';

$news = get_news($db);

page_header('Notícias', 'noticias');
?>
<div class="wrap page">
    <h1>Notícias</h1>
    <div class="news-grid">
        <?php foreach ($news as $n): ?>
            <article class="news-card">
                <a class="thumb-link" href="<?= e(url('noticia.php?id=' . $n['noticiaId'])) ?>" tabindex="-1" aria-hidden="true"><?= news_cover($n, 'news-image') ?></a>
                <time datetime="<?= e($n['noticiaData']) ?>"><?= e(data_pt($n['noticiaData'])) ?></time>
                <h2><a href="<?= e(url('noticia.php?id=' . $n['noticiaId'])) ?>"><?= e($n['noticiaTitulo']) ?></a></h2>
                <p><?= e($n['noticiaResumo']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
    <?php if (!$news): ?><p class="empty">Ainda não há notícias.</p><?php endif; ?>
</div>
<?php page_footer();
