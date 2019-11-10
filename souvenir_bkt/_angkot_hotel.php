<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  mysqli_query($conn, "SELECT detail_hotel.id_hotel,angkot.id,angkot.route_color,detail_hotel.id_angkot,hotel.name,hotel.id,detail_hotel.lat,detail_hotel.lng,detail_hotel.description, ST_X(ST_Centroid(hotel.geom)) AS longitude, ST_Y(ST_CENTROID(hotel.geom)) As latitude FROM detail_hotel left join angkot on detail_hotel.id_angkot=angkot.id left join hotel on detail_hotel.id_hotel=hotel.id where hotel.id='$id' ");

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