<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  mysqli_query($conn, "SELECT detail_small_industry.id_small_industry,angkot.id,angkot.route_color,detail_small_industry.id_angkot,small_industry.name,small_industry.id,detail_small_industry.lat,detail_small_industry.lng,detail_small_industry.description, ST_X(ST_Centroid(small_industry.geom)) AS longitude, ST_Y(ST_CENTROID(small_industry.geom)) As latitude FROM detail_small_industry left join angkot on detail_small_industry.id_angkot=angkot.id left join small_industry on detail_small_industry.id_small_industry=small_industry.id where small_industry.id='$id' ");

        while($baris = mysqli_fetch_array($result))
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