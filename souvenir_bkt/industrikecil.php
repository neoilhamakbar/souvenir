<?php
require '../connect.php';
$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(industri_kecil_region.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT industri_kecil_region.nama_industri,ST_X(ST_Centroid(industri_kecil_region.geom)) 
				AS lon, ST_Y(ST_CENTROID(industri_kecil_region.geom)) As lat) As l )) As properties 
				FROM industri_kecil_region As industri_kecil_region  
				) As f ) As fc ";

$hasil=mysqli_query($conn, $querysearch);
while($data=mysqli_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>