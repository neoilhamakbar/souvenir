<?php
require '../connect.php';
$cari = $_GET["cari"];
$querysearch ="select id, name, address, owner, cp, employee, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from souvenir where id='$cari'";	   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $owner=$row['owner'];
		  $cp=$row['cp'];
		  $employee=$row['employee'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address, 'owner'=>$owner, 'cp'=>$cp,'employee'=>$employee,'longitude'=>$longitude,'latitude'=>$latitude);
	}
	
echo json_encode ($dataarray);
?>
