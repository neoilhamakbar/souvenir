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
$querysearch="select worship_place.id,worship_place.name,ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from worship_place join detail_facility on worship_place.id=detail_facility.id_worship_place where detail_facility.id_facility in ($c) group by id_worship_place,worship_place.id,worship_place.name";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$id=$row['id'];
		$name=$row['name'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('id'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>