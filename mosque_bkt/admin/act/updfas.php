<?php
include ('../../../connect.php');

$id	= $_POST['id_fasilitas'];
$fasilitas = $_POST['fasilitas'];

$sql  = "update facility set name='$fasilitas' where id=$id";
$insert = pg_query($sql);

if ($insert){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../?page=fasilitas '\");
		</script>";
}else{
	echo 'error';
}
?>