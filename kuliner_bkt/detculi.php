<?php
require '../connect.php';
$info = $_GET["info"];


$querysearch ="SELECT culinary_place.id,culinary_place.name,culinary_place.capacity,culinary_place.address,culinary_place.cp,culinary_place.open,culinary_place.close, newtable.id_culinary_place,newtable.price,ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) As lat, newtable.culinary from (select detail_culinary.id_culinary_place,detail_culinary.price, string_agg(culinary.name, ', ') as culinary from detail_culinary join culinary on culinary.id = detail_culinary.id_culinary where detail_culinary.id_culinary_place='$info' group by detail_culinary.id_culinary_place,detail_culinary.price) as newtable join culinary_place on culinary_place.id = newtable.id_culinary_place";




$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $capacity=$row['capacity'];
		  $address=$row['address'];
		  $cp=$row['cp'];
		  $open=$row['open'];
		  $close=$row['close'];
		  $price=$row['price'];
		  $culinary=$row['culinary'];		 
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'capacity'=>$capacity,'address'=>$address,'cp'=>$cp,'open'=>$open,'close'=>$close,'culinary'=>$culinary,'price'=>$price,'longitude'=>$longitude,'latitude'=>$latitude);
	}
	
echo json_encode ($dataarray);
?>
