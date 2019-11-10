<?php
include ('../connect.php');
$id=$_GET["id"];
$dataarray=array();
 
$sql=pg_query("select distinct facility.id, facility.name from worship_place,detail_facility,facility where detail_facility.id_facility=facility.id and worship_place.id=detail_facility.id_worship_place  order by facility.id");
			
while($row = pg_fetch_array($sql)){
	$id=$row['id'];
	$name=$row['name'];
	$dataarray[]=array('id'=>$id,'name'=>$name);
}
echo json_encode ($dataarray);
   			  
?>