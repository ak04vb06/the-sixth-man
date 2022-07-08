<?php

include_once ("includes/body.inc.php");
global $con;
top();
$id=intval($_GET['id']);
$sql="select jogoId, jogoData, casa.clubeNome as casaNome, fora.clubeNome as foraNome from jogos inner join clubes as casa on jogoCasaClubeId=casa.clubeId 
        inner join clubes as fora on jogoforaClubeId=Fora.clubeId where jogoId=$id";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);


?>
<div class="container form ">

    <h1>Novo Jogo</h1>
    <form action="confirmaEliminaJogo.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="dataJogo" value="<?php echo $dados['jogoData']?>" readonly>
        </div> <div class="mb-3">
            <label for="data" class="form-label">Nome do clube - Casa</label>
            <input type="text" class="form-control" id="data" name="dataJogo" value="<?php echo $dados['casaNome']?>" readonly>
        </div> <div class="mb-3">
            <label for="data" class="form-label">Nome do clube - Fora</label>
            <input type="text" class="form-control" id="data" name="dataJogo" value="<?php echo $dados['foraNome']?>" readonly>
        </div>

        <div class="mb-3 text-end">
            <input type="hidden" value="<?php echo $dados['jogoId']?>" name="jogoId">
            <input onclick="window.location='listaResultados.php';" type="button" class="btn-sm btn-secondary" value="voltar">
            <input type="submit" class="btn-sm btn-danger" value="Confirma">
        </div>
    </form>




</div>
<?php
bottom();
?>
