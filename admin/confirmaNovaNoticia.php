<?php
include_once ("includes/body.inc.php");
global $con;
$titulo=addslashes($_POST['noticiaTitulo']);
$data=addslashes($_POST['noticiaData']);
$resumo=addslashes($_POST['noticiaResumo']);
$corpo=addslashes($_POST['noticiaCorpo']);
if($_FILES['noticiaImagem']['name']!=''){
    $url="imagesNews/".$_FILES['noticiaImagem']['name'];
    copy($_FILES['noticiaImagem']['tmp_name'],"../".$url);
}else {
    $url = 'imagesNews/semImagem.jpg';
}
    $sql="insert into noticias values(0,'$titulo','$data','$url','$resumo','$corpo')";
    mysqli_query($con, $sql);
    header("location:listaNoticias.php");

?>
