<?php
require '../connect.php';
if(isset($_GET['tgl']))
{
$temp = $_GET['tgl']; 
$temp = explode("-",$temp);
$tgl = $temp[2]."-".$temp[0]."-".$temp[1];

$querysearch = "SELECT d.id_worship_place, d.date, d.time, b.name as event_name, a.name as worship_place_name, ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude from worship_place as a, event as b left join detail_event as d ON b.id=d.id_event where d.date='$tgl' and a.id=d.id_worship_place group by id_event, id_worship_place, a.name, b.name, d.date, d.time,geom";

			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $event_name=$row['event_name'];
		  $worship_place_name=$row['worship_place_name'];
      $date=$row['date'];
      $time=$row['time'];
          $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
          $dataarray[]=array('event_name'=>$event_name,'worship_place_name'=>$worship_place_name,'date'=>$date, 'time'=>$time,'longitude'=>$longitude, 'latitude'=>$latitude, 'id_worship_place'=>$row['id_worship_place']);
    }
echo json_encode ($dataarray);
}
else
{
	$querysearch = "SELECT worship_place.id, ST_X(ST_Centroid(worship_place.geom)) AS longitude, ST_Y(ST_CENTROID(worship_place.geom)) As latitude from worship_place where worship_place.id not in ($_GET[id_worship_place])";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
      $nama=$row['event_name'];
      $nama_mes=$row['worship_place_name'];
          $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
          $dataarray[]=array('longitude'=>$longitude, 'latitude'=>$latitude, 'id_worship_place'=>$row['id_worship_place']);
    }
echo json_encode ($dataarray);	
}
?>