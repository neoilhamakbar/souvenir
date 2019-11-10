<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_hotel.id_hotel,angkot.destination, angkot.route_color, detail_hotel.id_angkot,hotel.name, ST_X(ST_Centroid(hotel.geom)) AS longitude, ST_Y(ST_CENTROID(hotel.geom)) As latitude, lat, lng, description FROM detail_hotel left join angkot on detail_hotel.id_angkot=angkot.id left join hotel on detail_hotel.id_hotel=hotel.id where detail_hotel.id_hotel='$id' ");

       while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_hotel=$baris['id_hotel'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				$lat=$baris['lat'];
				$lng=$baris['lng'];
				$description=$baris['description'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_hotel'=>$id_hotel,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,'latitude'=>$latitude,'longitude'=>$longitude, 'lat'=>$lat, 'lng'=>$lng, 'description'=>$description);
            }
            echo json_encode ($dataarray);
?>