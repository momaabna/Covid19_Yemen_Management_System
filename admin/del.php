<?php
include('../config.php');
include('./session.php');

$id=mysqli_escape_string($db,$_GET['id']);
$sql="DELETE FROM `notifications` WHERE id=$id";
$res =mysqli_query($db,$sql);
if($res){
	header("location:./index.php");
}else{
	echo "ERROR";
}


?>