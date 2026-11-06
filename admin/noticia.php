<?php
// Write, edit or delete a news item, with an optional photo.
require __DIR__ . '/_admin.php';
require_login();

const MAX_IMAGE_BYTES = 3 * 1024 * 1024;
const IMAGE_TYPES = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];

$id = (int) ($_GET['id'] ?? 0);
$news = $id ? get_news_item($db, $id) : null;
if ($id && !$news) {
    flash('Esta notícia não existe.', 'error');
    redirect('admin/noticias.php');
}

$data = $news ?? ['noticiaTitulo' => '', 'noticiaData' => date('Y-m-d'), 'noticiaImagemURL' => '',
                  'noticiaResumo' => '', 'noticiaCorpo' => ''];
$errors = [];

/** Deletes an uploaded photo, only inside uploads/ (never another file). */
function delete_image(string $path): void
{
    if (str_starts_with($path, 'uploads/') && is_file(ROOT . '/' . $path)) {
        unlink(ROOT . '/' . $path);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    if (isset($_POST['apagar']) && $news) {
        execute($db, 'DELETE FROM noticias WHERE noticiaId = ?', 'i', [$id]);
        delete_image($news['noticiaImagemURL']);
        flash('Notícia apagada.');
        redirect('admin/noticias.php');
    }

    $data['noticiaTitulo'] = trim((string) ($_POST['titulo'] ?? ''));
    $data['noticiaData'] = (string) ($_POST['data'] ?? '');
    $data['noticiaResumo'] = trim((string) ($_POST['resumo'] ?? ''));
    $data['noticiaCorpo'] = trim((string) ($_POST['corpo'] ?? ''));

    if ($data['noticiaTitulo'] === '' || mb_strlen($data['noticiaTitulo']) > 255) $errors[] = 'Escreva um título (até 255 caracteres).';
    if (!valid_date($data['noticiaData'])) $errors[] = 'Indique uma data válida.';
    if ($data['noticiaResumo'] === '') $errors[] = 'Escreva um resumo de uma ou duas frases.';
    if ($data['noticiaCorpo'] === '') $errors[] = 'Escreva o texto da notícia.';

    // Photo: checked by its real content, renamed, stored in uploads/
    $newImage = null;
    $file = $_FILES['imagem'] ?? null;
    if ($file && $file['error'] !== UPLOAD_ERR_NO_FILE) {
        $type = '';
        if ($file['error'] === UPLOAD_ERR_OK) {
            $type = class_exists('finfo')
                ? (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name'])
                : (getimagesize($file['tmp_name'])['mime'] ?? '');
        }
        if ($file['error'] !== UPLOAD_ERR_OK || $file['size'] > MAX_IMAGE_BYTES) {
            $errors[] = 'A imagem não foi enviada. Use uma imagem com menos de 3 MB.';
        } elseif (!isset(IMAGE_TYPES[$type]) || !getimagesize($file['tmp_name'])) {
            $errors[] = 'A imagem tem de ser JPG, PNG ou WebP.';
        } else {
            $newImage = 'uploads/' . bin2hex(random_bytes(8)) . '.' . IMAGE_TYPES[$type];
        }
    }

    // Save: move the new photo into uploads/, update the row, then delete the replaced photo
    if (!$errors) {
        $oldImage = $data['noticiaImagemURL'];
        if ($newImage) {
            move_uploaded_file($file['tmp_name'], ROOT . '/' . $newImage);
            $data['noticiaImagemURL'] = $newImage;
        } elseif (isset($_POST['remover_imagem'])) {
            $data['noticiaImagemURL'] = '';
        }

        $values = [$data['noticiaTitulo'], $data['noticiaData'], $data['noticiaImagemURL'], $data['noticiaResumo'], $data['noticiaCorpo']];
        if ($news) {
            execute($db, 'UPDATE noticias SET noticiaTitulo = ?, noticiaData = ?, noticiaImagemURL = ?, noticiaResumo = ?, noticiaCorpo = ?
                WHERE noticiaId = ?', 'sssssi', [...$values, $id]);
        } else {
            $id = execute($db, 'INSERT INTO noticias (noticiaTitulo, noticiaData, noticiaImagemURL, noticiaResumo, noticiaCorpo)
                VALUES (?, ?, ?, ?, ?)', 'sssss', $values);
        }
        if ($oldImage !== $data['noticiaImagemURL']) {
            delete_image($oldImage);
        }
        flash($news ? 'Notícia guardada.' : 'Notícia publicada.');
        redirect('admin/noticias.php');
    }
}

admin_header($news ? 'Editar notícia' : 'Escrever notícia', 'noticias');
?>
<div class="toolbar"><h1><?= $news ? 'Editar notícia' : 'Escrever notícia' ?></h1></div>
<?php form_errors($errors); ?>
<form class="form" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <label>Título <input name="titulo" required maxlength="255" value="<?= e($data['noticiaTitulo']) ?>"></label>
    <label>Data <input type="date" name="data" required value="<?= e($data['noticiaData']) ?>"></label>
    <label>Resumo <span class="hint">Uma ou duas frases, mostradas na lista de notícias.</span>
        <input name="resumo" required value="<?= e($data['noticiaResumo']) ?>"></label>
    <label>Texto <span class="hint">Deixe uma linha em branco entre parágrafos.</span>
        <textarea name="corpo" required><?= e($data['noticiaCorpo']) ?></textarea></label>
    <label>Imagem <span class="hint">JPG, PNG ou WebP, até 3 MB. Use apenas fotos que tem o direito de publicar. Sem imagem, o site cria uma capa automática.</span>
        <input type="file" name="imagem" accept="image/jpeg,image/png,image/webp"></label>
    <?php if ($data['noticiaImagemURL'] !== ''): ?>
        <label><span><input type="checkbox" name="remover_imagem" value="1"> Remover a imagem atual</span></label>
    <?php endif; ?>
    <div class="form-actions">
        <button type="submit"><?= $news ? 'Guardar notícia' : 'Publicar notícia' ?></button>
        <a href="<?= e(url('admin/noticias.php')) ?>">Cancelar</a>
    </div>
</form>
<?php if ($news): ?>
    <form class="danger-zone" method="post" onsubmit="return confirm('Apagar esta notícia?')">
        <?= csrf_field() ?>
        <button class="link-danger" name="apagar" value="1">Apagar notícia</button>
    </form>
<?php endif; ?>
<?php admin_footer();
