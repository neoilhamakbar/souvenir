<?php
include ('../../../connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$cp = $_POST['cp'];

$open = $_POST['open'];
$close = $_POST['close'];
$capacity = $_POST['capacity'];

$employee = $_POST['employee'];
$geom = $_POST['geom'];
$sql = pg_query("update culinary_place set name='$name', address='$address', cp='$cp', open='$open', close='$close', capacity='$capacity', employee='$employee', geom=ST_GeomFromText('$geom', 0) where id='$id'");
if ($sql){
	header("location:../?page=detailculinary&id=$id");
}else {
	echo 'error';
}
?>