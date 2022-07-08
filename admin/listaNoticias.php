
<?php
include_once ("includes/body.inc.php");
top();
global $con;
$sql="Select * from noticias ";
$res=mysqli_query($con,$sql);
?>
<div class="container">
    <table class="table table-striped">
        <tr>
            <td colspan="7" style="text-align: right">
                <a class="btn-sm btn-success" href="novaNoticia.php">Nova Noticia</a>
            </td>
        </tr>
        <tr>


            <th style="width: 10%">ImagemURL</th>
            <th style="width: 25%">Titulo</th>
            <th style="width: 25%">Resumo</th>


            <th colspan="2">Opções</th>

        </tr>
        <?php
        while ($dados=mysqli_fetch_array($res)){
            ?>
            <tr>
               <td><img src="../<?php echo $dados['noticiaImagemURL']?>" width="35"></td>
                <td><?php echo $dados['noticiaTitulo']?></td>
                <td><?php echo resumo($dados['noticiaResumo'],100);?></td>

                <td style="text-align: center"><a class="btn-sm btn-primary" href="editaNoticia.php?id=<?php echo $dados['noticiaId']?>"><i class="bi bi-pencil"></i> Editar</a></td>
                <td style="text-align: center"><a class="btn-sm btn-danger" href="eliminaNoticia.php?id=<?php echo $dados['noticiaId']?>"><i class="bi bi-trash"></i> Eliminar</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php
bottom();
?>