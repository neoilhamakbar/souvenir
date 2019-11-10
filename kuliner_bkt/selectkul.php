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
$querysearch="select culinary_place.id,culinary_place.name,ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) As lat from culinary_place join detail_culinary on culinary_place.id=detail_culinary.id_culinary_place where detail_culinary.id_culinary in ($c) group by id";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
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