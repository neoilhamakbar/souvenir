<?php
    include("../../connect.php");
    $id_ik = $_GET['id_ik'];
    $id_angkot = $_GET['id_angkot'];
    $result=  pg_query("SELECT * FROM detailangkotik WHERE id_ik='$id_ik' AND id_angkot='$id_angkot'");


    
    while($baris = pg_fetch_array($result))
    {
        $id_ik=$baris['id_ik'];
        $id_angkot=$baris['id_angkot'];
        $lat=$baris['lat'];
        $lng=$baris['lng'];

        $dataarray[]=array('id_ik'=>$id_ik,'id_angkot'=>$id_angkot,'lng'=>$lng,'lat'=>$lat);
    }
echo json_encode ($dataarray);
?>
