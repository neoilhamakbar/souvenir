<?php 
	include ('../../../../connect.php');
	$id = $_POST['id'];
	$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id.'_'.$sourcename;
		$filepath="../../image/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
		$sql = pg_query("update industri_kecil_region set foto='$name' where id='$id'");
		if($sql){
			header("location:../?page=detail&id=$id");
		}
	}
	else{
		echo "The Picture Isn't Valid!<br>";
		echo "Go Back To <a href='../?page=detail&id=$id'>halaman detail</a>";
	}
?>