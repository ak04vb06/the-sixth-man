<?php
include_once ("includes/body.inc.php");
global $con;
$id=intval($_POST['idNoticia']);
$titulo=addslashes($_POST['noticiaTitulo']);
$data=addslashes($_POST['noticiaData']);
$resumo=addslashes($_POST['noticiaResumo']);
$corpo=addslashes($_POST['noticiaCorpo']);
if($_FILES['noticiaImagem']['name']!=''){
    $url="imagesNews/".$_FILES['noticiaImagem']['name'];
    copy($_FILES['noticiaImagem']['tmp_name'],"../".$url);
    $aux=",noticiaImagemURL='$url'";
}else {
    $aux="";
}
   $sql="update noticias 
                set noticiaTitulo='$titulo'
                  ,noticiaData='$data'    
                  $aux
                  ,noticiaResumo='$resumo'
                  ,noticiaCorpo='$corpo'
                   where noticiaId=$id";

   mysqli_query($con, $sql);
    header("location:listaNoticias.php");

?>
