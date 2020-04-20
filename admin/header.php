<?php

?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/ol.css" type="text/css">
  <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
  <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/ol.js"></script>
  <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
  <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>


  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="icon" href="../favicon.png">
  <title>Control Panel</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#535152;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"><img src='../images/icon.png' width='90px' height='75px' /></a>
      <a class="navbar-brand" href="#" style="color:#fbb92f"><small><?php echo $sitename; ?></small></a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li id="main" class="nav-item ">
          <a class="nav-link" href="index.php" style="color:#fbb92f"><img src='../images/home.png' width='32px' height='32px' />Main <span class="sr-only">(current)</span></a>
        </li>

        <?php
        if ($login_permission == 1 or $login_permission == 0) {
          echo '<li id="new_hc" class="nav-item ">
        <a class="nav-link" href="new_hc.php" style="color:#fbb92f"><img src="../images/add.png" width="25px" height="25px" />Add Quarantine <span class="sr-only"></span></a>
      </li>
       <li id="hc_list" class="nav-item ">
        <a class="nav-link" href="hc_list.php" style="color:#fbb92f"><img src="../images/hospital.png" width="25px" height="25px" />Quarantines <span class="sr-only"></span></a>
      </li>';
//<<<<<<< HEAD


      }
if($login_permission==1 or $login_permission==4 or $login_permission==0){
        echo '<li id="issues" class="nav-item ">
        <a class="nav-link" href="issue_list.php" style="color:#fbb92f"><img src="../images/issues.png" width="25px" height="25px" />Issues <span class="sr-only"></span></a>
      </li>';


      }




        if ($login_permission == 2 or $login_permission == 0) {
          echo '<li id="new_case" class="nav-item ">

        <a class="nav-link" href="new_case.php" style="color:#fbb92f"><img src="../images/case.png" width="32px" height="32px" />Add Case <span class="sr-only"></span></a>
      </li>
      <li id="cases_list" class="nav-item ">
        <a class="nav-link" href="cases_list.php" style="color:#fbb92f"><img src="../images/cases.png" width="32px" height="32px" />Cases <span class="sr-only"></span></a>
      </li>
      <li id="not_list" class="nav-item ">
        <a class="nav-link" href="not_list.php" style="color:#fbb92f"><img src="../images/users.png" width="32px" height="32px" />Notifications <span class="sr-only"></span></a>
      </li>';
        }
        if ($login_permission == 3 or $login_permission == 0) {
          echo '
      <li id="cases_list" class="nav-item ">
        <a class="nav-link" href="ambulance_orders.php" style="color:#fbb92f"><img src="../images/ambulans.png" width="32px" height="32px" />Orders <span class="sr-only"></span></a>
      </li>
      ';
        }


if($login_permission==4 or $login_permission==5){

echo '
      <li id="cases_list" class="nav-item ">
        <a class="nav-link" href="hc_manage.php" style="color:#fbb92f"><img src="../images/hospital.png" width="32px" height="32px" />Projects <span class="sr-only"></span></a>
      </li>
      ';

}

        ?>




        <?php
        if ($login_permission == 0) {
        ?>
          <li id="users" class="nav-item ">
            <a class="nav-link" href="users.php" style="color:#fbb92f"><img src='../images/lock.png' width='32px' height='32px' />Users <span class="sr-only"></span></a>
          </li>

        <?php
        };
        ?>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="./logout.php">

        <button class="btn  my-2 my-sm-0" type="submit" style="background-color:#535152;color:#fbb92f;border-color:#fbb92f; : ">Log out</button>
      </form>


    </div>
  </nav>