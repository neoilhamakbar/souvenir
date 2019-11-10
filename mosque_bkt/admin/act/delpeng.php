<?php
include ('../../../connect.php');
$id = $_GET['username'];
	
	$sql   = "DELETE from admin where username='$id'";
	$sql1  = "UPDATE worship_place set username = null where username='$id'";
	$delete1 = pg_query($sql1);
	$delete = pg_query($sql);

	$delete = pg_query($sql);
	if ($delete)
	{
		echo "<script>alert ('Data Successfully Deleted');</script>";
	}
	else
	{
		echo "<script>alert ('Error');</script>";
	}

	echo "<script>eval(\"parent.location='../?page=listpengurus'\");</script>";
?>