<?php
require '../connect.php';

$cari = $_GET["cari"];
$querysearch	= "select id, name, address, cp, capacity, open, close, employee,ST_X(ST_Centroid(geom)) AS longitude, ST_Y(ST_CENTROID(geom)) As latitude from culinary_place where id='$cari'";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id=$row['id'];
          $name=$row['name'];
          $address=$row['address'];
		  $cp=$row['cp'];
		  $capacity=$row['capacity'];
		  $open=$row['open'];
		  $close=$row['close'];
          $employee=$row['employee'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'cp'=>$cp, 'capacity'=>$capacity, 'open'=>$open, 'close'=>$close,'employee'=>$employee,'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>