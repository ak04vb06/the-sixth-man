<?php
include_once ("includes/body.inc.php");
global $con;
$id=intval($_POST['jogoId']);
$data=addslashes($_POST['dataJogo']);
$casaId=intval($_POST['clubeCasaId']);
$foraId=intval($_POST['clubeForaId']);
$sql="update jogos set jogoData='$data', jogoCasaClubeId=$casaId, jogoForaClubeId=$foraId where jogoId=".$id;
mysqli_query($con,$sql);
header("location:listaResultados.php");
?>
