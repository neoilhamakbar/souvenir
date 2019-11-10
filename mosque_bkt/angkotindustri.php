<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_small_industry.id_small_industry,angkot.destination, angkot.route_color, detail_small_industry.id_angkot,small_industry.name, ST_X(ST_Centroid(small_industry.geom)) AS longitude, ST_Y(ST_CENTROID(small_industry.geom)) As latitude, lat, lng, description FROM detail_small_industry left join angkot on detail_small_industry.id_angkot=angkot.id left join small_industry on detail_small_industry.id_small_industry=small_industry.id where detail_small_industry.id_small_industry='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_small_industry=$baris['id_small_industry'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				$lat=$baris['lat'];
				$lng=$baris['lng'];
				$description=$baris['description'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_small_industry'=>$id_small_industry,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,'latitude'=>$latitude,'longitude'=>$longitude, 'lat'=>$lat, 'lng'=>$lng, 'description'=>$description);
            }
            echo json_encode ($dataarray);
?>