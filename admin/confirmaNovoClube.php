<?php
include_once ("includes/body.inc.php");
global $con;
$nome=addslashes($_POST['clubeNome']);
$sobrenome=addslashes($_POST['clubeSobrenome']);
$conferencia=addslashes($_POST['clubeConferencia']);
if($_FILES['logo']['name']!=''){
    $logo="clubs/".$_FILES['logo']['name'];
    copy($_FILES['logo']['tmp_name'],"../".$logo);
}else{
    $logo='clubs/semImagem.svg';
}
$sql="insert into clubes values(0,'$nome','$sobrenome','$logo','$conferencia')";
mysqli_query($con,$sql);
header("location:listaClubes.php");
?>
