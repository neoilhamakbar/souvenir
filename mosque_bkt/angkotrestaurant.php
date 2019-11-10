<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_restaurant.id_restaurant,angkot.destination, angkot.route_color, detail_restaurant.id_angkot,restaurant.name, ST_X(ST_Centroid(restaurant.geom)) AS longitude, ST_Y(ST_CENTROID(restaurant.geom)) As latitude, lat, lng, description FROM detail_restaurant left join angkot on detail_restaurant.id_angkot=angkot.id left join restaurant on detail_restaurant.id_restaurant=restaurant.id where detail_restaurant.id_restaurant='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_restaurant=$baris['id_restaurant'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				$lat=$baris['lat'];
				$lng=$baris['lng'];
				$description=$baris['description'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_restaurant'=>$id_restaurant,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,'latitude'=>$latitude,'longitude'=>$longitude, 'lat'=>$lat, 'lng'=>$lng, 'description'=>$description);
            }
            echo json_encode ($dataarray);
?>