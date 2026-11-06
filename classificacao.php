<?php
// Standings page: both conferences, calculated from the games (see get_standings()).
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout.php';

page_header('Classificação', 'classificacao');
?>
<div class="wrap page">
    <h1>Classificação 2026-27</h1>
    <p class="legend"><span class="key playoff"></span>Playoffs (1.º a 6.º) <span class="key playin"></span>Play-in (7.º a 10.º)</p>
    <div class="standings-grid">
        <?= standings_table(get_standings($db, 'east'), 'Conferência Este') ?>
        <?= standings_table(get_standings($db, 'west'), 'Conferência Oeste') ?>
    </div>
</div>
<?php page_footer();
