<?php
include('../config.php');
include('./session.php');
include('./header.php');
if($login_permission==4 or $login_permission==0){
}else{
  header("location:./index.php");
}

$id =mysqli_real_escape_string($db,$_GET['id']);

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
$img = saveimage($_FILES['myFile']['tmp_name']); 
if(isset($info)){


	mysqli_query($db,"SET NAMES 'utf8'");
	$sql = "INSERT INTO `issues` ( `quarantine_id`, `issue_description`, `img`, `made_by`, `date`, `time`) VALUES ( $id, '$info', '$img', '$user_id', now(), now())";
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
<div class="form-group col-md-12">
      <label for="myFile">Upload Image Only .JPG</label>
      <input type="file" name="myFile" id="myFile">
    </div>
</div></div>

<div class="col-md-12" >
  <button type="submit" class="btn btn-primary col-md-12">Send Issue</button>
                </div>

</form>
</div>

<?php
include('./footer.php');
?>