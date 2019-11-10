<?php

	include('../../connect.php');
      $latit = $_GET['latitude'];
    $longi = $_GET['longitude'];
	$rad=$_GET['rad'];

	$querysearch="SELECT id, name, owner, cp, address, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) as jarak FROM  souvenir where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) <= ".$rad.""; 

	$hasil=pg_query($querysearch);

        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $owner=$baris['owner'];
                $cp=$baris['cp'];
                $address=$baris['address'];
                
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'cp'=>$cp,'address'=>$address, "latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);

?>