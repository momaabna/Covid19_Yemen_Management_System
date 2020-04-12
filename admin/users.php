<?php 
include('../config.php');
include('./session.php');
include('./header.php');
if($login_permission!=0){
    header("location:./index.php");
    exit();
}

?>
    <div class="row">
        <div class="col-md-6">
            <div class="container">
        <!-- Field Users Table-->
<div class="row">
    <h5>Users Configuration <a href='./admin/fnew.php'>Click Here to Add New  User</a></h5>
    
    </div>
        <table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">#ID</th>
        <th scope="col">Username</th>
      <th scope="col">Name</th>
      
        <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
          <?php

    $sql = "SELECT * FROM `users`";
    mysqli_query($db,"SET NAMES 'utf8'");
    $result =mysqli_query($db,$sql);

    while($row = mysqli_fetch_assoc($result)) {
        $id =$row['id'];
        $name = $row['name'];
        $username = $row['username'];
        $permission = $row['permission'];
        if ($permission==5){
          $i=0;$h='';

$q = "SELECT * FROM `hc`  ";
mysqli_query($db,"SET NAMES 'utf8'");
$result1 =mysqli_query($db,$q);


while($row1 = mysqli_fetch_assoc($result1)){
  $i=$row1['id'];
  $name = $row1['name'];
    $h.="<a class='dropdown-item' href='./admin/set_user_val.php?q_id=".$i."&id=".$id."'>Set Team Member for : ".$name."</a>";
    $i+=1;
};
$h1 ="<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    ".$h."
  </div>";

        }else{
          $h1='';
        }
        
        
        echo "
        
             <tr>
      <th scope='row'>$id</th>
      <td>$username</td>
      <td>$name</td>
      
      
        <td><a href='admin/fedit.php?user=$id'>Edit</a></td>
        <td><a href='admin/fdel.php?user=$id' >Delete</a></td>
        <td>$h1</td>

    </tr>
        
        ";
          
      }
      
      

     
?>
          
           </tbody>
</table>
        
        
        </div>
            </div>

        

        
        </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<script>
document.getElementById("users").classList.add("active");
</script>
<?php

include("footer.php");


?>