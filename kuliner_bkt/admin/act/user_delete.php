<?php
include ('../../../connect.php');
$id = $_GET['username'];
	
	$sql   = "DELETE from admin where username='$id'";
	$sql1  = "UPDATE culinary_place set username = null where username='$id'";
	$sql2  = "UPDATE souvenir set username = null where username='$id'";
	$sql3  = "UPDATE small_industry set username = null where username='$id'";
	$sql4  = "UPDATE hotel set username = null where username='$id'";
	$sql5  = "UPDATE tourism set username = null where username='$id'";
	$delete1 = pg_query($sql1);
	$delete2 = pg_query($sql2);
	$delete3 = pg_query($sql3);
	$delete4 = pg_query($sql4);
	$delete5 = pg_query($sql5);
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

	echo "<script>eval(\"parent.location='../?page=user_management'\");</script>";
?>