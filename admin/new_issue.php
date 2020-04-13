<?php
include('../config.php');
include('./session.php');
include('./header.php');
$id =mysqli_real_escape_string($db,$_GET['id']);

if($login_permission==4 or $login_permission==0 or ($login_permission==5 and $q_id==$id)){
}else{
  header("location:./index.php");
}



function saveimage($fff){
  $file_name = $fff ;
  if(empty($file_name)){
return 'No Image';
  }
    
        
    //$scr = base64_decode($image);
    $filename = md5(date('Y-m-d H:i:s:u'));
    $filename .=uniqid('img');
    $link = "qurantines_images/".$filename;
    $link .=".jpg";
    $img_quality = 100;

    $im = imagecreatefromstring( file_get_contents( $file_name ) );
    $im_w = imagesx($im);
    $im_h = imagesy($im);
    $tn = imagecreatetruecolor($im_w, $im_h);
    imagecopyresampled ( $tn , $im, 0, 0, 0, 0, $im_w, $im_h, $im_w, $im_h );
    imagejpeg($tn,$link,$img_quality);
    //file_put_contents($link, $scr);

        return 'admin/'.$link;
    };

if($_SERVER["REQUEST_METHOD"] == "POST") {
$info = htmlspecialchars(mysqli_real_escape_string($db,$_POST['description'])); 
if(isset($_POST['myFile'])){
  $img = saveimage($_FILES['myFile']['tmp_name']); 
}else{
  $img='No image';
}
if(isset($_POST['due_date'])){
  $due_date =date("Y-m-d",strtotime(htmlspecialchars(mysqli_real_escape_string($db,$_POST['due_date'])))); 
}else{
  
}

if(isset($info)){


	mysqli_query($db,"SET NAMES 'utf8'");
  if(isset($_POST['due_date'])){
  $due_date =date("Y-m-d",strtotime(htmlspecialchars(mysqli_real_escape_string($db,$_POST['due_date'])))); 
  $sql = "INSERT INTO `issues` ( `quarantine_id`, `issue_description`, `img`, `made_by`, `date`, `time`,`due_date`) VALUES ( $id, '$info', '$img', '$user_id', now(), now(),'$due_date')";
}else{
  $sql = "INSERT INTO `issues` ( `quarantine_id`, `issue_description`, `img`, `made_by`, `date`, `time`) VALUES ( $id, '$info', '$img', '$user_id', now(), now())";
}
	
	$res= mysqli_query($db,$sql); 
    if($res){
        $success=true;
    }else{
        $success=false;
    }

}

}




 
mysqli_query($db,"set names utf8");

$q = "SELECT * FROM `hc` WHERE id=$id; ";
$result =mysqli_query($db,$q);
$row = mysqli_fetch_assoc($result);
$name= $row['name'];






?>
<?php 
                
                if(isset($success)){
                    if($success){
                       echo "<div class='alert alert-success' role='alert'>
                            Task Sent Successfully .
                                </div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>
                            Failed To Send Task .
                                </div>";
                    }
                }
                
                
                
                ?>

<div class="container "> 
	<h3><?php echo $name; ?> </h3>
 <form method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="form-group col-md-12">
  <div class=" row" >
    <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1">Issue Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"  rows="3"></textarea>
  </div>


</div></div>
<div class="form-group col-md-12">
  <div class=" row" >
    <div class="form-group col-md-2">
      <label for="check1">Upload Image</label>
      <input type="checkbox" name="check1" id="check1" onchange="change()">
    </div>
<div id ="Upload" class="form-group col-md-4">
      
    </div>
    <div class="form-group col-md-2">
      <label for="check2">Add Due Date</label>
      <input type="checkbox" name="check2" id="check2" onchange="change()">
    </div>
    <div id="due_date" class="form-group col-md-4">
      
    </div>
</div></div>

<div class="col-md-12" >
  <button type="submit" class="btn btn-primary col-md-12">Send Issue</button>
                </div>

</form>
</div>


<script type="text/javascript">
  function change(){
ch1 = document.getElementById('check1');
ch2 = document.getElementById('check2');
if(ch1.checked){
document.getElementById('Upload').innerHTML='<label for="myFile">Upload Image Only .JPG</label><input type="file" name="myFile" id="myFile">';
}else{
  document.getElementById('Upload').innerHTML='';
}
if(ch2.checked){
document.getElementById('due_date').innerHTML='<label for="date">Due Date</label><input type="date" name="due_date" id="date">';
}else{
  document.getElementById('due_date').innerHTML='';
}


  }




</script>

<?php
include('./footer.php');
?>