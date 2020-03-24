<?php
include('../config.php');
$password = md5($salt.$_GET['password']);
echo $password;
?>