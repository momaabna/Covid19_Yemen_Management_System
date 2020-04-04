<?php
require_once('../config.php');


$geojson = array(
    'type'      => 'FeatureCollection',
    'features'  => array()
 );
 
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `hc` ";
$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
    $id =$row['id'];
    $allcount_query = "SELECT count(*) as allcount FROM cases WHERE (hc_id=$id and state<2);";
            $allcount_result = mysqli_query($db,$allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];
    $feature = array(
        'type' => 'Feature', 
      'geometry' => array(
	  'type'=>'Point',
	  'coordinates'=>array(floatval($row["lon"]),floatval($row["lat"]))),
      'properties' => array(
            'id' => $row['id'],
			'name' => $row['name'],
          'info' => $row['info'],
		  
		  
		  
		  
		  'power'=>$row['power'],
		  'adress'=>$row['adress'],
		  'state'=>$row['state'],
      'cases'=>$allcount,

       
		  
          
          
			
			
        //Other fields here, end without a comma
            )
        );
    array_push($geojson['features'], $feature);
};

    echo json_encode($geojson, JSON_UNESCAPED_UNICODE);
?>