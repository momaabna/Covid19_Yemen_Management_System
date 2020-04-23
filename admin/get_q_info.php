<table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">#Proprties</th>
      <th scope="col">Value</th>
      
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

function getmanager_name($db,$code){
$q = "SELECT * FROM `users` WHERE id='$code' ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['name'];
  return $name;
};
function getlast_isuse_date($db,$code){
$q = "SELECT * FROM `issues` WHERE quarantine_id='$code' order by id desc ; ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['date'];
  return $name;
};
function getlast_isuse_time($db,$code){
$q = "SELECT * FROM `issues` WHERE quarantine_id='$code' order by id desc ; ";
$result1 =mysqli_query($db,$q);
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['time'];
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


$online_thresh =1;
$id =mysqli_real_escape_string($db,$_GET['id']);
 
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `hc` WHERE id=$id; ";
$result =mysqli_query($db,$q);
$row = mysqli_fetch_assoc($result);



$table='';
$id=$row['id']; $table.='<tr><th>ID</th><td>'.$id.'</td></tr>';
$name=$row['name']; $table.='<tr><th>Name</th><td>'.$name.'</td></tr>';
$info=$row['info'];$table.='<tr><th>Information</th><td>'.$info.'</td></tr>';
$power=$row['power'];$table.='<tr><th>Power</th><td>'.$power.'</td></tr>';
$phone=$row['phone'];$table.='<tr><th>Phone</th><td>'.$phone.'</td></tr>';
$phone2=$row['phone2'];$table.='<tr><th>Another Phone</th><td>'.$phone2.'</td></tr>';
$lon=$row['lon'];$table.='<tr><th>Longitude</th><td>'.$lon.'</td></tr>';
$lat=$row['lat'];$table.='<tr><th>Latitude</th><td>'.$lat.'</td></tr>';
$adress=$row['adress'];$table.='<tr><th>Adress</th><td>'.$adress.'</td></tr>';
$state_=$row['state_'];$table.='<tr><th>State</th><td>'.getstatename($db,$state_).'</td></tr>';
$locality=$row['locality'];$table.='<tr><th>Locality</th><td>'.getlocalityname($db,$locality).'</td></tr>';
$owner_name=$row['owner_name'];$table.='<tr><th>Owner Name</th><td>'.$owner_name.'</td></tr>';
$owner_contact=$row['owner_contact'];$table.='<tr><th>Owner Contact</th><td>'.$owner_contact.'</td></tr>';
$project_manager=$row['project_manager'];$table.='<tr><th>Project Manager</th><td>'.$project_manager.'</td></tr>';
$stakeholders=$row['stakeholders'];$table.='<tr><th>Stakeholders</th><td>'.$stakeholders.'</td></tr>';
$i_teams=$row['i_teams'];$table.='<tr><th>Inspection teams</th><td>'.$i_teams.'</td></tr>';
$r_t_contacts=$row['r_t_contacts'];$table.='<tr><th>Resistance team contacts</th><td>'.$r_t_contacts.'</td></tr>';

$init_budget=$row['init_budget'];$table.='<tr><th>Initial budget in SDG</th><td>'.$init_budget.'</td></tr>';
$e_f_date=$row['e_f_date'];$table.='<tr><th>Expected finishing date</th><td>'.$e_f_date.'</td></tr>';
$i_date=$row['i_date'];$table.='<tr><th>Inspection date</th><td>'.$i_date.'</td></tr>';
$i=0;$h='';
while($i<=1){
    $h.="<a class='dropdown-item' href='./set_hc_val.php?medical_usage=".$i."&id=".$id."'>Set: ".getmu($i)."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";
$medical_usage=$row['medical_usage'];$table.='<tr><th>Medical Usage</th><td>'.getmu($medical_usage).'</td><td>'.$h1.'</td></tr>';

$i=0;$h='';
while($i<=3){
    $h.="<a class='dropdown-item' href='./set_hc_val.php?building_status=".$i."&id=".$id."'>Set: ".getbs($i)."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";




$building_status=$row['building_status']; $table.='<tr><th>Building Status</th><td>'.getbs($building_status).'</td><td>'.$h1.'</td></tr>';

$i=0;$h='';
while($i<=1){
    $h.="<a class='dropdown-item' href='./set_hc_val.php?owner_acceptance=".$i."&id=".$id."'>Set : ".getoa($i)."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";

$owner_acceptance=$row['owner_acceptance']; $table.='<tr><th>Owner Acceptance</th><td>'.getoa($owner_acceptance).'</td><td>'.$h1.'</td></tr>';

$i=0;$h='';
while($i<=1){
    $h.="<a class='dropdown-item' href='./set_hc_val.php?resistnce_acceptance=".$i."&id=".$id."'>Set: ".getoa($i)."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";


$resistnce_acceptance=$row['resistnce_acceptance']; $table.='<tr><th>Resistance Acceptance</th><td>'.getoa($resistnce_acceptance).'</td><td>'.$h1.'</td></tr>';

$i=0;$h='';
while($i<=2){
    $h.="<a class='dropdown-item' href='./set_hc_val.php?readiness_status=".$i."&id=".$id."'>Set: ".getrs($i)."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";


$readiness_status=$row['readiness_status']; $table.='<tr><th>Readiness Status</th><td>'.getrs($readiness_status).'</td><td>'.$h1.' </td></tr>';

$i=0;$h='';
while($i<=3){
    $h.="<a class='dropdown-item' href='./set_hc_val.php?building_type=".$i."&id=".$id."'>Set: ".getbt($i)."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";




$building_type=$row['building_type']; $table.='<tr><th>Building Type</th><td>'.getbt($building_type).'</td><td>'.$h1.'</td></tr>';
$i=0;$h='';

$q = "SELECT * FROM `users` WHERE permission=4 ";
$result1 =mysqli_query($db,$q);


while($row1 = mysqli_fetch_assoc($result1)){
  $i=$row1['id'];
    $h.="<a class='dropdown-item' href='./set_hc_val.php?manager_id=".$i."&id=".$id."'>Assign to : ".getmanager_name($db,$i)."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";

$manager_id=$row['manager_id'];$table.='<tr><th>Project Manager</th><td>'.getmanager_name($db,$manager_id).'</td><td>'.$h1.'</td></tr>';
          

//$table.='<tr><th>Last Issue Date</th><td>'.getlast_isuse_date($db,$id).'</td><td><a class="btn btn-primary" href="new_issue.php?id='.$id.'" role="button">Add issue</a></td></tr>';
$table.='<tr><th>Last Issue Time</th><td>'.getlast_isuse_time($db,$id).'</td></tr>';            


        
          
    $img = $row['img'];
    

     
          
     echo $table;
    



 
?>

      </tbody>
</table>
<?php
if($img=='No Image' or $img==''){
  echo $img;
}else{
echo '<img src="../'.$img.'" width="auto" height="auto" style="max-width:100%;" />' ;


}

?>