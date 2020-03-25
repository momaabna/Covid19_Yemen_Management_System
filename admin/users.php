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
    $result =mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        $id =$row['id'];
        $name = $row['name'];
        $username = $row['username'];
        
        
        echo "
        
             <tr>
      <th scope='row'>$id</th>
      <td>$username</td>
      <td>$name</td>
      
      
        <td><a href='admin/fedit.php?user=$id'>Edit</a></td>
        <td><a href='admin/fdel.php?user=$id' >Delete</a></td>

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