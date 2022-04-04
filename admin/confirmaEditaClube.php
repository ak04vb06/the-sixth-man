<?php
include_once ("includes/body.inc.php");
global $con;
$id=intval($_POST['clubeId']);
$nome=addslashes($_POST['clubeNome']);
$sobrenome=addslashes($_POST['clubeSobrenome']);
$conferencia=addslashes($_POST['clubeConferencia']);



$sql="update clubes set clubeNome='$nome', clubeSobrenome='$sobrenome', clubeConferencia='$conferencia'";
if($_FILES['logo']['name']!=''){
    $logo="extra-images/".$_FILES['logo']['name'];
    copy($_FILES['logo']['tmp_name'],"../".$logo);
    $sql.=", clubeLogoURL='".$logo."'";
}
$sql.=" where clubeId=".$id;
mysqli_query($con,$sql);
header("location:listaClubes.php");
?>
