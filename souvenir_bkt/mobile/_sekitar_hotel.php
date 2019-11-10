<?php

	include('../../connect.php');
       $latit = $_GET['latitude'];
    $longi = $_GET['longitude'];
	$rad=$_GET['rad'];

	$querysearch="SELECT id, name, address, cp, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")'), geom) as jarak FROM hotel where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")'), geom) <= ".$rad.""; 

	$hasil=pg_query($querysearch);

        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $cp=$baris['cp'];
               
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'cp'=>$cp, "latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>