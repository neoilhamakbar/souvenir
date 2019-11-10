<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_culinary_place.id_culinary_place,angkot.destination, angkot.route_color, detail_culinary_place.id_angkot,culinary_place.name,detail_culinary_place.lat, detail_culinary_place.lng, ST_X(ST_Centroid(culinary_place.geom)) AS longitude, ST_Y(ST_CENTROID(culinary_place.geom)) As latitude FROM detail_culinary_place left join angkot on detail_culinary_place.id_angkot=angkot.id left join culinary_place on detail_culinary_place.id_culinary_place=culinary_place.id where detail_culinary_place.id_culinary_place='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_culinary_place=$baris['id_culinary_place'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				 $lat=$baris['lat'];
                $lng=$baris['lng'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_culinary_place'=>$id_culinary_place,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,"latitude"=>$latitude,"longitude"=>$longitude,"lat"=>$lat,"lng"=>$lng);
            }
            echo json_encode ($dataarray);
?>