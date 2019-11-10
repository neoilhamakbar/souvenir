<?php
include ('../../../connect.php');
$id_info = $_GET['id_informasi'];
$id = $_GET['id'];
//echo "$id_info --> id_info";

	$sql1   = "delete from information_admin where id_informasi = $id_info";
	$delete1 = pg_query($sql1);
	if ($delete1){
		echo "<script>alert ('Data Successfully Deleted');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}
	
	if($_SESSION['A']){
		echo"<script>
			eval(\"parent.location='../index.php?page=detailsouvenir&id=$id'\");
			</script>";
	}else{
		echo"<script>
			eval(\"parent.location='../indexu.php?page=detailsouvenir&id=$id'\");
			</script>";
	}
?>