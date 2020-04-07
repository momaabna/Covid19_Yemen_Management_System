<?php
require_once('../config.php');

require_once('./session.php');


mysqli_query($db,"set names utf8");
$result =mysqli_query($db,"SHOW COLUMNS FROM hc ");

while($row = mysqli_fetch_assoc($result)) {
$name = $row['Field'];
$id =mysqli_real_escape_string($db,$_GET['id']);
$el = array();
if (isset($_GET[$name])){
	$el[$name] = mysqli_real_escape_string($db,$_GET[$name]);
	if(isset($_GET['text'])){
		$q = "UPDATE `hc` SET `$name`='".$el[$name]."' WHERE id=$id " ;
	}else{
		$q = "UPDATE `hc` SET `$name`=".$el[$name]." WHERE id=$id " ;
	}
mysqli_query($db,$q);

}


}

header("location:./hc_list.php");

?>