<?php
include ('../../../../connect.php');
$id = $_POST['id'];
$geom = $_POST['geom'];
$sql = pg_query("update industri_kecil_region set geom=ST_GeomFromText('$geom', 4326) where id='$id'");
if ($sql){
	header("location:../?page=detail&id=$id");
}else {
	echo 'error';
}
?>