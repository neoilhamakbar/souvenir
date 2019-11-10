<?php
include ('../../../connect.php');
$id = $_POST['id'];
$product = $_POST['product'];


$sql = pg_query("insert into product_small_industry (id, product) values ('$id', '$product')");


if ($sql){
	header("location:../?page=produkcraft");
}else{
	echo 'error';
}

?>