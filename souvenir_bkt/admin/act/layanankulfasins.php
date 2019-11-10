<?php
include ('../../../connect.php');

$query = pg_query("SELECT MAX(id) AS id FROM facility_culinary");
$result = pg_fetch_array($query);
$idmax = $result['id'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}
					
$facility = $_POST['facility'];


$count = count($facility);
$sql  = "insert into facility_culinary (id, facility) VALUES ";
 
for( $i=0; $i < $count; $i++ ){
	$sql .= "('{$idmax}','{$facility[$i]}')";
	$sql .= ",";
	$idmax++;
}
$sql = rtrim($sql,",");
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=fasculinary");
}else{
	echo 'error';
}
?>