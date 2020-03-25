<?php

setcookie("username", "", time() - 3600,"/");   
setcookie("cookie", "", time() - 3600,"/");   
header("Location: ../index.php");
   
?>