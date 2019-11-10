<?php
include('../../connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];


$querysearch="SELECT id, name, 
	st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), souvenir.geom) as jarak 
	FROM souvenir where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	 souvenir.geom) <= ".$rad."	
			 "; 
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $jarak=$row['jarak'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,
		  'longitude'=>$longitude,'latitude'=>$latitude, 'jarak'=>$jarak);
	}
echo json_encode ($dataarray);
?>
