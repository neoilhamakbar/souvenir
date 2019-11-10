<?php
require '../connect.php';
$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(culinary_place.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT culinary_place.name,ST_X(ST_Centroid(culinary_place.geom)) 
				AS lon, ST_Y(ST_CENTROID(culinary_place.geom)) As lat) As l )) As properties 
				FROM culinary_place As culinary_place  
				) As f ) As fc ";

$hasil=mysqli_query($conn, $querysearch);
while($data=mysqli_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>