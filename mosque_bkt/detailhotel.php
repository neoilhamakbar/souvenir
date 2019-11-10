<?php
require '../connect.php';

$cari = $_GET["cari"];
$querysearch	= "select id, name, address, cp, ktp, marriage_book, mushalla, star,ST_X(ST_Centroid(geom)) AS longitude, ST_Y(ST_CENTROID(geom)) As latitude from hotel where id='$cari'";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id=$row['id'];
          $name=$row['name'];
          $address=$row['address'];
		  $cp=$row['cp'];
		  $ktp=$row['ktp'];
		  $marriage_book=$row['marriage_book'];
		  $mushalla=$row['mushalla'];
          $star=$row['star'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'cp'=>$cp, 'ktp'=>$ktp, 'marriage_book'=>$marriage_book, 'mushalla'=>$mushalla,'star'=>$star, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>