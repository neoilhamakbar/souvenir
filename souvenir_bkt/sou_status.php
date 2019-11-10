<?php
require '../connect.php';
$status_sou = $_GET['status_sou'];
$querysearch	="SELECT souvenir.id, souvenir.name,souvenir.address, souvenir.geom, souvenir.id_status,status.status, st_x(st_centroid(souvenir.geom)) as longitude, st_y(st_centroid(souvenir.geom)) as latitude from souvenir join status on souvenir.id_status=status.id where souvenir.id_status= '$status_sou'"; 
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


$querysearch2="SELECT small_industry.id, small_industry.name,small_industry.address, small_industry.geom, small_industry.id_status,status.status, st_x(st_centroid(small_industry.geom)) as longitude, st_y(st_centroid(small_industry.geom)) as latitude from small_industry join status on small_industry.id_status=status.id where small_industry.id_status= '$status_sou'"; 

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