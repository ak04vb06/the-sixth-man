<?php
    include_once ("includes/body.inc.php");
    top();
    global $con;
    $dataIni="";
    $dataFim="";
    $sql="Select jogos.*
            , casa.clubeNome as nomeCasa
            , casa.clubeSobrenome as sobrenomeCasa
            , casa.clubeLogoURL as logoCasa
            , fora.clubeNome as nomeFora
            , fora.clubeSobrenome as sobrenomeFora
            , fora.clubeLogoURL as logoFora
            from jogos 
            inner join clubes as casa on casa.clubeId=jogoCasaClubeId
            inner join clubes as fora on fora.clubeId=jogoForaClubeId";
            if(isset($_POST['dataIni'])&&isset($_POST['dataFim'])){
                $sql.=" where jogoData between '".$_POST['dataIni']."' and '".$_POST['dataFim']."'";
                $dataIni=$_POST['dataIni'];
                $dataFim=$_POST['dataFim'];
            }



            $sql.=" order by jogoData desc";
    $res=mysqli_query($con,$sql);
?>
    <div class="container">
        <table class="table table-striped">
            <form action="" method="post">
            <tr>
                <td align="right">
                    <strong>Filtro: </strong>
                </td>
                <td colspan="2">
                    Data início  <input type="date" name="dataIni" value="<?php echo $dataIni;?>">
                </td>
                <td colspan="2">
                    Data Fim  <input type="date" name="dataFim" value="<?php echo $dataFim;?>">
                </td>
                <td>
                    <input type="submit" value="Aplicar">
                </td>
                <td colspan="3" style="text-align: right">
                    <a class="btn-sm btn-success" href="novoJogo.php">Novo jogo</a>
                </td>
            </tr>
            </form>
            <tr>
                <th style="width: 10%">Data</th>
                <th colspan="2" style="width: 20%">Equipa casa</th>
                <th colspan="2" style="width: 20%">Equipa fora</th>
                <th colspan="1" style="width: 10%">Resultado final</th>
                <th colspan="1" style="width: 10%">Editar Parciais </th>
                <th style="width: 10%">Editar Resultado</th>
                <th colspan="3" >Eliminar</th>

            </tr>
            <?php
            while ($dados=mysqli_fetch_array($res)){
                ?>
                <tr>
                    <td align="center"><?php echo $dados['jogoData']?></td>
                    <td  style="text-align: center; width:5%"><img src="../<?php echo $dados['logoCasa']?>" width="35"></td>
                    <td align="center"><?php echo $dados['nomeCasa'].' - <i>'.$dados['sobrenomeCasa'].'</i>'?></td>
                    <td style="text-align: center; width:5%"><img src="../<?php echo $dados['logoFora']?>" width="35"></td>
                    <td align="center"><?php echo $dados['nomeFora'].' - <i>'.$dados['sobrenomeFora'].'</i>'?></td>
                    <td align="center"><?php echo $dados['jogoResultadoCasa'].' - '.$dados['jogoResultadoFora']?></td>
                    <td style="text-align: center"><a class="btn-sm btn-secondary" href="editaResultado.php?id=<?php echo $dados['jogoId']?>"><i class="bi bi-dribbble"></i> Resultados</a></td>
                    <td style="text-align: center"><a class="btn-sm btn-primary" href="editaJogo.php?id=<?php echo $dados['jogoId']?>"><i class="bi bi-pencil"></i> Editar</a></td>
                    <td style="text-align: center"><a class="btn-sm btn-danger" href="eliminaJogo.php?id=<?php echo $dados['jogoId']?>"><i class="bi bi-trash"></i> Eliminar</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

<?php
    bottom();
?>
