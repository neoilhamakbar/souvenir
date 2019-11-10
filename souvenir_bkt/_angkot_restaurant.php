<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  mysqli_query($conn, "SELECT detail_restaurant.id_restaurant,angkot.id,angkot.route_color,detail_restaurant.id_angkot,restaurant.name,restaurant.address,restaurant.id,detail_restaurant.lat,detail_restaurant.lng,detail_restaurant.description, ST_X(ST_Centroid(restaurant.geom)) AS longitude, ST_Y(ST_CENTROID(restaurant.geom)) As latitude FROM detail_restaurant left join angkot on detail_restaurant.id_angkot=angkot.id left join restaurant on detail_restaurant.id_restaurant=restaurant.id where restaurant.id='$id' ");

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