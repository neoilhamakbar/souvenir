<?php
require '../connect.php';
$tipe_ik = $_GET['tipe_ik'];
$querysearch	="SELECT small_industry.id, small_industry.name as nama,small_industry.address, small_industry.geom, small_industry.id_industry_type,industry_type.name, st_x(st_centroid(small_industry.geom)) as longitude, st_y(st_centroid(small_industry.geom)) as latitude from small_industry join industry_type on small_industry.id_industry_type=industry_type.id where small_industry.id_industry_type= '$tipe_ik'"; 

$hasil=mysqli_query($conn, $querysearch);
while($baris = mysqli_fetch_array($hasil))
	{
		$id=$baris['id'];
        $nama=$baris['nama'];
        $address=$baris['address'];
        $owner=$baris['owner'];
        $id_industry_type=$baris['id_industry_type'];
        $longitude=$baris['longitude'];
		$latitude=$baris['latitude'];
        $dataarray[]=array('id'=>$id,'id_industry_type'=>$id_industry_type,'nama'=>$nama,'address'=>$address, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);

?>