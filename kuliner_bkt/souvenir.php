<?php
require '../connect.php';
$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(oleh_oleh.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT oleh_oleh.nama_oleh_oleh,ST_X(ST_Centroid(oleh_oleh.geom)) 
				AS lon, ST_Y(ST_CENTROID(oleh_oleh.geom)) As lat) As l )) As properties 
				FROM oleh_oleh As oleh_oleh  
				) As f ) As fc ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>