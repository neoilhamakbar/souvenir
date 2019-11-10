<?php
require '../connect.php';
$info = $_GET["info"];
$querysearch ="select culinary_place.id,culinary_place.name,culinary_place.capacity,culinary_place.address,culinary_place.cp,culinary_place.open,culinary_place.close, newtable.id_culinary_place,ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) As lat, newtable.fasilitas from (select detail_facility_culinary.id_culinary_place, string_agg(facility_culinary.facility, ', ') as fasilitas from detail_facility_culinary join facility_culinary on facility_culinary.id = detail_facility_culinary.id_facility where detail_facility_culinary.id_culinary_place='$info' group by detail_facility_culinary.id_culinary_place) as newtable join culinary_place on culinary_place.id = newtable.id_culinary_place";


$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $capacity=$row['capacity'];
		  $address=$row['address'];
		  $cp=$row['cp'];
		  $open=$row['open'];
		  $close=$row['close'];
		  $fasilitas=$row['fasilitas'];		 
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  
		  $dataarray[]=array('id'=>$id,'name'=>$name,'capacity'=>$capacity,'address'=>$address,'cp'=>$cp,'close'=>$close,'fasilitas'=>$fasilitas,'open'=>$open,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
