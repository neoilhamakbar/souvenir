<?php
session_start();
include ('../../../connect.php');
$id = $_POST['id'];
$product_small_industry = $_POST['product_small_industry'];

$sqldel = "delete from detail_product_small_industry where id_small_industry='$id'";

$delete = pg_query($sqldel);

$countl = count($product_small_industry);
if($countl > 0){
	$sqll   = "insert into detail_product_small_industry (id_small_industry, id_product, price) VALUES ";
	for( $i=0; $i < $countl; $i++ ){
		$harga = $_POST['harga'.$product_small_industry[$i]];
		$sqll .= "('{$id}','{$product_small_industry[$i]}','{$harga}')";
		$sqll .= ",";
	}
	$sqll = rtrim($sqll,",");
	$insert = pg_query($sqll);
}
if (($insert||$countl==0) && $delete){
	//echo 'ok';
	if($_SESSION['A']===true){
		// echo"hai we";
		header("location:../index.php?page=detailcraft&id=$id");
	}else{
		// echo"hai sayang";
		header("location:../indexu.php?page=detailcraft&id=$id");	
	}
}
else{
	echo 'error';
	//header("location:../?page=detailculinary&id=$id");
}

?>