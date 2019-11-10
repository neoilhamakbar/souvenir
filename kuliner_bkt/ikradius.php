<?php
include('../connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];


$querysearch="SELECT id, nama_industri, 
	st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), industri_kecil_region.geom) as jarak 
	FROM industri_kecil_region where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	 industri_kecil_region.geom) <= ".$rad."	
			 "; 
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $nama_industri=$row['nama_industri'];
		  
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $jarak=$row['jarak'];
		  $dataarray[]=array('id'=>$id,'nama_industri'=>$nama_industri,
		  'longitude'=>$longitude,'latitude'=>$latitude, 'jarak'=>$jarak);
	}
echo json_encode ($dataarray);
?>
