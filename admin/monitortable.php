<table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Information</th>
      <th scope="col">State</th>
        <th scope="col">Adress</th>
        <th scope="col">Phone</th>
        <th scope="col">A. Phone</th>
        <th scope="col">Type</th>
        <th scope="col">Location</th>
    </tr>
  </thead>
  <tbody>
<?php
require_once('../config.php');
//include('./session.php');
$online_thresh =1;
$q =mysqli_real_escape_string($db,$_GET['q']);
 
mysqli_query($db,"set names utf8");

$q = "SELECT `id`, `name`, `info`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`, `adress`  FROM `cases` WHERE (name LIKE '%$q%' OR info LIKE '%$q%' OR phone LIKE '%$q%' OR phone2 LIKE '%$q%' OR adress LIKE '%$q%' )";
$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
   
            $lat =$row['lat'];
            $lon =$row['lon'];
            $id = $row['id'];
			$name = $row['name'];
          $info = $row['info'];
          $state = $row['state'];
          //'Site_Type' => $row['Site_Type'];
          $adress = $row['adress'];
          $phone = $row['phone'];
           $phone2 = $row['phone2'];
           $type = $row['type'];
          //'Tower_Type' => $row['Tower_Type'];
          //'Equipment_Housing' => $row['Equipment_Housing'];
          //'CW_Tower_Contractor' => $row['CW_Tower_Contractor'];
          
     echo "
    <tr>
      <th>$id</th>
      <td>$name</td>
      <td>$info</td>
      <td>$state</td>
    <td>$adress</td>
    <td>$phone</td>
    <td>$phone2</td>
    <td>$type</td>
    <td><a href='#' onclick= \" map.setView(new ol.View({ center: ol.proj.fromLonLat([$lon,$lat], 'EPSG:3857'), zoom: 15 })); \" > <img src='../images/on.png' width='20px' height='20px' /></a> <a href='del.php?table=cases&id=$id'><img src='../images/delete.png' width='20px' height='20px' /> </a></td>
    </tr>";
    
    
    /*
    <a href='#' class='list-group-item list-group-item-action' onclick= \" map.setView(new ol.View({ center: ol.proj.fromLonLat([$lon,$lat], 'EPSG:3857'), zoom: 18 })); \" > <img src='images/antena32.png' /></a>";
    */
   
};


 
?>

      </tbody>
</table>
