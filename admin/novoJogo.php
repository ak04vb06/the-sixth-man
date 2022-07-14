<?php

include_once ("includes/body.inc.php");
global $con;
top();


?>
<div class="container form ">

    <h1>Novo Jogo</h1>
    <form action="confirmaNovoJogo.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="dataJogo">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Nome do clube - Casa</label>
            <select class="form-select" name="clubeCasaId">
                <option selected>Escolha o clube...</option>
                <?php
                $sql="select * from clubes order by clubeNome ";
                $res=mysqli_query($con,$sql);
                while($dados=mysqli_fetch_array($res)){
                ?>
                    <option value="<?php echo $dados['clubeId'] ?>"><?php echo $dados['clubeNome']." ".$dados['clubeSobrenome']  ?></option>
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
                $sql="select * from clubes order by clubeNome ";
                $res=mysqli_query($con,$sql);
                while($dados=mysqli_fetch_array($res)){
                ?>
                    <option value="<?php echo $dados['clubeId'] ?>"><?php echo $dados['clubeNome']." ".$dados['clubeSobrenome'] ?></option>
               <?php
                }
                ?>


            </select>
        </div>

        <div class="mb-3 text-end">
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>
    </form>





</div>
<?php
bottom();
?>
