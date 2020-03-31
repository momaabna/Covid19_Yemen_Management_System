<?php
require_once('../config.php');


$geojson = array(
    'type'      => 'FeatureCollection',
    'features'  => array()
 );
 
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `notifications` ";
$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
    $id =$row['id'];
    $p1= $row['p1'];
          $p2= $row['p2'];
          $p3= $row['p3'];
          $p4= $row['p4'];
          $p5= $row['p5'];
          $p6= $row['p6'];
          $p7= $row['p7'];
          $p8= $row['p8'];
          $p9= $row['p9'];
          $p10= $row['p10'];
          $child= $row['child'];


          if($p1==1){
            $score=5;
            $score+=$p5;
            $score+=$p6;
            $score+=$p7;
            $score+=$p8;



          }else{
            if($child==1){
              $score=$p2*3;
            $score=$p3*2;
            $score=$p4*1;
            $score+=$p5;
            $score+=$p6;
            $score+=$p7;

            }else{
              $score=$p2*3;
            $score=$p3*2;
            $score=$p4*1;
            $score+=$p5*2;
            $score+=$p6*2;
            $score+=$p7*2;
            $score+=$p8;
            $score+=$p9;
            $score+=$p10;



            }
            
            
          };
    
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
		  'weight'=>($row['state']+1),
		  
		  
		  
		  'hc'=>$row['hc_name'],
		  'datetime'=>$row['datetime'],
		  'state'=>$row['state'],
		  'score'=>$score
		  
          
          
			
			
        //Other fields here, end without a comma
            )
        );
    array_push($geojson['features'], $feature);
};

    echo json_encode($geojson, JSON_UNESCAPED_UNICODE);
?>