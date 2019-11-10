<?php
include ('../../../../connect.php');
$id_jenis_industri = $_POST['id_jenis_industri'];
$jenis = $_POST['jenis'];


$sql = pg_query("insert into jenis_industri (id_jenis_industri, nama_jenis_industri) values ('$id_jenis_industri', '$jenis')");


if ($sql){
	header("location:../?page=jenis");
}else{
	echo 'error';
}

?>