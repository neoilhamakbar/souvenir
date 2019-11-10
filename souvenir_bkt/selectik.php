<?php
require '../connect.php';


$lay=$_GET['lay'];
$lay = explode(",", $lay);
$c = "";
for($i=0;$i<count($lay);$i++){
	if($i == count($lay)-1){
		$c .= "'".$lay[$i]."'";
	}else{
		$c .= "'".$lay[$i]."',";
	}
}
$querysearch="select small_industry.id,small_industry.name,ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) As lat from small_industry join detail_product_small_industry on small_industry.id=detail_product_small_industry.id_small_industry where detail_product_small_industry.id_product in ($c) group by id";
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		$id=$row['id'];
		$name=$row['name'];
		//$name=$row['name'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('id'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>