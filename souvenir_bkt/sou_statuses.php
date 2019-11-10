<?php
require '../connect.php';
$status_souses = $_GET['status_souses'];
$querysearch	="SELECT 
souvenir.id,
souvenir.name,
souvenir.address,
souvenir.geom,
souvenir.id_status,
status.status,
ST_X(ST_CENTROID(souvenir.geom)) AS longitude,
ST_Y(ST_CENTROID(souvenir.geom)) AS latitude
FROM
souvenir
    JOIN
status ON souvenir.id_status = status.id
WHERE
souvenir.status = '$status_souses'"; 
$data = array();

$hasil=mysqli_query($conn, $querysearch);
while($baris = mysqli_fetch_array($hasil))
	{
		$id=$baris['id'];
        $name=$baris['name'];
        $address=$baris['address'];
        $owner=$baris['owner'];
        $id_status=$baris['id_status'];
        $longitude=$baris['longitude'];
		$latitude=$baris['latitude'];
        $tabel = 'sou';
        $dataarray[]=array('id'=>$id,'id_status'=>$id_status,'name'=>$name,'address'=>$address, 'longitude'=>$longitude,'latitude'=>$latitude,'tabel'=>$tabel);
    }


$querysearch2="SELECT 
small_industry.id,
small_industry.name,
small_industry.address,
small_industry.geom,
small_industry.id_status,
status.status,
ST_X(ST_CENTROID(small_industry.geom)) AS longitude,
ST_Y(ST_CENTROID(small_industry.geom)) AS latitude
FROM
small_industry
    JOIN
status ON small_industry.id_status = status.id
WHERE
small_industry.status = '$status_souses'"; 

$hasil2=mysqli_query($conn, $querysearch2);
while($baris = mysqli_fetch_array($hasil2))
    {
        $id=$baris['id'];
        $name=$baris['name'];
        $address=$baris['address'];
        $owner=$baris['owner'];
        $id_status=$baris['id_status'];
        $longitude=$baris['longitude'];
        $latitude=$baris['latitude'];
        $tabel = 'ik';
        $dataarray[]=array('id'=>$id,'id_status'=>$id_status,'name'=>$name,'address'=>$address, 'longitude'=>$longitude,'latitude'=>$latitude,'tabel'=>$tabel);
    }


echo json_encode ($dataarray);

?>