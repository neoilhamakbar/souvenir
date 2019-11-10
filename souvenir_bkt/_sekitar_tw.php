<?php

    include('../connect.php');
    
    $latit = $_GET['lat'];
    $longi = $_GET['lng'];
    $rad=$_GET['rad']/1000;

    //$querysearch="SELECT id, name, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), tourism.geom) as jarak FROM tourism  where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) <= ".$rad.""; 

    $querysearch = "SELECT
                          id, (
                            6371 * acos (
                              cos ( radians($latit) )
                              * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
                              * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians($longi) )
                              + sin ( radians($latit) )
                              * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
                            )
                          ) AS jarak, name, ST_Y(ST_CENTROID(geom)) as lat, ST_X(ST_CENTROID(geom)) as lng
                        FROM tourism
                        HAVING jarak <= $rad";

    $hasil=mysqli_query($conn, $querysearch);

        while($baris = mysqli_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $jarak=$baris['jarak'];
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'jarak'=>$jarak, "lat"=>$lat,"lng"=>$lng);
            }
            echo json_encode ($dataarray);
?>