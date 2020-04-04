<?php
include('../config.php');
include('./session.php');

$id=mysqli_escape_string($db,$_GET['id']);
$t = mysqli_escape_string($db,$_GET['table']);
if($t=='cases'){
$sql="DELETE FROM `cases` WHERE id=$id";
}elseif($t=='hc'){
$sql="DELETE FROM `hc` WHERE id=$id";
}elseif($t=='nots'){
$sql="DELETE FROM `notifications` WHERE id=$id";
}

$res =mysqli_query($db,$sql);
if($res){
	header("location:./cases_list.php");
}else{
	echo "ERROR";
}


?>