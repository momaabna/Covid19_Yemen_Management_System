<?php
   
if(isset($_COOKIE['cookie'])){
   $sok = false;
   $user_check = mysqli_real_escape_string($db,$_COOKIE['username']);
   $session_check = mysqli_real_escape_string($db,$_COOKIE['cookie']);
   //$user_check = mysqli_real_escape_string($db,$_SESSION['tocken']); 
   $result = mysqli_query($db,"SELECT * FROM users WHERE username = '$user_check' and session = '$session_check'");
   
   $row = mysqli_fetch_assoc($result);
    
    
    
    $user_profile_f_name =$row['name'];
	$user_profile_f_phone= $row['phone'];
    
   $count = mysqli_num_rows($result);
   $login_session = $row['username'];
   $login_permission =$row['permission'];
   $user_id = $row['id'];
   $q_id = $row['q_id'];
   if(!isset($_COOKIE['cookie'])){
      header("location:./login.php");
   }else{
	   if($count!=1){
      header("location:./login.php");
   }else{
	   $sok = true;
   }
   }
}else{
    header("location:./login.php");
}
?>