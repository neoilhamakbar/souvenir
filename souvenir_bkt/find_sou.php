<?php
require '../connect.php';
$cari_nama = $_GET["cari_nama"];


$querysearch	="SELECT distinct id, name,address, st_x(st_centroid(geom)) as longitude, 
st_y(st_centroid(geom)) as latitude from souvenir where lower(name)like lower('%$cari_nama%')"; 
// var_dump($querysearch);
// die();
$data = array();

$hasil=mysqli_query($conn, $querysearch);
// var_dump(mysqli_fetch_array($hasil));
// die();
while($row = mysqli_fetch_array($hasil))
	{
		$id=$row['id'];
		$name=$row['name']; 
		$address=$row['address'];
		$rating=$row['rating'];
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$tabel='sou';
		// var_dump($row);
		// die();
		//   if ($longitude != null) {
			$dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'rating'=>$rating,'longitude'=>$longitude,'latitude'=>$latitude,'tabel'=>$tabel);
		//   }
	}
	
$querysearch2="SELECT distinct id, name,address,st_x(st_centroid(geom)) as longitude, 
st_y(st_centroid(geom)) as latitude from small_industry where lower(name)like lower('%$cari_nama%')"; 
$hasil2=mysqli_query($conn, $querysearch2);

while($row = mysqli_fetch_array($hasil2))
	{
		  $id=$row['id'];
		  $name=$row['name']; 
		  $address=$row['address'];
		  $rating=$row['rating'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $tabel='ik';
		  if($longitude !=null){
			$dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'rating'=>$rating,'longitude'=>$longitude,'latitude'=>$latitude,'tabel'=>$tabel);
		  }
	}


echo json_encode ($dataarray);
?>