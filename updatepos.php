<?php
require_once('./config.php');
$table='stages';
$q = "SELECT `id`, `lat`, `lon` from $table";
$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
	$id = $row['id'];
	$lon = $row['lon'];
	$lat = $row['lat'];
 	$q = "UPDATE $table SET location=GeomFromText('POINT($lon $lat)') WHERE id=$id";
	mysqli_query($db,$q);
	
	
};





?>