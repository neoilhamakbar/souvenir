<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  pg_query("SELECT detail_culinary_place.id_culinary_place,angkot.id,angkot.route_color, detail_culinary_place.id_angkot,culinary_place.name, ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) As lat FROM detail_culinary_place left join angkot on detail_culinary_place.id_angkot=angkot.id left join culinary_place on detail_culinary_place.id_culinary_place=culinary_place.id where detail_culinary_place.id_culinary_place='$id' ");

        while($baris = pg_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $route_color=$baris['route_color'];
                $id=$baris['id'];
                $id_angkot = $baris['id'];
                $name=$baris['name'];
                
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id'=>$id,'id_angkot'=>$id,'name'=>$name,'route_color'=>$route_color,"latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>