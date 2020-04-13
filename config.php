<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Adonese=1994');
   define('DB_DATABASE', 'covid');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $sitelink ="https://tracker.soluspay.net/";
   $salt='Hellocovid';
   $sitename="Covid-19 Managment - Sudan";
?>
    
