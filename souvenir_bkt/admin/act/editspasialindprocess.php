<?php
include ('../../../connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$address = $_POST['address'];
$cp = $_POST['cp'];

$owner = $_POST['owner'];
$status = $_POST['status'];
$jns = $_POST['jns'];

$employee = $_POST['employee'];
$geom = $_POST['geom'];
$sql = pg_query("update small_industry set name='$nama', address='$address', cp='$cp', owner='$owner', id_status='$status', id_industry_type='$jns', employee='$employee', geom=ST_GeomFromText('$geom', 0) where id='$id'");
if ($sql){
	header("location:../?page=detailcraft&id=$id");
}else {
	echo 'error';
}
?>