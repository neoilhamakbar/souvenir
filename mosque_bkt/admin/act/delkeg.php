<?php
include ('../../../connect.php');
$id = $_GET['id'];
	$sql1 = "delete from detail_event where id_det_event=$id";
	$sql   = "delete from event where id=$id";
	$delete1 = pg_query($sql1);
	$delete = pg_query($sql);
	if ($delete1){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listkeg'\");
		</script>";
	}
	else{
		echo 'error';

	}
	if ($delete){
			echo "<script>
		alert (' Data Successfully Delete');
		eval(\"parent.location='../?page=listkeg'\");
		</script>";
	}
	else{
		echo 'error';

	}

?>