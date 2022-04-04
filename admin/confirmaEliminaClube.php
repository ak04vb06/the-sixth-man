<?php
include_once ("includes/body.inc.php");
global $con;
$id=intval($_POST['clubeId']);
$sql="delete from clubes where clubeId=".$id;
mysqli_query($con,$sql);
header("location:listaClubes.php");
?>
