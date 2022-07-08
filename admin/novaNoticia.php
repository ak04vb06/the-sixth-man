<?php

include_once ("includes/body.inc.php");
global $con;
top();


?>
<div class="container form ">

    <h1>Nova Notícia</h1>
    <form action="confirmaNovaNoticia.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="clube" class="form-label">Título</label>
            <input type="text" class="form-control" name="noticiaTitulo">
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Imagem</label>
            <input class="form-control" type="file" id="imagem" name="noticiaImagem">
        </div>
        <div class="mb-3">
            <label for="noticia" class="form-label">Data</label>
            <input type="date" class="form-control" name="noticiaData">
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">Resumo</label>
            <textarea class="form-control" name="noticiaResumo"></textarea>
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">Desenvolvimento</label>
            <textarea class="form-control" id="noticiaCorpo" name="noticiaCorpo"></textarea>
        </div>

        <div class="mb-3 text-end">
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>

    </form>





</div>
<?php
bottom();
?>
