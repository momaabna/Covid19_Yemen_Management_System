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

$q = "SELECT * FROM `issues` WHERE quarantine_id=$id;";
$result =mysqli_query($db,$q);
echo '<div class="accordion" id="accordionExample">';
while($row = mysqli_fetch_assoc($result)){
$date = $row['date'];
$time =$row['time'];
$des = $row['issue_description'];
$img =$row['img'];
$made_by = $row['made_by'];
$id = $row['id'];

echo '<div class="card">
    <div class="card-header" id="heading'.$id.'">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$id.'" aria-expanded="true" aria-controls="collapseOne">
          '.$date.' in '.$time.' From : '.getmanager_name($db,$made_by).'
        </button>
      </h5>
    </div>

    <div id="collapse'.$id.'" class="collapse" aria-labelledby="heading'.$id.'e" data-parent="#accordionExample">
      <div class="card-body">
        '.$des.'<img src="../'.$img.'" width="auto" height="auto" style="max-width:100%;" />
      </div>
    </div>
  </div>';


}


?>

</div>





