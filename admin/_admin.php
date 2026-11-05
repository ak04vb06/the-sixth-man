<?php
// Shared by every admin page: login check and admin layout.

require dirname(__DIR__) . '/includes/bootstrap.php';
require dirname(__DIR__) . '/includes/layout.php';

const ADMIN_NAV = [
    'painel'   => ['Painel', 'admin/index.php'],
    'jogos'    => ['Jogos', 'admin/jogos.php'],
    'clubes'   => ['Clubes', 'admin/clubes.php'],
    'noticias' => ['Notícias', 'admin/noticias.php'],
];

function require_login(): void
{
    if (empty($_SESSION['admin'])) {
        redirect('admin/login.php');
    }
}

function admin_header(string $title, string $active): void
{
    ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title><?= e($title) ?> | Administração</title>
    <link rel="stylesheet" href="<?= e(url('assets/css/site.css')) ?>">
</head>
<body>
<header class="admin-header">
    <div class="wrap header-row">
        <a class="brand" href="<?= e(url('admin/index.php')) ?>"><?= brand_mark() ?><span>The Sixth Man<small>admin</small></span></a>
        <nav aria-label="Administração">
            <?php foreach (ADMIN_NAV as $key => [$label, $href]): ?>
                <a href="<?= e(url($href)) ?>"<?= $key === $active ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
            <?php endforeach; ?>
            <a href="<?= e(url('index.php')) ?>" target="_blank">Ver site</a>
            <a href="<?= e(url('admin/logout.php')) ?>">Sair (<?= e($_SESSION['admin']['nome']) ?>)</a>
        </nav>
    </div>
</header>
<main class="wrap page">
    <?php if ($flash = take_flash()): ?>
        <p class="notice <?= e($flash['type']) ?>" role="status"><?= e($flash['message']) ?></p>
    <?php endif;
}

function admin_footer(): void
{
    echo "</main>\n</body>\n</html>\n";
}

function form_errors(array $errors): void
{
    if ($errors) {
        echo '<div class="notice error" role="alert"><ul class="errors">';
        foreach ($errors as $error) {
            echo '<li>' . e($error) . '</li>';
        }
        echo '</ul></div>';
    }
}
