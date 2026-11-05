<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/layout.php';

$from = valid_date($_GET['de'] ?? null);
$to = valid_date($_GET['ate'] ?? null);
$games = get_games($db, $from, $to);

$byDay = [];
foreach ($games as $g) {
    $byDay[$g['jogoData']][] = $g;
}

page_header('Jogos', 'jogos');
?>
<div class="wrap page">
    <h1>Jogos</h1>
    <form class="filter" method="get">
        <label>De <input type="date" name="de" value="<?= e($from) ?>"></label>
        <label>Até <input type="date" name="ate" value="<?= e($to) ?>"></label>
        <button type="submit">Filtrar</button>
        <?php if ($from || $to): ?><a href="<?= e(url('jogos.php')) ?>">Limpar</a><?php endif; ?>
    </form>

    <?php foreach ($byDay as $day => $dayGames): ?>
        <section class="day">
            <h2><?= e(ucfirst(data_pt($day, true))) ?></h2>
            <div class="day-games">
                <?php foreach ($dayGames as $g): ?>
                    <div class="game"><?= scoreboard($g) ?><?= quarters_table($g) ?></div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
    <?php if (!$games): ?><p class="empty">Não há jogos entre estas datas. Escolha outro intervalo.</p><?php endif; ?>
</div>
<?php page_footer();
