<?php
include_once ("includes/body.inc.php");
global $con;
$id=intval($_POST['jogoId']);
$sql="delete from parciais where parcialJogoId=".$id;
mysqli_query($con,$sql);


$sql="delete from jogos where jogoId=".$id;
mysqli_query($con,$sql);
header("location:listaResultados.php");
?>
