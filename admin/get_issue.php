<?php


require_once('../config.php');
include('./session2.php');

function getmanager_name($db,$code){
$q = "SELECT * FROM `users` WHERE id='$code' ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['name'];
  return $name;
};

$id =mysqli_real_escape_string($db,$_GET['id']);
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `issues` WHERE id=$id ;";
$result =mysqli_query($db,$q);

$row = mysqli_fetch_assoc($result);
$date = $row['date'];
$time =$row['time'];
$des = $row['issue_description'];
$img =$row['img'];
$made_by = getmanager_name($db,$row['made_by']);
$id = $row['id'];

echo '<div class="card text-center" style="max-width:500px;">

<img class="card-img-top" src="../'.$img.'" alt="No Image " >
<h5 class="card-title">'.$made_by.'</h5>
  <div class="card-body">

    '.$des.'
  </div>
  <div class="card-footer text-muted">
    '.$date.' at '.$time.'
  </div>
  <div
</div>';





?>

</div>





