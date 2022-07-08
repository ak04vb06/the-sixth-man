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

    <h1>elimina Notícia</h1>
    <form action="confirmaEliminaNoticia.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="clube" class="form-label">Título</label>
            <input readonly type="text" class="form-control" name="noticiaTitulo" value="<?php echo $dados['noticiaTitulo']?>">
        </div>
        <div class="mb-3">
            <img src="../<?php echo $dados['noticiaImagemURL']?>" width="220">
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">Data</label>
            <input readonly type="date" class="form-control" name="noticiaData" value="<?php echo $dados['noticiaData']?>">
        </div>

        <div class="mb-3">
            <label for="noticia" class="form-label">Resumo</label>
            <textarea readonly class="form-control" name="noticiaResumo"><?php echo $dados['noticiaResumo']?></textarea>
        </div>


        <div class="mb-3 text-end">
            <input name="noticiaId" type="hidden" class="btn-sm btn-primary" value="<?php echo $id?>">
            <input onclick="window.location='listaNoticias.php';" type="button" class="btn-sm btn-secondary" value="voltar">
            <input type="submit" class="btn-sm btn-danger" value="Confirma">
        </div>

    </form>





</div>
<?php
bottom();
?>
