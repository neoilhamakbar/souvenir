<?php 

include '../../connect.php';

$id_tempat_kuliner = $_GET['id_tempat_kuliner'];

$querySearch = "select detail_kuliner.*,tempat_kuliner.*,kuliner.* from detail_kuliner join tempat_kuliner on tempat_kuliner.id_tempat_kuliner = detail_kuliner.id_tempat_kuliner join kuliner on kuliner.id_kuliner = detail_kuliner.id_kuliner where detail_kuliner.id_tempat_kuliner = $id_tempat_kuliner";
$query = pg_query($querySearch);
$data = array();
while($row = pg_fetch_array($query))
{
	$data[] = $row;
}

echo json_encode($data)
?>