<?php
include_once ("includes/body.inc.php");
global $con;
$id=intval($_POST['jogoId']);
$sql="delete from jogos inner join clubes on jogoCasaClubeId=casa.clubeId inner join clubes on jogoforaClubeId=Fora.clubeId  
where jogoId=".$id;
mysqli_query($con,$sql);
header("location:listaResultados.php");
?>
