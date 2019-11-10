<?php
include('../connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];


$querysearch="SELECT id_oleh_oleh, nama_oleh_oleh, 
	st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), oleh_oleh.geom) as jarak 
	FROM oleh_oleh where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	 oleh_oleh.geom) <= ".$rad."	
			 "; 
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id_oleh_oleh=$row['id_oleh_oleh'];
		  $nama_oleh_oleh=$row['nama_oleh_oleh'];
		  
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $jarak=$row['jarak'];
		  $dataarray[]=array('id_oleh_oleh'=>$id_oleh_oleh,'nama_oleh_oleh'=>$nama_oleh_oleh,
		  'longitude'=>$longitude,'latitude'=>$latitude, 'jarak'=>$jarak);
	}
echo json_encode ($dataarray);
?>
