<?php
require '../connect.php';
$cari = $_GET["cari"];
$querysearch ="select worship_place.id, worship_place.name as name_mesjid, address, land_size, building_size, park_area_size, capacity, est, last_renovation, imam, jamaah, teenager, category_worship_place.name as name_category, image, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from worship_place join category_worship_place on category_worship_place.id=worship_place.id_category where worship_place.id='$cari'";	   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name_mesjid=$row['name_mesjid'];
		  $address=$row['address'];
		  $land_size=$row['land_size'];
		  $building_size=$row['building_size'];
		  $park_area_size=$row['park_area_size'];
		  $capacity=$row['capacity'];
		  $est=$row['est'];
		  $last_renovation=$row['last_renovation'];
		  $imam=$row['imam'];
		  $jamaah=$row['jamaah'];
		  $teenager=$row['teenager'];
		  $name_category=$row['name_category'];
		  $image=$row['image'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name_mesjid'=>$name_mesjid,'address'=>$address, 'land_size'=>$land_size, 'building_size'=>$building_size, 'park_area_size'=>$park_area_size,'capacity'=>$capacity,'est'=>$est, 'last_renovation'=>$last_renovation, 'imam'=>$imam, 'jamaah'=>$jamaah, 'teenager'=>$teenager, 'name_category'=>$name_category, 'image'=>$image,'longitude'=>$longitude,'latitude'=>$latitude);

		  if ($image=='null' || $image=='' || $image==null){
			$image='foto.jpg';
		  }
	}
echo json_encode ($dataarray);
?>
