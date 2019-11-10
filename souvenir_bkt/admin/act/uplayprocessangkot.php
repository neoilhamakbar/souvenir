<?php
include ('../../../connect.php');
$id = $_POST['id'];
$destination = $_POST['destination'];

$sqldel = "delete from detail_culinary_place where id_culinary_place='$id'";

$delete = pg_query($sqldel);

$countl = count($destination);
if($countl > 0){
	$sqll   = "insert into detail_culinary_place (id_culinary_place, id_angkot) VALUES ";
	for( $i=0; $i < $countl; $i++ ){
		//$harga = $_POST['harga'.$destination[$i]];
		$sqll .= "('{$id}','{$destination[$i]}')";
		$sqll .= ",";
	}
	$sqll = rtrim($sqll,",");
	$insert = pg_query($sqll);
}
if (($insert||$countl==0) && $delete){
	//echo 'ok';
	header("location:../?page=detailculinary&id=$id");
}
else{
	echo 'error';
	//header("location:../?page=detailculinary&id=$id");
}

?>