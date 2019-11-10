<?php
require '../connect.php';

$bintang=$_GET['bintang'];

	if($bintang==1){
		$querysearch	="SELECT souvenir.id,souvenir.name,souvenir.address,souvenir.cp, newtable.id_souvenir,newtable.price,ST_X(ST_Centroid(souvenir.geom)) AS longitude, ST_Y(ST_CENTROID(souvenir.geom)) As latitude, newtable.product_souvenir from (select detail_product_souvenir.id_souvenir,detail_product_souvenir.price, string_agg(product_souvenir.product, ', ') as product_souvenir from detail_product_souvenir join product_souvenir on product_souvenir.id = detail_product_souvenir.id_product where detail_product_souvenir.price < '20000' group by detail_product_souvenir.id_souvenir,detail_product_souvenir.price) as newtable join souvenir on souvenir.id = newtable.id_souvenir ";	
		
	} else if($bintang ==2){
		$querysearch	=" SELECT souvenir.id,souvenir.name,ST_X(ST_Centroid(souvenir.geom)) AS longitude, ST_Y(ST_CENTROID(souvenir.geom)) As latitude from souvenir join detail_product_souvenir on souvenir.id=detail_product_souvenir.id_souvenir where detail_product_souvenir.price >= '20000' and detail_product_souvenir.price <= '50000' group by id ";	
	
	} else if($bintang ==3){
		$querysearch	=" SELECT souvenir.id,souvenir.name,ST_X(ST_Centroid(souvenir.geom)) AS longitude, ST_Y(ST_CENTROID(souvenir.geom)) As latitude from souvenir join detail_product_souvenir on souvenir.id=detail_product_souvenir.id_souvenir where detail_product_souvenir.price >= '20000' and detail_product_souvenir.price <= '50000' group by id ";	
	
				
	}else if($bintang ==4){
		$querysearch	=" SELECT souvenir.id,souvenir.name,ST_X(ST_Centroid(souvenir.geom)) AS longitude, ST_Y(ST_CENTROID(souvenir.geom)) As latitude from souvenir join detail_product_souvenir on souvenir.id=detail_product_souvenir.id_souvenir where detail_product_souvenir.price >= '20000' and detail_product_souvenir.price <= '50000' group by id ";	
	
							
	} else {
		$querysearch	=" SELECT souvenir.id,souvenir.name,souvenir.address,souvenir.cp, newtable.id_souvenir,newtable.price,ST_X(ST_Centroid(souvenir.geom)) AS longitude, ST_Y(ST_CENTROID(souvenir.geom)) As latitude, newtable.product_souvenir from (select detail_product_souvenir.id_souvenir,detail_product_souvenir.price, string_agg(product_souvenir.product, ', ') as product_souvenir from detail_product_souvenir join product_souvenir on product_souvenir.id = detail_product_souvenir.id_product where detail_product_souvenir.price > '50000' group by detail_product_souvenir.id_souvenir,detail_product_souvenir.price) as newtable join souvenir on souvenir.id = newtable.id_souvenir ";			
		
	}
	 
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
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
