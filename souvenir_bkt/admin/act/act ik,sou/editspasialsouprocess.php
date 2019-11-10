<?php
include ('../../../../connect.php');
$id_oleh_oleh = $_POST['id_oleh_oleh'];
$geom = $_POST['geom'];
$sql = pg_query("update oleh_oleh set geom=ST_GeomFromText('$geom', 4326) where id_oleh_oleh='$id_oleh_oleh'");
if ($sql){
	header("location:../?page=detailsouvenirs&id_oleh_oleh=$id_oleh_oleh");
}else {
	echo 'error';
}
?>