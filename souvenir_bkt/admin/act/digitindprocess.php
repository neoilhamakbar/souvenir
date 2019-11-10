<?php
include ('../../../connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$cp = $_POST['cp'];
$owner = $_POST['owner'];
$status = $_POST['status'];
$jns = $_POST['jns'];
$employee = $_POST['employee'];
$geom = $_POST['geom'];

$sql = pg_query("insert into small_industry (id, name, address, cp, owner, id_status, id_industry_type, employee, geom) values ('$id', '$name', '$address', '$cp',  '$owner', '$status', '$jns', '$employee',  ST_GeomFromText('$geom'))");


if ($sql){
	header("location:../?page=forml2&id=$id");
	//echo "Success Create Data!<br>";
	//echo "Back to <a href='../?page=culinary'>Dashboard</a>";
}else{
	echo 'error';
}

?>