<?php
include ('../../../connect.php');

$id	= $_POST['id'];
$facility = $_POST['facility'];

$sql  = "update facility_culinary set facility='$facility' where id='$id'";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=fasculinary");
}else{
	echo 'error';
}
?>