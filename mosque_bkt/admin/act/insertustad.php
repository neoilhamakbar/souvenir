<?php
	include ('../../../connect.php');
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$sql = pg_query("insert into ustad (id, name, address, cp) values ('$id', '$nama', '$alamat', '$no_hp')");
	
	if ($sql){
			echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../?page=listustad'\");
		</script>";
}else{
	echo 'error';
}
?>