<?php
require '../../connect.php';
$cari_nama = $_GET["cari_nama"];
$querysearch	="SELECT distinct id, name,address, st_x(st_centroid(geom)) as longitude, 
st_y(st_centroid(geom)) as latitude from souvenir where lower(name)like lower('%$cari_nama%')"; 
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name']; 
		  $address=$row['address'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>