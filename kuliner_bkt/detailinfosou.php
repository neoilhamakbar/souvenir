<?php
require '../connect.php';
$info = $_GET["info"];
$querysearch ="select id, name, owner, address, cp,ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from souvenir where id='$info'";	   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $status=$row['status'];
		  $address=$row['address'];
		  $cp=$row['cp'];
		  $owner=$row['owner'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'owner'=>$owner,'cp'=>$cp,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
