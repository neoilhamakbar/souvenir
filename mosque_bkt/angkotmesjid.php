<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_worship_place.id_worship_place,angkot.destination, angkot.route_color, detail_worship_place.id_angkot,worship_place.name, detail_worship_place.lat, detail_worship_place.lng, ST_X(ST_Centroid(worship_place.geom)) AS longitude, ST_Y(ST_CENTROID(worship_place.geom)) As latitude FROM detail_worship_place left join angkot on detail_worship_place.id_angkot=angkot.id left join worship_place on detail_worship_place.id_worship_place=worship_place.id where detail_worship_place.id_worship_place='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_worship_place=$baris['id_worship_place'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				$lat=$baris['lat'];
                $lng=$baris['lng'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_worship_place'=>$id_worship_place,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,"latitude"=>$latitude,"longitude"=>$longitude, "lat"=>$lat,"lng"=>$lng);
            }
            echo json_encode ($dataarray);
?>