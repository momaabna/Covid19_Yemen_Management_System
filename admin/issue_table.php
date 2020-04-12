<table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Issue by</th>
      <th scope="col">Description</th>
      <th scope="col">Quarantine</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>

        
        <th scope="col">Events</th>
    </tr>
  </thead>
  <tbody>
<?php
require_once('../config.php');
include('./session2.php');
function getstatename($db,$code){
$q = "SELECT * FROM `states` WHERE admin1Pcode='$code' ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['admin1Name_en'];
  return $name;
};
function getlocalityname($db,$code){
$q = "SELECT * FROM `states` WHERE admin2Pcode='$code' ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['admin2Name_en'];
  return $name;
};
function getmu($code){
if($code==0){
    return'Isolation';
}elseif($code==1){
    return 'Self isolation';
}
};
function getbs($code){
if($code==0){
    return'Approved by the team';
}elseif($code==1){
    return 'Under Maintenance';
}elseif ($code==2) {
    return 'Not visited yet';
}elseif ($code==3) {
    return 'etc.';
}
};

function getbt($code){
if($code==0){
    return'Hospital';
}elseif($code==1){
    return 'Stadium';
}elseif ($code==2) {
    return 'School Complex';
}elseif ($code==3) {
    return 'Others';
}
};

function getrs($code){
if($code==0){
    return'Not ready';
}elseif($code==1){
    return 'Ready needs approval';
}elseif ($code==2) {
    return 'Ready';
};
};
function getoa($code){
if($code==0){
    return'False';
}elseif($code==1){
    return 'True';
};
};
function getmanager_name($db,$code){
$q = "SELECT * FROM `users` WHERE id='$code' ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['name'];
  return $name;
};
function getquarantine_name($db,$code){
$q = "SELECT * FROM `hc` WHERE id='$code' ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['name'];
  return $name;
};

$online_thresh =1;
$q =mysqli_real_escape_string($db,$_GET['q']);
 
                mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 

  $q = "SELECT * FROM `issues` WHERE (issue_description like '%$q%') order by id desc ";


$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
   
            
            $id = $row['id'];
			     $name = getmanager_name($db,$row['made_by']);
          $info = $row['issue_description'];
          $date = $row['date'];
          $time =$row['time'];
          $quarantine =getquarantine_name($db,$row['quarantine_id']);
          

           
          
         
            
           
            $icon='red.png';
          
          
          
          // <a href='del.php?table=hc&id=$id'><img src='../images/delete.png' width='20px' height='20px' /> </a>
     echo "
    <tr>
      <th>$id</th>
      <td>$name</td>
      <td>$info</td>
      <td>$quarantine</td>
    <td>$date</td>
    <td>$time</td>
    
    <td> <a href='#' onclick=\" getmodal2($id)\"><img src='../images/issues.png' width='20px' height='20px' /> </a> </td>
    </tr>";
    
    
    /*
    <a href='#' class='list-group-item list-group-item-action' onclick= \" map.setView(new ol.View({ center: ol.proj.fromLonLat([$lon,$lat], 'EPSG:3857'), zoom: 18 })); \" > <img src='images/antena32.png' /></a>";
    */
   
};


 
?>

      </tbody>
</table>
