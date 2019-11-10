<?php
require '../../../../connect.php';
$id_oleh_oleh=$_GET['id_oleh_oleh'];
$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(a.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT id_oleh_oleh, nama_oleh_oleh) As l )) As properties 
				FROM oleh_oleh As a where id_oleh_oleh=$id_oleh_oleh
				) As f ) As fc
			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>