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
}elseif ($code) {
    return 'etc.';
}
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
$medical_usage=$row['medical_usage'];$table.='<tr><th>Medical Usage</th><td>'.getmu($medical_usage).'</td></tr>';
$building_status=$row['building_status']; $table.='<tr><th>Building Status</th><td>'.getbs($building_status).'</td></tr>';
$owner_acceptance=$row['owner_acceptance']; $table.='<tr><th>Owner Acceptance</th><td>'.getoa($owner_acceptance).'</td></tr>';
$resistnce_acceptance=$row['resistnce_acceptance']; $table.='<tr><th>Resistance Acceptance</th><td>'.getoa($resistnce_acceptance).'</td></tr>';
$readiness_status=$row['readiness_status'];
$building_type=$row['building_type'];

          

            
            


        
          
    
          
     echo $table;



 
?>

      </tbody>
</table>
