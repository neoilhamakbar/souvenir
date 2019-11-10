<?php

	include('../connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['long'];
	$rad=$_GET['rad'];

	$querysearch="SELECT id, name, address, land_size, building_size, park_area_size, capacity, est, last_renovation, imam, jamaah, teenager, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) as jarak FROM worship_place where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) <= ".$rad.""; 

	$hasil=pg_query($querysearch);

        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $land_size=$row['land_size'];
		  $building_size=$row['building_size'];
		  $park_area_size=$row['park_area_size'];
		  $capacity=$row['capacity'];
		  $est=$row['est'];
		  $last_renovation=$row['last_renovation'];
		  $imam=$row['imam'];
		  $jamaah=$row['jamaah'];
		  $teenager=$row['teenager'];
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open, 'close'=>$close,'ticket'=>$ticket, 'id_type'=>$id_type, "latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>