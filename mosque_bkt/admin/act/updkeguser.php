<?php
session_start();
include ('../../../connect.php');

$keg = $_POST['keg'];
$jam = $_POST['jam'];
$tgl = $_POST['tgl'];
$ustad = $_POST['id_ustad'];
$description = $_POST['materi'];
$id_worship_place = $_POST['id_wor'];


$sql = "UPDATE detail_event set id_event='$keg',time='$jam',date='$tgl',id_ustad='$ustad',description='$description' where id_worship_place='$id_worship_place'";

$update = pg_query($sql);

if ($update){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../index1.php?page=listevent'\");
		</script>";
}else{
	echo 'error';
}
?>