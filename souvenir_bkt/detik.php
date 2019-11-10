<?php
require '../connect.php';
$info = $_GET["info"];

$querysearch ="select small_industry.id,small_industry.name,small_industry.address,small_industry.cp,small_industry.id_status,small_industry.id_industry_type,small_industry.owner,newtable.id_small_industry,newtable.price,ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) As lat, newtable.product_small_industry from (select detail_product_small_industry.id_small_industry,detail_product_small_industry.price, string_agg(product_small_industry.product, ', ') as product_small_industry from detail_product_small_industry join product_small_industry on product_small_industry.id = detail_product_small_industry.id_product where detail_product_small_industry.id_small_industry='$info' group by detail_product_small_industry.id_small_industry,detail_product_small_industry.price) as newtable join small_industry on small_industry.id = newtable.id_small_industry";
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $cp=$row['cp'];
		  $owner=$row['owner'];
		  $price=$row['price'];
		  $product_small_industry=$row['product_small_industry'];		 
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];

		$stat=$row['id_status'];
		$status= '';
		if ($stat=='a'){
		$status = 'Sales';
		} else if ($stat=='b') {
		$status = 'Manufacture';
		} else if ($stat=='c'){
		$status = 'Sales & Manufacture';
		}

		$typ=$row['id_industry_type'];
		$type= '';
		  if ($typ='a'){
		  $type = 'Various Sulaman';
		} else if ($typ=='b') {
		  $type = 'Various Bordiran';
		} else if ($typ=='c') {
		  $type = 'Sulaman & Bordiran';
		} else if ($typ=='d') {
		  $type = 'Tenunan';
		}

		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'cp'=>$cp,'owner'=>$owner,'status'=>$status,'type'=>$type,'close'=>$close,'product_small_industry'=>$product_small_industry,'price'=>$price,'longitude'=>$longitude,'latitude'=>$latitude);
	}
	
echo json_encode ($dataarray);
?>