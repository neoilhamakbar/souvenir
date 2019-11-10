<?php
require '../connect.php';
$cari = $_GET["cari"];
$date = $_GET['date'];
$time = $_GET['time'];
$querysearch ="SELECT event.name as event_name, worship_place.name as worship_place_name, worship_place.image, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event join event on detail_event.id_event=event.id join worship_place on detail_event.id_worship_place=worship_place.id join ustad on detail_event.id_ustad=ustad.id where detail_event.id_worship_place='$cari' and detail_event.time='$time' and detail_event.date='$date'";	   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id_worship_place=$row['id_worship_place'];
		  $worship_place_name=$row['worship_place_name'];
		  $event_name=$row['event_name'];
		  $date=$row['date'];
		  $ustad_name=$row['ustad_name'];
		  $description=$row['description'];
		  $time=$row['time'];
		  $image=$row['image'];
		  $latitude=$row['lat'];
		  $longitude=$row['lng'];
		  $dataarray[]=array('id_worship_place'=>$id_worship_place,'worship_place_name'=>$worship_place_name,'event_name'=>$event_name, 'date'=>$date, 'ustad_name'=>$ustad_name,'description'=>$description,'time'=>$time, 'image'=>$image,'lat'=>$latitude, 'lng'=>$longitude);
	}
	
echo json_encode ($dataarray);
?>
