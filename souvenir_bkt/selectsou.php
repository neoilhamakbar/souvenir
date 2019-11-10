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
$querysearch="select souvenir.id,souvenir.name,ST_X(ST_Centroid(souvenir.geom)) AS lng, ST_Y(ST_CENTROID(souvenir.geom)) As lat from souvenir join detail_product_souvenir on souvenir.id=detail_product_souvenir.id_souvenir where detail_product_souvenir.id_product in ($c) group by id";
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