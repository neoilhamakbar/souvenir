<?php
require '../connect.php';
$district_id = $_GET['district'];
$data = array();

$querysearch	= mysqli_query ($conn, "SELECT 
 souvenir.id, 
 souvenir.name,
 souvenir.geom,
 'sou' as jenistabel, 
 st_x(st_centroid(souvenir.geom)) as longitude, 
 st_y(st_centroid(souvenir.geom)) as latitude 
 from souvenir, district 
 WHERE st_contains(district.geom, st_centroid(souvenir.geom)) and district.id= '$district_id'"); 

while($row = mysqli_fetch_assoc($querysearch))
{
	$data[]=$row;
}

$querysearch2 = mysqli_query ($conn, "SELECT 
 small_industry.id, 
 small_industry.name,
 small_industry.geom,
 'ik' as jenistabel, 
 st_x(st_centroid(small_industry.geom)) as longitude, 
 st_y(st_centroid(small_industry.geom)) as latitude 
 from small_industry, district 
 WHERE st_contains(district.geom, st_centroid(small_industry.geom)) and district.id= '$district_id'"); 

while($row = mysqli_fetch_assoc($querysearch2)){
	$data[]=$row;
}

echo $_GET['jsoncallback'].''.json_encode($data).'';

?>