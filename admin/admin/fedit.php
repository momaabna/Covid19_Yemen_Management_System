<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
<script src="../js/jquery.min.js"></script>
    <script src="../js/ol.js"></script>
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    
    
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
    </head>
<body >




<?php 
include('../../config.php');
include('../session.php');


if($login_permission!=0){
    header("location:../users.php");
    exit();
}
//include('../includes/setting.php');
$massage ="";
$id = mysqli_escape_string($db,$_GET['user']);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = mysqli_escape_string($db,$_POST['username']);
    $password = md5($salt.mysqli_escape_string($db,$_POST['password']));
    $name = mysqli_escape_string($db,$_POST['fname']);
    
    $permission = 3;
    
    
    $q = "UPDATE users SET username='$username', name='$name',password='$password',session='$password' WHERE id=$id";
    $res =mysqli_query($db,$q);
    
    
        
        
            if(res){
                    $massage .=" Added Successfully";
    $massage = "
    
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
  $massage
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
    
    ";
        header("location:../users.php");
            
            
            
        
    
        
       
    }else{
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Error Happened While Submit.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
        
        
        ";
        
    }}
    
    
    
    
    
    
 


$q ="SELECT id,name,username,password FROM users WHERE id=$id";
$res1 =mysqli_query($db,$q);
$row = mysqli_fetch_assoc($res1);
$id = $row['id'];
$name = $row['name'];

$username = $row['username'];
$password = $row['password'];
        






?>
    <div class="container">
        <div class="row">
       <?php echo $massage ;?>
        
        </div>

        <div class="row">
        Update  Office User ( <?php echo $username ?> )
        
        </div>

    <div class="row" >
        
             <form method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" id="inputEmail4" name='username' placeholder="username" value='<?php echo $username; ?>'>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name='password' class="form-control" id="inputPassword4" placeholder="Password" value='<?php echo $password; ?>' >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fname">Fisrt Name</label>
      <input type="text" class="form-control" id="fname" name='fname' placeholder="First Name" value='<?php echo $name; ?>'>
    </div>
   
  </div>
  <div class="form-row">
    
    
   
  </div>
  
  <button type="submit" class="btn btn-primary">Update </button>
</form>          
        
        </div>
        
        
        
        
        
        
        
        </div>
</body>
</html>
