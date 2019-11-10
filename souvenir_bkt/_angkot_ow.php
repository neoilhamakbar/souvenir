<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  mysqli_query($conn, "SELECT detail_tourism.id_tourism,angkot.id,angkot.route_color,detail_tourism.id_angkot,tourism.name,tourism.address,tourism.id,detail_tourism.lat,detail_tourism.lng,detail_tourism.description, ST_X(ST_Centroid(tourism.geom)) AS longitude, ST_Y(ST_CENTROID(tourism.geom)) As latitude FROM detail_tourism left join angkot on detail_tourism.id_angkot=angkot.id left join tourism on detail_tourism.id_tourism=tourism.id where tourism.id='$id' ");

        while($baris = mysqli_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id=$baris['id'];
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $description=$baris['description'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id'=>$id,'id'=>$id,'name'=>$name,'address'=>$address,'lat'=>$lat,'lng'=>$lng,'description'=>$description,'route_color'=>$route_color,"latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>