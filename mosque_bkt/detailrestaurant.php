<?php
require '../connect.php';

$cari = $_GET["cari"];
$querysearch	= "select id, name, address, cp, open, close, capacity, employee, mushalla, park_area, bathroom, ST_X(ST_Centroid(geom)) AS longitude, ST_Y(ST_CENTROID(geom)) As latitude from restaurant where id='$cari'";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id=$row['id'];
          $name=$row['name'];
          $address=$row['address'];
		  $cp=$row['cp'];
		  $open=$row['open'];
		  $close=$row['close'];
          $capacity=$row['capacity'];
		  $employee=$row['employee'];
		  $mushalla=$row['mushalla'];
		  $park_area=$row['park_area'];
		  $bathroom=$row['bathroom'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'cp'=>$cp, 'open'=>$open, 'close'=>$close,'capacity'=>$capacity,'employee'=>$employee, 'mushalla'=>$mushalla,'park_area'=>$park_area,'bathroom'=>$bathroom, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>