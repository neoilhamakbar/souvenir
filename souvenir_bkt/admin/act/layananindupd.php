<?php
include ('../../../connect.php');

$id	= $_POST['id'];
$product = $_POST['product'];

$sql  = "update product_small_industry set product='$product' where id=$id";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=produkcraft");
}else{
	echo 'error';
}
?>