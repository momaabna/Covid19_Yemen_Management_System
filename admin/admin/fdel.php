<?php
include("../../config.php");
include("../session.php");
if($login_permission!=0){
    header("location:../users.php");
    exit();
}

$id = mysqli_real_escape_string($db,$_GET['user']);
$sql = "DELETE FROM users WHERE id=$id ";
    $res1=mysqli_query($db,$sql);

header("location:../users.php");

?>