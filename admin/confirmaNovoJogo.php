<?php
include_once ("includes/body.inc.php");
global $con;
$data=addslashes($_POST['dataJogo']);
$casaId=intval($_POST['clubeCasaId']);
$foraId=intval($_POST['clubeForaId']);

$sql="insert into jogos values(0,'$data',0,0,$casaId,$foraId)";
mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
$sql="insert into parciais values (0,'q1',0,0,$id),(0,'q2',0,0,$id),(0,'q3',0,0,$id),(0,'q4',0,0,$id)";
mysqli_query($con,$sql);
header("location:listaResultados.php");
?>
