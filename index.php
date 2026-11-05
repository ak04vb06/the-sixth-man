<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout.php';

$lastDay = latest_game_day($db);
$games = $lastDay ? get_games($db, $lastDay, $lastDay) : [];
$news = get_news($db, null, null, 3);
$east = get_standings($db, 'east');
$west = get_standings($db, 'west');

page_header('Início', 'inicio');
?>
<section class="hero" aria-labelledby="hero-title">
    <div class="wrap">
        <div class="hero-head">
            <h1 id="hero-title"><?= $lastDay ? 'Resultados de ' . e(data_pt($lastDay)) : 'Ainda não há jogos' ?></h1>
            <a class="hero-link" href="<?= e(url('jogos.php')) ?>">Todos os jogos</a>
        </div>
        <?php if ($games): ?>
            <div class="hero-games">
                <?php foreach ($games as $g): ?>
                    <?= scoreboard($g, true) ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="wrap home-grid">
    <section aria-labelledby="news-title">
        <div class="section-head">
            <h2 id="news-title">Notícias</h2>
            <a href="<?= e(url('noticias.php')) ?>">Ver todas</a>
        </div>
        <?php foreach ($news as $n): ?>
            <article class="news-row">
                <a class="thumb-link" href="<?= e(url('noticia.php?id=' . $n['noticiaId'])) ?>" tabindex="-1" aria-hidden="true"><?= news_cover($n, 'news-thumb') ?></a>
                <div>
                    <h3><a href="<?= e(url('noticia.php?id=' . $n['noticiaId'])) ?>"><?= e($n['noticiaTitulo']) ?></a></h3>
                    <p><?= e($n['noticiaResumo']) ?></p>
                    <time datetime="<?= e($n['noticiaData']) ?>"><?= e(data_pt($n['noticiaData'])) ?></time>
                </div>
            </article>
        <?php endforeach; ?>
        <?php if (!$news): ?><p class="empty">Ainda não há notícias.</p><?php endif; ?>
    </section>

    <aside aria-labelledby="standings-title">
        <div class="section-head">
            <h2 id="standings-title">Classificação</h2>
            <a href="<?= e(url('classificacao.php')) ?>">Completa</a>
        </div>
        <?= standings_table($east, 'Conferência Este', 6) ?>
        <?= standings_table($west, 'Conferência Oeste', 6) ?>
    </aside>
</div>
<?php page_footer();
