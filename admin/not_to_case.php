<?php
require_once('../config.php');
include('./session.php');
$online_thresh =1;
$id_ =mysqli_real_escape_string($db,$_GET['id']);
 $hc_id =mysqli_real_escape_string($db,$_GET['hc']);
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `notifications` WHERE id=$id_ ";
$result =mysqli_query($db,$q);
$row = mysqli_fetch_assoc($result);
   
            $lat =$row['lat'];
            $lon =$row['lon'];
            $id = $row['id'];
			$name = $row['name'];
          $info = $row['info'];
          $state = $row['state'];
          //'Site_Type' => $row['Site_Type'];
          $adress = $row['adress'];
          $hc_name=$row['hc_name'];
          $phone = $row['phone'];
           $phone2 = $row['phone2'];
           $type = $row['type'];
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
          $state_= $row['state_'];
          $locality = $row['locality'];


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
            }}
            $info='Score : '.$score;


            mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				//$sql = "INSERT INTO `tasks` (`location`, `f_userid`, `userid`, `title`, `info`, `datetime`, `state`) VALUES (GeomFromText('POINT($lon $lat)'), $f_user , $u_user, '$title', '$info', now(),  0)" ;
				$sql="INSERT INTO `cases` ( `name`, `datetime`, `info`, `adress`, `hc_name`, `hc_id`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`,`state_`,`locality`) VALUES ( '$name', now(), '$info', '$adress', '$hc_name', $hc_id, $state, $lon, $lat, $type, '$phone', '$phone2','$state','$locality')";
   echo $sql;
   $res1= mysqli_query($db,$sql); 
   if($res1){
    $sql="DELETE FROM `notifications` WHERE id=$id_";
   $res= mysqli_query($db,$sql); 

    if($res1){
        header("location:./not_list.php");
    }
   }

   

    ?>