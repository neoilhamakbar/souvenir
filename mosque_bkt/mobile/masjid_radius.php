<?php
include('../../connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];

$querysearch="SELECT id, name,st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")'), worship_place.geom) as jarak 
	FROM worship_place where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")'),
	worship_place.geom) <= ".$rad." ORDER BY jarak
			 "; 
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,
		  'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>