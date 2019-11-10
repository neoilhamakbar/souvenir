<?php 
session_start();
include '../../../connect.php';
$id = $_POST['id'];
$nama = $_SESSION['username'];
$info = $_POST['info'];
// $user = $_SESSION['username'];
// echo "ini id $id, ini user $user, ini info $info";

$cariMax = "select max(id_informasi) as max from information_admin";
$queryMax = pg_query($cariMax);
$dataMax = pg_fetch_array($queryMax);

$id_informasi = 0;
if($dataMax['max'] == null){
	$id_informasi = 1;
} else {
	$id_informasi = $dataMax['max'] + 1;
}

$tanggal = date("Y-m-d");

$sql = "";
if(strpos($id,"RM") !== false){
	$sql = "INSERT into information_admin(username,id_kuliner,informasi,tanggal,id_informasi) values('$nama','$id','$info','$tanggal','$id_informasi')";
} else if(strpos($id,"SO") !== false){
	$sql = "INSERT into information_admin(username,id_souvenir,informasi,tanggal,id_informasi) values('$nama','$id','$info','$tanggal','$id_informasi')";
} else if(strpos($id,"IK") !== false){
	$sql = "INSERT into information_admin(username,id_ik,informasi,tanggal,id_informasi) values('$nama','$id','$info','$tanggal','$id_informasi')";
} else if(strpos($id,"H") !== false){
	$sql = "INSERT into information_admin(username,id_hotel,informasi,tanggal,id_informasi) values('$nama','$id','$info','$tanggal','$id_informasi')";
} else if(strpos($id,"OW") !== false){
	$sql = "INSERT into information_admin(username,id_ow,informasi,tanggal,id_informasi) values('$nama','$id','$info','$tanggal','$id_informasi')";
}
// echo $sql;
$query_sql = pg_query($sql);
if($query_sql)
{
	echo "<script>alert ('Data Successfully Added');</script>";
}
else
{
	echo "<script>alert ('Error');</script>";
}
if($_SESSION['A']){
	echo"<script>
		eval(\"parent.location='../index.php?page=detailcraft&id=$id'\");
		</script>";
}else{
	echo"<script>
		eval(\"parent.location='../indexu.php?page=detailcraft&id=$id'\");
		</script>";
}

?>