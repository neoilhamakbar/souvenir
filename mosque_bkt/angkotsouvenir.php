<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_souvenir.id_souvenir,angkot.destination, angkot.route_color, detail_souvenir.id_angkot,souvenir.name, ST_X(ST_Centroid(souvenir.geom)) AS longitude, ST_Y(ST_CENTROID(souvenir.geom)) As latitude, lat, lng, description FROM detail_souvenir left join angkot on detail_souvenir.id_angkot=angkot.id left join souvenir on detail_souvenir.id_souvenir=souvenir.id where detail_souvenir.id_souvenir='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_souvenir=$baris['id_souvenir'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				$lat=$baris['lat'];
				$lng=$baris['lng'];
				$description=$baris['description'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_souvenir'=>$id_souvenir,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,'latitude'=>$latitude,'longitude'=>$longitude, 'lat'=>$lat, 'lng'=>$lng, 'description'=>$description);
            }
            echo json_encode ($dataarray);
?>