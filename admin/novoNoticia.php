<?php

include_once ("includes/body.inc.php");
global $con;
top();


?>
<div class="container form ">

    <h1>Nova Noticia</h1>
    <form action="confirmaNovoNoticia.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="clube" class="form-label">Nome da Noticia</label>
            <input type="text" class="form-control" id="noticias" name="noticiaTitulo">
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">URL da Noticia </label>
            <input type="url" class="form-control" id="noticias" name="noticiaImagemURL">
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">Resumo da Noticia </label>
            <input type="text" class="form-control" id="noticias" name="noticiaResumo">
        </div>

        <div class="mb-3 text-end">
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>

    </form>





</div>
<?php
bottom();
?>
