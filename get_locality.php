<?php
require_once('./config.php');

$id = mysqli_real_escape_string($db,$_GET['id']);
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `states` Where  admin1Pcode='$id' ;";
$result =mysqli_query($db,$q);

$geojson = array(
    'state'      => 'state_name',
    'state_ar' => 'state_name',
    'localitis'  => array()
 );
 

while($row = mysqli_fetch_assoc($result)) {
    
    
    $feature = array(
        
      
            'CODE' => $row['admin2Pcode'],
			
          'name' => $row['admin2Name_en'],
		  'name_ar' => $row['admin2Name_ar']
		  
            );
        
    array_push($geojson['localitis'], $feature);
    $geojson['state']=$row['admin1Name_en'];
    $geojson['state_ar']=$row['admin1Name_ar'];



};

    echo json_encode($geojson, JSON_UNESCAPED_UNICODE);
?>