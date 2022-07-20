<?php
    include_once ("includes/body.inc.php");
    top();
    global $con;
    $sql="Select * from clubes order by clubeConferencia";
    $res=mysqli_query($con,$sql);
?>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <td colspan="7" style="text-align: right">
                    <a class="btn-sm btn-success" href="novoClube.php" >Novo clube </a>
                </td>
            </tr>
            <tr>
                <th style="width: 5%">Id</th>
                <th colspan="1" style="width: 10%">Logo</th>
                <th style="width: 10%">Equipa</th>
                <th style="width: 25%">Sobrenome Equipa</th>

                <th style="width: 15%">Conferência</th>
                <th colspan="2"><h5>Opções</h5></th>

            </tr>
            <?php
            while ($dados=mysqli_fetch_array($res)){
                ?>
                <tr>
                    <td align="center""><?php echo $dados['clubeId']?></td>
                    <td align="center"><img src="../<?php echo $dados['clubeLogoURL']?>" width="35"></td>
                    <td align="center"><b><?php echo $dados['clubeNome']?></b></td>
                    <td align="center"><b><?php echo $dados['clubeSobrenome']?></b></td>
                    <td align="center"><b><?php echo $dados['clubeConferencia']=='west'?'Conferência de Oeste':'Conferência de Este'?></b></td>
                    <td style="text-align: center"><a class="btn-sm btn-primary" href="editaClube.php?id=<?php echo $dados['clubeId']?>"><i class="bi bi-pencil"></i> Editar</a></td>
                    <td style="text-align: center"><a class="btn-sm btn-danger" href="eliminaClube.php?id=<?php echo $dados['clubeId']?>"><i class="bi bi-trash"></i> Eliminar</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

<?php
    bottom();
?>
