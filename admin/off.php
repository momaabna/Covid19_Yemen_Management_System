<?php
include('../config.php');
include('./session.php');

$id=mysqli_escape_string($db,$_GET['id']);
$sql="UPDATE notifications SET state=0 WHERE id=$id";
$res =mysqli_query($db,$sql);
if($res){
	header("location:./index.php");
}else{
	echo "ERROR";
}


?>