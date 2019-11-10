<?php 
include ('../../../connect.php');
$id = $_GET['id'];

$sql   = "DELETE from detail_facility_culinary where id_facility='$id'";
$sql2   = "DELETE from facility_culinary where id='$id'";

$delete1 = pg_query($sql);
if ($delete1) 
{
	$delete2 = pg_query($sql2);
	echo "<script>alert ('Data Successfully Deleted');</script>";
}
else
{
	echo "<script>alert ('Error');</script>";
}

echo "<script>eval(\"parent.location='../?page=fasculinary'\");</script>";
 ?>
