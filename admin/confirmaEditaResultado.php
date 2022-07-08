<?php
include_once ("includes/body.inc.php");
global $con;
var_dump($_POST);
$t1C=intval($_POST['t1Casa']);
$t2C=intval($_POST['t2Casa']);
$t3C=intval($_POST['t3Casa']);
$t4C=intval($_POST['t4Casa']);
$t1F=intval($_POST['t1Fora']);
$t2F=intval($_POST['t2Fora']);
$t3F=intval($_POST['t3Fora']);
$t4F=intval($_POST['t4Fora']);

$totalCasa=$t1C+$t2C+$t3C+$t4C;
$totalFora=$t1F+$t2F+$t3F+$t4F;

$id=intval($_POST['jogoId']);
echo $totalCasa.' - '.$totalFora;

// TPC:
/*
 // fazer UPDATE AO JOGO (RESULTADO FINAL)
 */
$sql="update jogos set jogoResultadoCasa='$totalCasa', jogoResultadoFora=$totalFora  where jogoId=".$id;
mysqli_query($con,$sql);
 /* fazer UPADATE AOS PARCIAIS */
$sql="update parciais set parcialCasaPontos='$t1C' ,parcialForaPontos='$t1F' where parcialJogoId=$id and parcialQuarto='q1'";
mysqli_query($con,$sql);
$sql="update parciais set parcialCasaPontos='$t2C' ,parcialForaPontos='$t2F' where parcialJogoId=$id and parcialQuarto='q2'";
mysqli_query($con,$sql);
$sql="update parciais set parcialCasaPontos='$t3C' ,parcialForaPontos='$t3F' where parcialJogoId=$id and parcialQuarto='q3'";
mysqli_query($con,$sql);
$sql="update parciais set parcialCasaPontos='$t4C' ,parcialForaPontos='$t4F' where parcialJogoId=$id and parcialQuarto='q4'";
mysqli_query($con,$sql);




header("location:listaResultados.php");
?>
