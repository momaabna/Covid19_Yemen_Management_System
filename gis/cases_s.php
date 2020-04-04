<?php
require_once('../config.php');
require_once('./session2.php');


$geojson = array(
    'type'      => 'FeatureCollection',
    'features'  => array()
 );
 
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `cases` ";
$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
    $id =$row['id'];
    
    $feature = array(
        'type' => 'Feature', 
      'geometry' => array(
	  'type'=>'Point',
	  'coordinates'=>array(floatval($row["lon"]),floatval($row["lat"]))),
      'properties' => array(
            'id' => $row['id'],
			
          'info' => $row['info'],
		  'type' => $row['type'],
		  'weight'=>1,
		  'name'=>$row['name'],
		  
		  
		  
		  'hc'=>$row['hc_name'],
		  'datetime'=>$row['datetime'],
		  'state'=>$row['state']
		  
          
          
			
			
        //Other fields here, end without a comma
            )
        );
    array_push($geojson['features'], $feature);
};

    echo json_encode($geojson, JSON_UNESCAPED_UNICODE);
?>