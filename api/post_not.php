<?php
include('../config.php');
//include('./session.php');
include('../header.php');
//include('./includes/setting.php');
$app_key='bcadfc8c5ab3bce29bca3ae1f2ccc7dcbcadfc8c5ab3bce29bca3ae1f2ccc7dc';
if($_SERVER["REQUEST_METHOD"] == "POST"$_POST['key']==$app_key) {
	$name = htmlspecialchars(mysqli_real_escape_string($db,$_POST['name']));
      $info = 'From App';
      $lon = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lon'])); //Longitude
	  $lat = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lat']));//Latitude
    $adress = htmlspecialchars(mysqli_real_escape_string($db,$_POST['adress']));//Adress
	  $hc_name=htmlspecialchars(mysqli_real_escape_string($db,$_POST['hc_name']));//Nearest Hospital
    $phone = htmlspecialchars(mysqli_real_escape_string($db,$_POST['phone']));//Phone
	  $phone2 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['phone2']));//Assistant Phone
$p1 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p1']));//Parameter from WHO

$p2 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p2']));//Parameter from WHO

$p3 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p3']));//Parameter from WHO

$p4 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p4']));//Parameter from WHO

$p5 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p5']));//Parameter from WHO

$p6 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p6']));//Parameter from WHO

$p7 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p7']));//Parameter from WHO

$p8 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p8']));//Parameter from WHO

$p9 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p9']));//Parameter from WHO

$p10 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p10']));//Parameter from WHO
$child =htmlspecialchars(mysqli_real_escape_string($db,$_POST['child']));//Parameter from WHO
	  $type=0;
	  $state=-1;
    $nat_id=htmlspecialchars(mysqli_real_escape_string($db,$_POST['nat_id']));//National ID
	  
    

if(isset($name) and isset($lon) and isset($info) and isset($lat) and isset($hc_name) and isset($phone) and isset($phone2) and isset($type) and isset($state) and isset($adress) and isset($nat_id)){
  
mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
			
				$sql="INSERT INTO `notifications` ( `name`, `datetime`, `info`, `adress`, `hc_name`, `hc_id`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`,`nat_id`,`p1`,`p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`) VALUES ( '$name', now(), '$info', '$adress', '$hc_name', 1, $state, $lon, $lat, $type, '$phone', '$phone2','$nat_id',$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$child)";
   
   $res= mysqli_query($db,$sql); 
    if($res){
        echo 'success';
    }else{
        echo 'failed';
    };
};
} ;


?>