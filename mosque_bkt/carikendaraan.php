<?php
    include("../connect.php");
    $status=$_GET['status'];
    if ($status=='bus')
    {
        $result=  pg_query("SELECT a.id, a.name, ST_X(ST_Centroid(a.geom)) AS lng, ST_Y(ST_CENTROID(a.geom)) 
        As lat FROM worship_place as a where a.park_area_size>='50' order by a.name asc");
    }
    else if ($status=='cars')
    {
        $result=  pg_query("SELECT a.id, a.name, ST_X(ST_Centroid(a.geom)) AS lng, ST_Y(ST_CENTROID(a.geom)) 
        As lat FROM worship_place as a where a.park_area_size>='10' order by a.name asc");
       
    }
    else if ($status=='motor')
    {
        $result=  pg_query("SELECT a.id, a.name, ST_X(ST_Centroid(a.geom)) AS lng, ST_Y(ST_CENTROID(a.geom)) 
        As lat FROM worship_place as a where a.park_area_size>='5' order by a.name asc");
       
    }
        while($baris = pg_fetch_array($result))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
            }
            echo json_encode ($dataarray);
?>