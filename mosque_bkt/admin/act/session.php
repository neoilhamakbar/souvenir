<?php 
include ('../../../connect.php'); 
session_start(); 
if(isset($_POST['username'])){ 
	$username = $_POST['username']; 
	$password = $_POST['password']; 
	$name = $_POST['name']; 
	$pass = md5(md5($password)); 
 
	$sql = pg_query("SELECT * FROM admin WHERE upper(username)=upper('$username') and password='$pass'"); 
	$num = pg_num_rows($sql); 
	$dt = pg_fetch_array($sql); 
	if($num==1){		 
		$_SESSION['username'] = $username; 
 
		if($dt['role']=='A'){		 
			$_SESSION['A'] = true; 
			?><script language="JavaScript">document.location='../'</script><?php 
			echo "<script>alert (' hyyy');</script>"; 
		} 
		if($dt['role']=='P'){ 
			$sql=pg_query("select max(stewardship_period) from admin where username='$dt[username]'"); 
			$dt2=pg_fetch_assoc($sql); 
			if($dt['stewardship_period']!=$dt2['max']) 
			{ 
			echo "<script> 
			alert (' Your Period is Expired !'); 
			eval(\"parent.location='../login.php '\");	 
			</script>"; 
			} 
			$_SESSION['P'] = true; 
			$_SESSION['username']=$dt['username']; 
			$_SESSION['id']=$dt['id']; 
			$_SESSION['name']=$dt['name']; 
			$query=pg_query("select * from worship_place where username='$dt[username]'"); 
			$data=pg_fetch_assoc($query); 
			$_SESSION['id_mesjid']=$data['id']; 
			?><script language="JavaScript">document.location='../index1.php'</script><?php 
		} 
		if($dt['role']=='C'){ 
			$_SESSION['C'] = true; 
			$_SESSION['username']=$dt['username']; 
			$_SESSION['id']=$dt['id']; 
			$_SESSION['name']=$dt['name']; 
			$query=pg_query("select * from worship_place where id='$dt[id]'"); 
			$data=pg_fetch_assoc($query); 
			$_SESSION['id']=$data['id']; 
			?><script language="JavaScript">document.location='../../index.php'</script><?php 
		}
		if ($dt['role'] == null) {
			echo "<script> 
			alert ('Check your account e-mail to verify !');
			eval(\"parent.location='../login.php '\");	 
			</script>";
		}
	 
 
		$result = pg_query("update admin set last_login = now() where username='$username'");	 
	}else{ 
		echo "<script> 
		alert (' Login Failed, Please Fill Your Username and Password Correctly !'); 
		eval(\"parent.location='../login.php '\");	 
		</script>"; 
	} 
} 
?>