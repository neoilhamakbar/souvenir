<?php
include ('../../../connect.php');

$query = pg_query("SELECT MAX(id) AS id FROM culinary");
$result = pg_fetch_array($query);
$idmax = $result['id'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}
					
$name = $_POST['name'];


$count = count($name);
$sql  = "insert into culinary (id, name) VALUES ";
 
for( $i=0; $i < $count; $i++ ){
	$sql .= "('{$idmax}','{$name[$i]}')";
	$sql .= ",";
	$idmax++;
}
$sql = rtrim($sql,",");
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=jenisculinary");
}else{
	echo 'error';
}
?>