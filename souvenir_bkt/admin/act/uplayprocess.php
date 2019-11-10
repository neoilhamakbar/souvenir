<?php
session_start();
include ('../../../connect.php');
$id = $_POST['id'];
$product_souvenir = $_POST['product_souvenir'];

$sqldel = "delete from detail_product_souvenir where id_souvenir='$id'";

$delete = pg_query($sqldel);

$countl = count($product_souvenir);
if($countl > 0){
	$sqll   = "insert into detail_product_souvenir (id_souvenir, id_product, price) VALUES ";
	for( $i=0; $i < $countl; $i++ ){
		$harga = $_POST['harga'.$product_souvenir[$i]];
		$sqll .= "('{$id}','{$product_souvenir[$i]}','{$harga}')";
		$sqll .= ",";
	}
	$sqll = rtrim($sqll,",");
	$insert = pg_query($sqll);
}
if (($insert||$countl==0) && $delete){
	//echo 'ok';
	if($_SESSION['A']===true){
		header("location:../index.php?page=detailsouvenir&id=$id");
	}else{
		header("location:../indexu.php?page=detailsouvenir&id=$id");	
	}
}
else{
	echo 'error';
	//header("location:../?page=detailculinary&id=$id");
}

?>