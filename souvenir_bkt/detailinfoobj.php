<?php
require '../connect.php';
$info = $_GET["info"];
$querysearch ="select id, name, address, open, close, ticket,  ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from tourism where id='$info'";	   
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $open=$row['open'];
		  $close=$row['close'];
		  $ticket=$row['ticket'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open,'close'=>$close,'ticket'=>$ticket,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
