<?php
include ('../../../connect.php');

$query = pg_query("SELECT MAX(id) AS id FROM product_souvenir");
$result = pg_fetch_array($query);
$idmax = $result['id'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}
					
$product = $_POST['product'];


$count = count($product);
$sql  = "insert into product_souvenir (id, product) VALUES ";
 
for( $i=0; $i < $count; $i++ ){
	$sql .= "('{$idmax}','{$product[$i]}')";
	$sql .= ",";
	$idmax++;
}
$sql = rtrim($sql,",");
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=produksouvenir");
}else{
	echo 'error';
}
?>