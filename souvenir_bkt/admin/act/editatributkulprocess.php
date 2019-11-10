<?php
include ('../../../connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$cp = $_POST['cp'];

$open = $_POST['open'];
$close = $_POST['close'];
$capacity = $_POST['capacity'];

$employee = $_POST['employee'];
$sql = pg_query("update culinary_place set name='$name', address='$address', cp='$cp', open='$open', close='$close', capacity='$capacity', employee='$employee' where id='$id'");
if ($sql){
	echo "Success Updated!<br>";
	echo "Back to <a href='../?page=culinary'>Dashboard</a>";
}else {
	echo 'error';
}
?>