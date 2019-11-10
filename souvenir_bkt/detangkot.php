<?php
require '../connect.php';
$info = $_GET["info"];
$querysearch ="select angkot.id, angkot.destination, angkot.track, angkot_color.color,ST_X(ST_Centroid(angkot.geom)) AS longitude, ST_Y(ST_CENTROID(angkot.geom)) As latitude from angkot join angkot_color on angkot.id_color=angkot_color.id where angkot.id='$info'";	   
$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $destination=$row['destination'];
		  $track=$row['track'];
		  $color=$row['color'];
		  //$owner=$row['owner'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id'=>$id,'destination'=>$destination,'track'=>$track,'color'=>$color,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
