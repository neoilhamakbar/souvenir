<?php
include ('../../../connect.php');
$id = $_GET['id'];
	$sql   = "delete from detail_event where id_event='$id'";
	
	$delete = pg_query($sql);
	if ($delete){
			echo "<script>
		alert (' Data Has Been Delete');
		eval(\"parent.location='../index1.php?page=listevent'\");
		</script>";
	}
	else{
		echo 'error';

	}

?>