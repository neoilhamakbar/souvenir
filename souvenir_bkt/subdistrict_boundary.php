<?php
require '../connect.php';
// $querysearch="	SELECT row_to_json(fc) 
// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(district.geom)::json As geometry , row_to_json((SELECT l 
// 				FROM (SELECT district.id,district.name,ST_X(ST_Centroid(district.geom)) AS lon, ST_Y(ST_CENTROID(district.geom)) As lat) As l )) As properties 
// 				FROM district As district  
// 				) As f ) As fc ";

$querysearch = "SELECT ST_AsGeoJson(geom) AS geom, ST_Y(ST_CENTROID(geom)) AS lat, ST_X(ST_CENTROID(geom)) AS lng, id, name  FROM district order by id ASC";


$result = mysqli_query($conn, $querysearch);
$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
while ($isinya = mysqli_fetch_assoc($result)) {
	$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geom']),
		
		'properties' => array(
			'id' => $isinya['id'],
			'name' => $isinya['name'],
        
            'lat' => $isinya['lat'],
			'lng' => $isinya['lng']
			)
		);
	array_push($hasil['features'], $features);
}
echo json_encode($hasil);

?>