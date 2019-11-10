<?php
require '../connect.php';

$harga=$_GET['harga'];

	if($harga==1){
		$querysearch	="SELECT small_industry.id,small_industry.name,small_industry.address,small_industry.cp,newtable.id_small_industry,newtable.price,ST_X(ST_Centroid(small_industry.geom)) AS longitude, ST_Y(ST_CENTROID(small_industry.geom)) As latitude, newtable.product_small_industry from (select detail_product_small_industry.id_small_industry,detail_product_small_industry.price, string_agg(product_small_industry.product, ', ') as product_small_industry from detail_product_small_industry join product_small_industry on product_small_industry.id = detail_product_small_industry.id_product where detail_product_small_industry.price < '100000' group by detail_product_small_industry.id_small_industry,detail_product_small_industry.price) as newtable join small_industry on small_industry.id = newtable.id_small_industry ";	
		
	} else if($harga ==2){
		$querysearch	=" SELECT small_industry.id,small_industry.name,ST_X(ST_Centroid(small_industry.geom)) AS longitude, ST_Y(ST_CENTROID(small_industry.geom)) As latitude from small_industry join detail_product_small_industry on small_industry.id=detail_product_small_industry.id_small_industry where detail_product_small_industry.price >= '100000' and detail_product_small_industry.price <= '500000' group by id ";	
	
				
	} else {
		$querysearch	=" SELECT small_industry.id,small_industry.name,small_industry.address,small_industry.cp,newtable.id_small_industry,newtable.price,ST_X(ST_Centroid(small_industry.geom)) AS longitude, ST_Y(ST_CENTROID(small_industry.geom)) As latitude, newtable.product_small_industry from (select detail_product_small_industry.id_small_industry,detail_product_small_industry.price, string_agg(product_small_industry.product, ', ') as product_small_industry from detail_product_small_industry join product_small_industry on product_small_industry.id = detail_product_small_industry.id_product where detail_product_small_industry.price > '500000' group by detail_product_small_industry.id_small_industry,detail_product_small_industry.price) as newtable join small_industry on small_industry.id = newtable.id_small_industry ";			
		
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
