<?php
include('../connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];

$querysearch="SELECT id, destination, track, route_color, st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), angkot.geom) as jarak 
	FROM angkot where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	 angkot.geom) <= ".$rad." order by destination asc"; 
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $destination=$row['destination'];
		  $track=$row['track'];
		  $route_color=$row['route_color'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'destination'=>$destination, 'track'=>$track, 'route_color'=>$route_color,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>