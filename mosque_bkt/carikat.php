<?php
require '../connect.php';
$id = $_GET["id_kategori"];

$querysearch	="	SELECT a.id, a.name,a.id_category,ST_X(ST_Centroid(a.geom)) AS lng, ST_Y(ST_CENTROID(a.geom)) As lat FROM worship_place as a left join category_worship_place as b on a.id_category=b.id  where b.id=$id
				";
   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $id_category=$row['id_category'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'id_category'=>$id_category,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
