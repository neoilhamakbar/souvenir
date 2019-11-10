<?php 
include ('../../../connect.php');

$username = $_GET['username'];

$query = "UPDATE admin set role = 'C' where username = '$username' ";

$update = pg_query($query);
if ($update){
	echo "<script>
	alert ('Data Successfully Added');
	</script>";
}else{
	echo "<script>
	alert ('Error');
	</script>";
}
echo "<script>
	eval(\"parent.location='../index.php?page=verification '\");	
	</script>";

 ?>