<?php 
include ('../../../connect.php'); 
	$nama = $_POST['nama']; 
	$periode = $_POST['periode']; 
	$alamat = $_POST['alamat']; 
	$no_hp = $_POST['no_hp']; 
	$role = $_POST['role']; 
	$user = $_POST['username']; 
	$password = $_POST['password']; 
	$pass = md5(md5($password)); 
	$sql = pg_query("INSERT into admin (name, stewardship_period, address, hp, role, username, password) values ('$nama', '$periode', '$alamat', '$no_hp','$role', '$user', '$pass')"); 
	if($sql){ 
		for($i=0;$i<count($_POST['id']);$i++){ 
			$id = $_POST['id'][$i]; 
			$updateMesjid = pg_query("UPDATE worship_place set username='$user' where id = '$id'");  
 
		} 
	} 
 
if ($sql) 
	{ 
   	echo "<script> 
	alert ('Data Successfully Added'); 
	</script>"; 
	} 
else 
	{ 
	echo "<script> 
	alert ('Error'); 
	</script>"; 
	} 
 
	echo "<script> 
	eval(\"parent.location='../index.php?page=listpengurus '\");	 
	</script>"; 
?>