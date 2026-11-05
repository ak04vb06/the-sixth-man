<?php
require __DIR__ . '/_admin.php';
require_login();

$count = fn(string $table) => (int) fetch_one($db, "SELECT COUNT(*) AS n FROM $table")['n'];
$last = latest_game_day($db);

admin_header('Painel', 'painel');
?>
<div class="toolbar">
    <h1>Painel</h1>
    <a class="button" href="<?= e(url('admin/jogo.php')) ?>">Registar jogo</a>
</div>
<div class="stats">
    <a class="stat" href="<?= e(url('admin/jogos.php')) ?>"><b><?= $count('jogos') ?></b><span>jogos registados</span></a>
    <a class="stat" href="<?= e(url('admin/clubes.php')) ?>"><b><?= $count('clubes') ?></b><span>clubes</span></a>
    <a class="stat" href="<?= e(url('admin/noticias.php')) ?>"><b><?= $count('noticias') ?></b><span>notícias</span></a>
</div>
<p>Último jogo registado: <?= $last ? e(data_pt($last)) : 'nenhum' ?>. A classificação é calculada automaticamente a partir dos jogos.</p>
<?php admin_footer();
