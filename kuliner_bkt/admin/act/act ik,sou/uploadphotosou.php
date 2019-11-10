<?php 
	include ('../../../../connect.php');
	$id_oleh_oleh = $_POST['id_oleh_oleh'];
	$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id_oleh_oleh.'_'.$sourcename;
		$filepath="../../image/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
		$sql = pg_query("update oleh_oleh set foto='$name' where id_oleh_oleh='$id_oleh_oleh'");
		if($sql){
			header("location:../?page=detailsouvenirs&id_oleh_oleh=$id_oleh_oleh");
		}
	}
	else{
		echo "The Picture Isn't Valid!<br>";
		echo "Go Back To <a href='../?page=detailsouvenirs&id_oleh_oleh=$id_oleh_oleh'>halaman detail</a>";
	}
?>