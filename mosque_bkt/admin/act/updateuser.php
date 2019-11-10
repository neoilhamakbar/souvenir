<?php
include ('../../../connect.php');

//$id = $_POST['id'];
$stewardship_period = $_POST['stewardship_period'];
$id = $_POST['id'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$pass = md5(md5($password));
$role = $_POST['role'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$periode = $_POST['periode'];
$username = $_POST['username'];
$aset = $_POST['aset'];

$sql  = "UPDATE admin set name='$nama', password='$pass', role='$role', hp='$no_hp', address='$alamat', stewardship_period='$periode', username='$username' where username='$username'";

$updateMesjid = pg_query("UPDATE worship_place set username=null where username='$username'"); 

$insert = pg_query($sql);
if($insert){
	for($i=0;$i<count($_POST['aset']);$i++){ 
		// echo"$username";
		$id = $_POST['aset'][$i]; 
		// echo "$id";
		$updateMesjid = pg_query("UPDATE worship_place set username='$username' where id = '$id'"); 
	} 
}

if ($insert)
	{
	echo "<script>alert ('Data Successfully Change');</script>";
	}
else
	{
	echo "<script>alert ('Error');</script>";
	}
	echo "<script>
		eval(\"parent.location='../?page=listpengurus'\");
		</script>";
?>