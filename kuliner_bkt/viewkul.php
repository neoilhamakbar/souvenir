<?php
include '../connect.php';
$id = $_GET['id'];
$querysearch	="SELECT culinary_place.id, culinary_place.name, culinary_place.address, culinary_place.cp,culinary_place.open,culinary_place.close,culinary_place.capacity, ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) 
            As lat FROM culinary_place";
			   
$hasil=pg_query($querysearch);
while($baris = pg_fetch_array($hasil))
	{
		$id=$baris['id'];
        $name=$baris['name'];
        $address=$baris['address'];
        $cp=$baris['cp'];
        $close=$baris['close'];
        $open=$baris['open'];
        $capacity=$baris['capacity'];   
        $longitude=$baris['lng'];
		$latitude=$baris['lat'];
        $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'cp'=>$cp,'open'=>$open,'close'=>$close,'capacity'=>$capacity, 'lng'=>$longitude,'lat'=>$latitude);
    }
echo json_encode ($dataarray);
?>

