<?php
require_once('../config.php');


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
			'name' => $row['name'],
          'info' => $row['info'],
		  'type' => $row['type'],
		  'weight'=>1,
		  
		  
		  
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