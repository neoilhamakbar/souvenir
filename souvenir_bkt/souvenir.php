<?php
require '../connect.php';

// $geojson = array(
//   'type'      => 'FeatureCollection',
//   'features'  => array()
// );
// $querysearch="	SELECT row_to_json(fc) 
// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(souvenir.geom)::json As geometry , row_to_json((SELECT l 
// 				FROM (SELECT souvenir.name,ST_X(ST_Centroid(souvenir.geom)) 
// 				AS lon, ST_Y(ST_CENTROID(souvenir.geom)) As lat) As l )) As properties 
// 				FROM souvenir As souvenir  
// 				) As f ) As fc ";

// $querysearch = "SELECT ST_AsGeoJSON(souvenir.geom) As geometry from souvenir";

// $hasil=mysqli_query($conn, $querysearch);
// while($data=mysqli_fetch_array($hasil))
// 	{
// 		$feature = array(
//          'type' => 'Feature',
//          'geometry' => json_decode($data['geometry'], true)
     
//       );
//       array_push($geojson['features'], $feature);
// 	}

// $querysearch="	SELECT ST_AsGeoJSON(small_industry.geom) As geometry from small_industry ";

// $hasil=mysqli_query($conn, $querysearch);
// while($data=mysqli_fetch_array($hasil))
// 	{
// 		$feature = array(
//          'type' => 'Feature',
//          'geometry' => json_decode($data['geometry'], true)
     
//       );
//       array_push($geojson['features'], $feature);
// 	}
// 	echo json_encode($geojson);

$querysearch = "SELECT id, name, ST_AsGeoJson(geom) AS geom, ST_Y(ST_CENTROID(geom)) AS lat, ST_X(ST_CENTROID(geom)) AS lng FROM souvenir order by id ASC";

$result = mysqli_query($conn, $querysearch);
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
      'name' => $isinya['name'],
        
            'lat' => $isinya['lat'],
      'lng' => $isinya['lng']
      )
    );
  array_push($hasil['features'], $features);
}

$querysearch2 = "SELECT ST_AsGeoJson(geom) AS geom, ST_Y(ST_CENTROID(geom)) AS lat, ST_X(ST_CENTROID(geom)) AS lng, id, name  FROM small_industry order by id ASC";


$result2 = mysqli_query($conn, $querysearch2);
while ($isinya = mysqli_fetch_assoc($result2)) {
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