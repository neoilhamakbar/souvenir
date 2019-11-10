<?php
include ('../../../connect.php');
$id = $_POST['id'];
$name = $_POST['name'];


$sql = pg_query("insert into culinary (id, name) values ('$id', '$name')");


if ($sql){
	header("location:../?page=jenisculinary");
}else{
	echo 'error';
}

?>