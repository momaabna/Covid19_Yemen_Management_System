<?php

include('../config.php');
include('./session.php');
include('./header.php');

$id =  mysqli_real_escape_string($db,$_GET['id']);
mysqli_query($db,"set names utf8");
if(!empty($_POST)){
	
$current = mysqli_real_escape_string($db,$_POST['current']);
$schedul =  mysqli_real_escape_string($db,$_POST['schedul']);

$sql = "UPDATE stages SET current='$current',schedul='$schedul' WHERE id=$id";
$res = mysqli_query($db,$sql);
header("location:./index.php");
}else{
	
$sql = "SELECT * FROM stages WHERE id=$id ";

$res = mysqli_query($db,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$sch=$row['schedul'];
$cur=$row['current'];
}






?>
<div class="row">
    <div class="col-sm-3"></div>
	<div class="col-sm-6">
	<center>
<form method='POST'>
  <div class="form-group">
    <label for="exampleFormControlInput1">البرنامج الحالي</label>
    <input name='current' type="text" value="<?php echo $cur; ?>" class="form-control" id="exampleFormControlInput1" placeholder="البرنامج الحالي">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">الجدول</label>
    <textarea name='schedul' class="form-control" id="exampleFormControlTextarea1" rows="8"><?php echo $sch ; ?> </textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Update</button>
  
  
  </form>
  <center>
  </div>
  <div class="col-sm-3"></div>
  
  
  
  
  
  <?php
include('../footer.php');
?>