<?php
include('../config.php');
include('./session.php');
include('./header.php');
if($login_permission==4 or $login_permission==0){
}else{
  header("location:./index.php");
}

echo '<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    My Projects</a>';



$q = "SELECT * FROM `hc` WHERE manager_id=$user_id; ";

$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)){

$id = $row['id'];
$name = $row['name'];
	echo '<a href="new_issue.php?id='.$id.'" class="list-group-item list-group-item-action">'.$name.'</a>';
}





?>






<?php
include('./footer.php');
?>