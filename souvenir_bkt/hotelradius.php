<?php
include('../Connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];


$querysearch="SELECT id_hotel, nama_hotel,alamat, st_x(st_centroid(geom)) as lon,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), hotel.geom) as jarak 
	FROM hotel where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	 hotel.geom) <= ".$rad."	
			 "; 
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id_hotel=$row['id_hotel'];
		  $nama_hotel=$row['nama_hotel'];
		  $alamat=$row['alamat'];
		  $longitude=$row['lon'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id_hotel'=>$id_hotel,'nama_hotel'=>$nama_hotel,'alamat'=>$alamat,
		  'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>