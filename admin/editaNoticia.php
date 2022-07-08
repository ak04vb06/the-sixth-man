<?php
include_once ("includes/body.inc.php");
global $con;
top();
$id=intval($_GET['id']);
$sql="select * from noticias where noticiaId=$id";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);

?>
<div class="container form ">

    <h1>edita Notícia</h1>
    <form action="confirmaEditaNoticia.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="clube" class="form-label">Título</label>
            <input type="text" class="form-control" name="noticiaTitulo" value="<?php echo $dados['noticiaTitulo']?>">
        </div>
        <div class="mb-3">
            <img src="../<?php echo $dados['noticiaImagemURL']?>" width="220">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Imagem</label>
            <input class="form-control" type="file" id="imagem" name="noticiaImagem">
        </div>
        <div class="mb-3">
            <label for="noticia" class="form-label">Data</label>
            <input type="date" class="form-control" name="noticiaData" value="<?php echo $dados['noticiaData']?>">
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">Resumo</label>
            <textarea class="form-control" name="noticiaResumo"><?php echo $dados['noticiaResumo']?></textarea>
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">Desenvolvimento</label>
            <textarea class="form-control" id="noticiaCorpo" name="noticiaCorpo"><?php echo $dados['noticiaCorpo']?></textarea>
        </div>

        <div class="mb-3 text-end">
            <input name="idNoticia" type="hidden" class="btn-sm btn-primary" value="<?php echo $id?>">
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>

    </form>





</div>
<?php
bottom();
?>
