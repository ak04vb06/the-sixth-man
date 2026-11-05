<?php
// Small helpers shared by the public site and the admin.

/** Escapes text for HTML. Use it for every value that comes from the database or the user. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Base URL of the site, so links work in htdocs/sixthman or at the root of a server. */
function base_url(): string
{
    static $base = null;
    if ($base === null) {
        $dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
        if (basename($dir) === 'admin') {
            $dir = dirname($dir);
        }
        $base = rtrim($dir, '/');
    }
    return $base;
}

function url(string $path = ''): string
{
    return base_url() . '/' . ltrim($path, '/');
}

function redirect(string $path): never
{
    header('Location: ' . url($path));
    exit;
}

/** Dates in Portuguese without depending on the server locale (strftime is removed in PHP 9). */
const MESES = ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho',
               'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];
const DIAS = ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado'];

function data_pt(string $date, bool $withWeekday = false): string
{
    $time = strtotime($date);
    $text = date('j', $time) . ' de ' . MESES[(int) date('n', $time) - 1] . ' de ' . date('Y', $time);
    return $withWeekday ? DIAS[(int) date('w', $time)] . ', ' . $text : $text;
}

function data_curta(string $date): string
{
    $time = strtotime($date);
    return date('j', $time) . ' ' . substr(MESES[(int) date('n', $time) - 1], 0, 3);
}

/** Valid Y-m-d date from user input, or null. */
function valid_date(?string $value): ?string
{
    $d = DateTime::createFromFormat('!Y-m-d', (string) $value);
    return $d && $d->format('Y-m-d') === $value ? $value : null;
}

/** Team badge: three-letter code on the team colour (no copyrighted logos). */
function team_badge(array $team, string $prefix = ''): string
{
    return sprintf(
        '<span class="badge" style="--team:%s" aria-hidden="true">%s</span>',
        e($team[$prefix . 'Cor'] ?? '#1B2A4A'),
        e($team[$prefix . 'Sigla'] ?? '')
    );
}

/** Text typed in the admin, shown as paragraphs. */
function paragraphs(string $text): string
{
    $blocks = preg_split("/\n\s*\n/", trim($text));
    return implode('', array_map(fn($p) => '<p>' . nl2br(e(trim($p))) . '</p>', $blocks));
}

// -- Forms: CSRF protection and flash messages --------------------------------

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf" value="' . csrf_token() . '">';
}

function csrf_check(): void
{
    if (!hash_equals(csrf_token(), (string) ($_POST['csrf'] ?? ''))) {
        http_response_code(400);
        exit('Pedido inválido. Volte atrás e recarregue a página.');
    }
}

function flash(string $message, string $type = 'ok'): void
{
    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
}

function take_flash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

/** Image cover for a news item: the uploaded photo, or a generated cover. */
function news_cover(array $news, string $class = ''): string
{
    if ($news['noticiaImagemURL'] !== '') {
        return '<img class="' . $class . '" src="' . e(url($news['noticiaImagemURL'])) . '" alt="" loading="lazy">';
    }
    return '<div class="cover ' . $class . '" aria-hidden="true"><span>' . e(data_curta($news['noticiaData'])) . '</span></div>';
}
