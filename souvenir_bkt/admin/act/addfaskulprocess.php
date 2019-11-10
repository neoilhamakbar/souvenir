<?php
include ('../../../connect.php');
$id = $_POST['id'];
$facility = $_POST['facility'];


$sql = pg_query("insert into facility_culinary (id, facility) values ('$id', '$facility')");


if ($sql){
	header("location:../?page=fasculinary");
}else{
	echo 'error';
}

?>