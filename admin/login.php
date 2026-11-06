<?php
require dirname(__DIR__) . '/includes/bootstrap.php';
require dirname(__DIR__) . '/includes/layout.php';

// First visit: no account yet, so this page creates the first administrator.
$firstRun = (int) fetch_one($db, 'SELECT COUNT(*) AS n FROM utilizadores')['n'] === 0;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $name = trim((string) ($_POST['nome'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    // First run: create the account, then log in with it just below
    if ($firstRun) {
        if (strlen($name) < 3 || strlen($password) < 8) {
            $error = 'Escolha um nome com pelo menos 3 caracteres e uma palavra-passe com pelo menos 8.';
        } elseif ($password !== ($_POST['confirmar'] ?? '')) {
            $error = 'As duas palavras-passe não são iguais.';
        } else {
            execute($db, 'INSERT INTO utilizadores (utilizadorNome, utilizadorPassword) VALUES (?, ?)', 'ss',
                [$name, password_hash($password, PASSWORD_DEFAULT)]);
            $firstRun = false;
        }
    }

    if (!$firstRun && $error === '') {
        // password_verify() compares with the hash stored by password_hash()
        $user = fetch_one($db, 'SELECT * FROM utilizadores WHERE utilizadorNome = ?', 's', [$name]);
        if ($user && password_verify($password, $user['utilizadorPassword'])) {
            session_regenerate_id(true);   // new session id at login (prevents session fixation)
            $_SESSION['admin'] = ['id' => $user['utilizadorId'], 'nome' => $user['utilizadorNome']];
            redirect('admin/index.php');
        }
        usleep(500000); // slows down password guessing
        $error = 'Nome ou palavra-passe incorretos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Entrar | Administração</title>
    <link rel="stylesheet" href="<?= e(url('assets/css/site.css')) ?>">
</head>
<body>
<main class="login">
    <a class="brand" href="<?= e(url('index.php')) ?>"><?= brand_mark() ?><span>The Sixth Man</span></a>
    <h1><?= $firstRun ? 'Criar a conta de administrador' : 'Entrar na administração' ?></h1>
    <?php if ($firstRun): ?><p>Ainda não existe nenhuma conta. Esta será a conta principal.</p><?php endif; ?>
    <?php if ($error): ?><p class="notice error" role="alert"><?= e($error) ?></p><?php endif; ?>
    <form class="form" method="post">
        <?= csrf_field() ?>
        <label>Nome de utilizador <input name="nome" autocomplete="username" required value="<?= e($_POST['nome'] ?? '') ?>"></label>
        <label>Palavra-passe <input type="password" name="password" autocomplete="<?= $firstRun ? 'new-password' : 'current-password' ?>" required></label>
        <?php if ($firstRun): ?>
            <label>Confirmar palavra-passe <input type="password" name="confirmar" autocomplete="new-password" required></label>
        <?php endif; ?>
        <div class="form-actions"><button type="submit"><?= $firstRun ? 'Criar conta' : 'Entrar' ?></button></div>
    </form>
</main>
</body>
</html>
