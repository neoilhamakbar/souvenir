<?php
include ('../../../../connect.php');
$id_jenis_oleh = $_POST['id_jenis_oleh'];
$jenis = $_POST['jenis'];


$sql = pg_query("insert into jenis_oleh_oleh (id_jenis_oleh, jenis_oleh) values ('$id_jenis_oleh', '$jenis')");


if ($sql){
	header("location:../?page=jenissouvenirs");
}else{
	echo 'error';
}

?>