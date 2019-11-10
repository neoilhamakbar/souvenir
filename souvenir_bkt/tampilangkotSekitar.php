
<?php
include('../connect.php');
$lat=$_GET["lat"];
$lon=$_GET["lon"];

$querysearch="SELECT id_angkot,no_angkot, jurusan, warna_angkot, st_x(st_centroid(geom)) as longitude,st_y(st_centroid(geom)) as latitude,
			st_distance_sphere(ST_GeomFromText('POINT(".$lon." ".$lat.")',-1), angkot.geom) as jarak FROM angkot where st_distance_sphere(ST_GeomFromText
			('POINT(".$lon." ".$lat.")',-1), angkot.geom) <= 350 order by jarak"; 
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id_angkot=$row['id_angkot'];
		  $no_angkot=$row['no_angkot'];
		  $jurusan=$row['jurusan'];
		  //$jalur_angkot=$row['jalur_angkot'];
		  $warna_angkot=$row['warna_angkot'];
		  //$warna=$row['warna'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id_angkot'=>$id_angkot,'no_angkot'=>$no_angkot,'jurusan'=>$jurusan,'warna_angkot'=>$warna_angkot,
		  'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>

