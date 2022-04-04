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

    <h1>Edita Clube</h1>
    <form action="confirmaEditaClube.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="clube" class="form-label">Nome do clube</label>
            <input type="text" class="form-control" id="clube" name="clubeNome" value="<?php echo $dados['clubeNome']?>">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Sobrenome do clube</label>
            <input type="text" class="form-control" id="clube" name="clubeSobrenome" value="<?php echo $dados['clubeSobrenome']?>">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Conferência</label>
        </div>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="clubeConferencia" id="inlineRadio1"
                <?php if($dados['clubeConferencia']=='west') echo " checked ";?>
                       value="west">
                <label class="form-check-label" for="inlineRadio1">Conferência de Oeste</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="clubeConferencia" id="inlineRadio2"
                    <?php if($dados['clubeConferencia']=='east') echo " checked ";?>
                       value="east">
                <label class="form-check-label" for="inlineRadio2">Conferência de Este</label>
            </div>

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
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>
    </form>





</div>
<?php
bottom();
?>
