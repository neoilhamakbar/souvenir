<?php
include ('../../../connect.php');

$id	= $_POST['id'];
$name = $_POST['name'];

$sql  = "update culinary set name='$name' where id=$id";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=jenisculinary");
}else{
	echo 'error';
}
?>