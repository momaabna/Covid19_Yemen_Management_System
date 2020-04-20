<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'covid_yemen');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $sitelink ="http://localhost/covid_yemen/";
   $salt='Hellocovid';
   $sitename="Yemen";
?>
    
