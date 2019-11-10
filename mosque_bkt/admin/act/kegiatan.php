<?php
include ('../../../connect.php');
$id_keg = $_POST['id_keg'];
$nama_keg = $_POST['nama_keg'];
$deskripsi = $_POST['deskripsi'];
$jnis = $_POST['jenis'];
$sql = pg_query("insert into event (id, name, description, id_type_event) values ('$id_keg', '$nama_keg', '$deskripsi', '$jnis')");

if ($sql){
	echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../?page=listkeg '\");
		</script>";
}else{
	echo 'error';
}
?>