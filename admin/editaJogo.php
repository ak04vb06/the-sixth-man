<?php

include_once ("includes/body.inc.php");
global $con;
top();
$id=intval($_GET['id']);
$sql="select * from jogos where jogoId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

?>
<div class="container form ">

    <h1>Novo Jogo</h1>
    <form action="confirmaEditaJogo.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="dataJogo" value="<?php echo $dados['jogoData']?>">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Nome do clube - Casa</label>
            <select class="form-select" name="clubeCasaId">
                <option selected>Escolha o clube...</option>
                <?php
                $sql="select * from clubes";
                $res=mysqli_query($con,$sql);
                while($dadosC=mysqli_fetch_array($res)){
                ?>
                    <option value="<?php echo $dadosC['clubeId']?>"
                            <?php
                            if($dadosC['clubeId'] == $dados['jogoCasaClubeId']) echo " selected ";
                            ?>
                    ><?php echo $dadosC['clubeNome'] ?></option>
               <?php
                }
                ?>


            </select>
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Nome do clube - Fora</label>
            <select class="form-select" name="clubeForaId">
                <option selected>Escolha o clube...</option>
                <?php
                $sql="select * from clubes";
                $res=mysqli_query($con,$sql);
                while($dadosC=mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $dadosC['clubeId']?>"
                        <?php
                        if($dadosC['clubeId'] == $dados['jogoForaClubeId']) echo " selected ";
                        ?>
                    ><?php echo $dadosC['clubeNome'] ?></option>
                    <?php
                }
                ?>


            </select>
        </div>

        <div class="mb-3 text-end">
            <input type="hidden" value="<?php echo $dados['jogoId']?>" name="jogoId">
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>
    </form>





</div>
<?php
bottom();
?>
