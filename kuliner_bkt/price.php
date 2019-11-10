<?php
require '../connect.php';

$harga=$_GET['harga'];

	if($harga==1){
		$querysearch	="SELECT culinary_place.id,culinary_place.name,culinary_place.capacity,culinary_place.address,culinary_place.cp,culinary_place.open,culinary_place.close, newtable.id_culinary_place,newtable.price,ST_X(ST_Centroid(culinary_place.geom)) AS longitude, ST_Y(ST_CENTROID(culinary_place.geom)) As latitude, newtable.culinary from (select detail_culinary.id_culinary_place,detail_culinary.price, string_agg(culinary.name, ', ') as culinary from detail_culinary join culinary on culinary.id = detail_culinary.id_culinary where detail_culinary.price < '10000' group by detail_culinary.id_culinary_place,detail_culinary.price) as newtable join culinary_place on culinary_place.id = newtable.id_culinary_place ";	
		
	} else if($harga ==2){
		$querysearch	=" SELECT culinary_place.id,culinary_place.name,ST_X(ST_Centroid(culinary_place.geom)) AS longitude, ST_Y(ST_CENTROID(culinary_place.geom)) As latitude from culinary_place join detail_culinary on culinary_place.id=detail_culinary.id_culinary_place where detail_culinary.price >= '10000' and detail_culinary.price <= '20000' group by id ";	
	
				
	} else {
		$querysearch	=" SELECT culinary_place.id,culinary_place.name,culinary_place.capacity,culinary_place.address,culinary_place.cp,culinary_place.open,culinary_place.close, newtable.id_culinary_place,newtable.price,ST_X(ST_Centroid(culinary_place.geom)) AS longitude, ST_Y(ST_CENTROID(culinary_place.geom)) As latitude, newtable.culinary from (select detail_culinary.id_culinary_place,detail_culinary.price, string_agg(culinary.name, ', ') as culinary from detail_culinary join culinary on culinary.id = detail_culinary.id_culinary where detail_culinary.price > '20000' group by detail_culinary.id_culinary_place,detail_culinary.price) as newtable join culinary_place on culinary_place.id = newtable.id_culinary_place ";			
		
	}
	 
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id				=$row['id'];
		  $name				=$row['name'];
		  $price			=$row['price'];
		  $longitude		=$row['longitude'];
		  $latitude			=$row['latitude'];
		  
		$dataarray[]=array('id'=>$id,'name'=>$name,'price'=>$price, 'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
