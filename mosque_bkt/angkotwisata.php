<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_tourism.id_tourism,angkot.destination, angkot.route_color, detail_tourism.id_angkot,tourism.name, ST_X(ST_Centroid(tourism.geom)) AS longitude, ST_Y(ST_CENTROID(tourism.geom)) As latitude, lat, lng, description FROM detail_tourism left join angkot on detail_tourism.id_angkot=angkot.id left join tourism on detail_tourism.id_tourism=tourism.id where detail_tourism.id_tourism='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_tourism=$baris['id_tourism'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				$lat=$baris['lat'];
				$lng=$baris['lng'];
				$description=$baris['description'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_tourism'=>$id_tourism,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,'latitude'=>$latitude,'longitude'=>$longitude, 'lat'=>$lat, 'lng'=>$lng, 'description'=>$description);
            }
            echo json_encode ($dataarray);
?>