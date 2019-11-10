<?php
include('../connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"]/1000;


// $querysearch="SELECT id, name, 
// 	st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
// 	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), small_industry.geom) as jarak 
// 	FROM small_industry where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
// 	 small_industry.geom) <= ".$rad."	
// 			 "; 

$querysearch = "SELECT
			 id, (
			   6371 * acos (
				 cos ( radians('$latit') )
				 * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
				 * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians('$longi') )
				 + sin ( radians('$latit') )
				 * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
			   )
			 ) AS jarak, name, ST_Y(ST_CENTROID(geom)) as lat, ST_X(ST_CENTROID(geom)) as lng
		   FROM small_industry
		   HAVING jarak <= $rad";
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
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
