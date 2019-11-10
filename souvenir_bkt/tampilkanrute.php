<?php
require '../connect.php';
$id=$_GET['id'];
// $querysearch="	SELECT row_to_json(fc) 
// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(a.geom)::json As geometry , row_to_json((SELECT l 
// 				FROM (SELECT a.id, a.destination,   a.track,a.route_color,  ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude) As l )) As properties 
// 				FROM angkot As a
// 				where a.id='$id'
// 				) As f ) As fc 
// 			  ";
$querysearch="SELECT id, destination, track, route_color, ST_AsGeoJson(geom) AS geom, ST_Y(ST_CENTROID(geom)) AS lat, ST_X(ST_CENTROID(geom)) AS lng FROM angkot where id='$id'";

$result=mysqli_query($conn, $querysearch);
$hasil = array(
	'type'  => 'FeatureCollection',
	'features' => array()
	);
  while ($isinya = mysqli_fetch_assoc($result)) {
	$features = array(
	  'type' => 'Feature',
	  'geometry' => json_decode($isinya['geom']),
	  
	  'properties' => array(
		'id' => $isinya['id'],
		'destination' => $isinya['destination'],
		'track' => $isinya['track'], 
		'route_color' => $isinya['route_color'],
		'lat' => $isinya['lat'],
		'lng' => $isinya['lng']
		)
	  );
	array_push($hasil['features'], $features);
  }
echo json_encode($hasil);
?>

