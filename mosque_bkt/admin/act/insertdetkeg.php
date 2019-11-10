<?php
session_start();
include ('../../../connect.php');

$keg = $_POST['keg'];
$jam = $_POST['jam'];
$tgl = $_POST['tgl'];
$ustad = $_POST['ustad'];
$description = $_POST['description'];
$id_mesjid = $_SESSION['id_mesjid'];

// echo "id = $id_mesjid";
$sql = pg_query("insert into detail_event(date,time,id_ustad,id_event,id_worship_place,description) values ('$tgl','$jam','$ustad','$keg','$id_mesjid','$description')");

if ($sql){
	echo "<script>
		alert ('Data Successfully Added');
		eval(\"parent.location='../index1.php?page=listevent '\");
		</script>";
}else{
	echo 'error';
}
?>