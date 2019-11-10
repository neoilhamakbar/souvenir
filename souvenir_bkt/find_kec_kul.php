<?php
require '../connect.php';
$kecamatan_id = $_GET['district'];
$querysearch	= mysqli_query ($conn, "SELECT 
 culinary_place.id, 
 culinary_place.name,
 culinary_place.geom, 
 st_x(st_centroid(culinary_place.geom)) as longitude, 
 st_y(st_centroid(culinary_place.geom)) as latitude 
 from culinary_place, district 
 WHERE st_contains(district.geom, st_centroid(culinary_place.geom)) and district.id= '$kecamatan_id'"); 

while($row = mysqli_fetch_assoc($querysearch))
	$data[]=$row;
echo $_GET['jsoncallback'].''.json_encode($data).'';

?>