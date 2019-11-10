<?php
include ('../../../connect.php');
$id_fasilitas = $_GET['id_fasilitas'];
	$sql1   = "delete from detail_facility where id_facility=$id_fasilitas";
	$sql   = "delete from facility where id=$id_fasilitas";
	
	$delete1 = pg_query($sql1);
	if ($delete1){
	echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=fasilitas'\");
		</script>";
	}
	else{
		echo 'error';

	}
	
	$delete = pg_query($sql);
	if ($delete){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=fasilitas'\");
		</script>";
	}
	else{
		echo 'error';

	}

?>