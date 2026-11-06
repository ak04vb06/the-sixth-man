<?php
// One news article. Unknown id = 404 page.
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout.php';

$news = get_news_item($db, (int) ($_GET['id'] ?? 0));
if (!$news) {
    http_response_code(404);
    page_header('Notícia não encontrada', 'noticias');
    echo '<div class="wrap page"><h1>Notícia não encontrada</h1><p class="empty">Esta notícia não existe ou foi apagada. <a href="'
        . e(url('noticias.php')) . '">Ver todas as notícias</a></p></div>';
    page_footer();
    exit;
}

page_header($news['noticiaTitulo'], 'noticias');
?>
<article class="wrap article">
    <a class="back" href="<?= e(url('noticias.php')) ?>">Notícias</a>
    <h1><?= e($news['noticiaTitulo']) ?></h1>
    <p class="lead"><?= e($news['noticiaResumo']) ?></p>
    <time datetime="<?= e($news['noticiaData']) ?>"><?= e(ucfirst(data_pt($news['noticiaData'], true))) ?></time>
    <?php // Photo only if one was uploaded ?>
    <?php if ($news['noticiaImagemURL'] !== ''): ?><?= news_cover($news, 'article-image') ?><?php endif; ?>
    <?php // The text is stored as plain text: paragraphs() escapes it and adds the <p> tags ?>
    <div class="article-body"><?= paragraphs($news['noticiaCorpo']) ?></div>
</article>
<?php page_footer();
