<?php
include ('../../../../connect.php');

$id_jenis_oleh	= $_POST['id_jenis_oleh'];
$jenis_oleh = $_POST['jenis_oleh'];

$sql  = "update jenis_oleh_oleh set jenis_oleh='$jenis_oleh' where id_jenis_oleh=$id_jenis_oleh";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=jenissouvenirs");
}else{
	echo 'error';
}
?>