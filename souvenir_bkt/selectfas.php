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
$querysearch="select culinary_place.id,culinary_place.name,ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) As lat from culinary_place join detail_facility_culinary on culinary_place.id=detail_facility_culinary.id_culinary_place where detail_facility_culinary.id_facility in ($c) group by id";
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		$id=$row['id'];
		$id_facility=$row['id'];
		$name=$row['name'];
		//$name=$row['name'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('id'=>$id,'id_facility'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>