<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_souvenir.id_souvenir,angkot.id,angkot.route_color,detail_souvenir.id_angkot,souvenir.name,souvenir.id,detail_souvenir.lat,detail_souvenir.lng,detail_souvenir.description, ST_X(ST_Centroid(souvenir.geom)) AS longitude, ST_Y(ST_CENTROID(souvenir.geom)) As latitude FROM detail_souvenir left join angkot on detail_souvenir.id_angkot=angkot.id left join souvenir on detail_souvenir.id_souvenir=souvenir.id where souvenir.id='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id=$baris['id'];
                $id=$baris['id'];
                $name=$baris['name'];
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $description=$baris['description'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id'=>$id,'id'=>$id,'name'=>$name,'lat'=>$lat,'lng'=>$lng,'description'=>$description,'route_color'=>$route_color,"latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>