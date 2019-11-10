<?php
include ('../../../../connect.php');

$id_jenis_industri	= $_POST['id_jenis_industri'];
$nama_jenis_industri = $_POST['nama_jenis_industri'];

$sql  = "update jenis_industri set nama_jenis_industri='$nama_jenis_industri' where id_jenis_industri=$id_jenis_industri";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=jenis");
}else{
	echo 'error';
}
?>