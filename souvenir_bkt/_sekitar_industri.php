<?php

    include('../connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['long'];
    $rad=$_GET['rad']/1000;

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
  FROM small_industry
  HAVING jarak <= $rad";

    $hasil=mysqli_query($conn, $querysearch);
        while($baris = mysqli_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $cp=$baris['cp'];
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'cp'=>$cp,'address'=>$address, 'name'=>$name,"latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>