<?php

include_once ("includes/body.inc.php");
global $con;
top();
$id=intval($_GET['id']);
$sql="select * from clubes where clubeId=$id";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);


?>
<div class="container form ">

    <h1>Elimina Clube</h1>
    <form action="confirmaEliminaClube.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="clube" class="form-label">Nome do clube</label>
            <input readonly type="text" class="form-control" id="clube" name="clubeNome" value="<?php echo $dados['clubeNome']?>">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Sobrenome do clube</label>
            <input readonly type="text" class="form-control" id="clube" name="clubeSobrenome" value="<?php echo $dados['clubeSobrenome']?>">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">

                <?php if($dados['clubeConferencia']=='west') echo " Conferência de Oeste "; else echo " Conferência de Este ";?>
            </label>
        </div>
        <div class="mb-3">
            <img src="../<?php echo $dados['clubeLogoURL']?>" width="120">
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logótipo</label>
            <input class="form-control" type="file" id="logo" name="logo">
        </div>
        <div class="mb-3 text-end">
            <input type="hidden" value="<?php echo $dados['clubeId']?>" name="clubeId">
            <input onclick="window.location='listaClubes.php';" type="button" class="btn-sm btn-secondary" value="voltar">
            <input type="submit" class="btn-sm btn-danger" value="Confirma">
        </div>
    </form>





</div>
<?php
bottom();
?>
