<?php

	include('../connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['long'];
	$rad=$_GET['rad']/1000;

	//$querysearch="SELECT id, name, owner, cp, address, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) as jarak FROM  souvenir where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) <= ".$rad.""; 

    $querysearch = "SELECT
    id, (
      6371 * acos (
        cos ( radians('$latit') )
        * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
        * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians('$longi') )
        + sin ( radians('$latit') )
        * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
      )
    ) AS jarak, name, ST_Y(ST_CENTROID(geom)) as lat, ST_X(ST_CENTROID(geom)) as lng
  FROM souvenir
  HAVING jarak <= $rad";

	$hasil=mysqli_query($conn, $querysearch);

        while($baris = mysqli_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $owner=$baris['owner'];
                $cp=$baris['cp'];
                $address=$baris['address'];
                $rating=$rating['rating'];
                
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'cp'=>$cp,'address'=>$address,'rating'=>$rating, "latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);

?>