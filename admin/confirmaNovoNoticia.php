<?php
include_once ("includes/body.inc.php");
global $con;
$titulo=addslashes($_POST['noticiaTitulo']);
$resumo=addslashes($_POST['noticiaResumo']);
if($_FILES['noticiImagemURL']['name']!=''){
    $url="noticia/".$_FILES['noticiImagemURL']['name'];
    copy($_FILES['noticiImagemURL']['tmp_name'],"../".$url);
}else {
    $url = 'noticiImagemURL/semImagem.http';
}
    $sql="insert into noticias values(0,'$titulo','$url','$resumo')";
    mysqli_query($con, $sql);
    header("location:listaNoticias.php");

?>
