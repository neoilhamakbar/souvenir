<?php
require '../connect.php';
$info = $_GET["info"];
//$info = 'SO011';
$querysearch ="select id, name, address,rating,fasilitas_parkir,fasilitas_tempat_sholat, owner,cp,ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from souvenir where id='$info'";	   

$hasil=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $rating=$row['rating'];
		  $fasilitas_parkir=$row.['fasilitas_parkir'];
		  $fasilitas_tempat_sholat=$row.['fasilitas_tempat_sholat'];
		  $cp=$row['cp'];
		  $owner=$row['owner'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'rating'=>$rating,'fasilitas_parkir'=>$fasilitas_parkir,'fasilitas_tempat_sholat'=>$fasilitas_tempat_sholat,'owner'=>$owner,'cp'=>$cp,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
