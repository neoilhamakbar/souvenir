<?php
include ('../../../connect.php');
$id = $_POST['id'];
$fasilitas = $_POST['fasilitas'];
	$countl = count($fasilitas);
	$sqll   = "insert into detail_facility (id_worship_place, id_fasilitas) VALUES ";

	for( $i=0; $i < $countl; $i++ ){
		$sqll .= "('{$id}','{$fasilitas[$i]}')";
		$sqll .= ",";
	}
	$sqll = rtrim($sqll,",");
	$insert2 = pg_query($sqll);
	if ($insert2){
		header("location:../index1.php?page=content&id=$id");
	}
	else{
		echo 'error';
		header("location:../?page=content&id=$id");
	}

?>