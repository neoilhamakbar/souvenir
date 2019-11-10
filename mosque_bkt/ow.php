<?php
require '../connect.php';
$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(a.the_geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT a.ow_nama,ST_X(ST_Centroid(a.the_geom)) AS lon, ST_Y(ST_CENTROID(a.the_geom)) As lat) As l )) As properties 
				FROM objek_wisata As a  
				) As f ) As fc
			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>