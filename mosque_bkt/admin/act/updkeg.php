<?php
include ('../../../connect.php');


$id	= $_POST['id'];
$nama_keg = $_POST['nama_keg'];
$id_jenis_keg = $_POST['id_jenis_keg'];
$deskripsi = $_POST['deskripsi'];

$sql  = "update event set name='$nama_keg', id_type_event='$id_jenis_keg', description='$deskripsi' where id=$id";
$update = pg_query($sql);

if ($update){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../?page=listkeg'\");
		</script>";
}else{
	echo 'error';
}
?>