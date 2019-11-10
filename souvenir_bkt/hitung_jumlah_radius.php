<?php
include('../connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];


$querysearch="SELECT id, name, 
	st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), souvenir.geom) as jarak 
	FROM souvenir where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	 souvenir.geom) <= ".$rad."	
			 "; 
$no = 0;
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $no++;
	}

$querysearch2="SELECT id, name, 
	st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), small_industry.geom) as jarak 
	FROM small_industry where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	 small_industry.geom) <= ".$rad."	
			 "; 
$hasil2=mysqli_query($conn, $querysearch2);
while($row = mysqli_fetch_array($hasil2))
	{
		  $no++;
	}

$dataarray['jumlah'] = $no;
echo json_encode ($dataarray);
?>
