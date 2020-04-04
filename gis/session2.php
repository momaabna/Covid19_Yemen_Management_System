<?php
   
if(isset($_GET['cookie'])){
   $sok = false;
   
   $session_check = mysqli_real_escape_string($db,$_GET['cookie']);
   //$user_check = mysqli_real_escape_string($db,$_SESSION['tocken']); 
   $result = mysqli_query($db,"SELECT * FROM users WHERE session = '$session_check'");
   
   $row = mysqli_fetch_assoc($result);
    
    
   
    
   $count = mysqli_num_rows($result);
   $login_session = $row['username'];
   $login_permission =$row['permission'];
   
   if($count<1){
      header("location:./login.php");
   }else{
	   if($count==0){
      header("location:./login.php");
   }else{
	   $sok = true;
   }
   }
}else{
    header("location:./login.php");
}
?>