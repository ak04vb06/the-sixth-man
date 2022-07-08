<?php

include_once ("includes/body.inc.php");
global $con;
top();
$id=intval($_GET['id']);
$cT1=0;
$cT2=0;
$cT3=0;
$cT4=0;
$fT1=0;
$fT2=0;
$fT3=0;
$fT4=0;


$sql="select casa.clubeNome as casaNome
, fora.clubeNome as foraNome
, parcialQuarto
, parcialCasaPontos
, parcialForaPontos 
from jogos inner join clubes as casa on jogoCasaClubeId=casa.clubeId 
						inner join clubes as fora on jogoforaClubeId=Fora.clubeId 
						left join parciais on jogoId=parcialJogoId
 where jogoId=".$id." order by parcialQuarto";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
$nomeCasa=$dados['casaNome'];
$nomeFora=$dados['foraNome'];
$cT1=$dados['parcialCasaPontos'];
$fT1=$dados['parcialForaPontos'];
$dados=mysqli_fetch_array($result);
$cT2=$dados['parcialCasaPontos'];
$fT2=$dados['parcialForaPontos'];
$dados=mysqli_fetch_array($result);
$cT3=$dados['parcialCasaPontos'];
$fT3=$dados['parcialForaPontos'];
$dados=mysqli_fetch_array($result);
$cT4=$dados['parcialCasaPontos'];
$fT4=$dados['parcialForaPontos'];

?>
<div class="container form ">

    <h1>Resultado do jogo: <?php echo $nomeCasa." - ".  $nomeFora?></h1>

    <form action="confirmaEditaResultado.php" method="post" enctype="multipart/form-data">
        <table class="table table-striped">

            <tr>
                <th style="width: 40%">Nome</th>

                <th style="width: 15%">T1</th>
                <th style="width: 15%">T2</th>
                <th style="width: 15%">T3</th>
                <th style="width: 15%">T4</th>


            </tr>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="data" class="form-label"><?php echo $nomeCasa?></label>
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t1Casa" value="<?php echo $cT1?>">
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t2Casa" value="<?php echo $cT2?>" >
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t3Casa" value="<?php echo $cT3?>" >
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t4Casa" value="<?php echo $cT4?>" >
                    </div>
                </td>

            </tr>            <tr>
                <td>
                    <div class="mb-3">
                        <label for="data" class="form-label"><?php echo $nomeFora?></label>
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t1Fora" value="<?php echo $fT1?>" >
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t2Fora" value="<?php echo $fT2?>" >
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t3Fora" value="<?php echo $fT3?>" >
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="t4Fora" value="<?php echo $fT4?>" >
                    </div>
                </td>

            </tr>
        </table>
        <div class="mb-3 text-end">
            <input type="hidden" value="<?php echo $id?>" name="jogoId">
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>
    </form>





</div>
<?php
bottom();
?>
