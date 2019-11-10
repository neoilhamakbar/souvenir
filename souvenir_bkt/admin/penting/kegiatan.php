<?php
include ('../../../connect.php');

$query = pg_query("SELECT MAX(id_keg) AS id FROM kegiatan");
$result = pg_fetch_array($query);
$idmax = $result['id'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}
					
$kegiatan = $_POST['kegiatan'];
$jam = $_POST['jam'];
$tgl = $_POST['tgl'];
$deskripsi = $_POST['deskripsi'];
$peserta = $_POST['peserta'];
$penyelenggara = $_POST['penyelenggara'];

$count = count($kegiatan);
$sql  = "insert into kegiatan (id_keg, nama_keg, jam, tgl, deskripsi, peserta, penyelenggara ) VALUES ";
 
for( $i=0; $i < $count; $i++ ){
	$sql .= "('{$idmax}','{$kegiatan[$i]}', '{$jam[$i]}', '{$tgl[$i]}', '{$deskripsi[$i]}', '{$peserta[$i]}', '{$penyelenggara[$i]}')";
	$sql .= ",";
	$idmax++;
}
$sql = rtrim($sql,",");
$insert = pg_query($sql);

// if ($insert){
// 	header("location:../?page=kegiatan");
// }else{
// 	echo 'error';
// }
?>