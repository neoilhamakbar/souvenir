<?php 
	include ('../../../connect.php');
	$id = $_POST['id'];
	$querysearch="select serial_number from souvenir_gallery where id='$id' order by serial_number desc limit 1";


	 $hasil=pg_query($querysearch);
	 $serial_number = 1;
	 while($baris = pg_fetch_array($hasil))
	 {
	 	$angka = $baris['serial_number'] + 1;
	 	$serial_number = $angka;
	 }

	$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$sourcename;
		$filepath="../../../_foto/".$name;


		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
		$sql = pg_query("insert into souvenir_gallery values('$serial_number','$id','$name')");
		if($sql){
			header("location:../?page=detailsouvenir&id=$id");
		}
	}

	else{
		echo "The Picture Isn't Valid!<br>";
		echo "Go Back To <a href='../?page=detailsouvenir&id=$id'>halaman detail</a>";
	}
?>