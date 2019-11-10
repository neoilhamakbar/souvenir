<?php
include ('../../../connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$cp = $_POST['cp'];

$open = $_POST['open'];
$close = $_POST['close'];
$capacity = $_POST['capacity'];
// $fasilitas = $_POST['fasilitas'];
// $harga1 = $_POST['hargastart'];
// $harga2 = $_POST['hargaend'];
$employee = $_POST['employee'];

$geom = $_POST['geom'];
// $jenis_gambar=$_FILES['image']['type'];
// 	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
// 		$sourcename=$_FILES["image"]["name"];
// 		$name=$id.'_'.$sourcename;
// 		$filepath="../../image/".$name;
// 		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
// 	}
// 	else if ($foto=='null' || $foto=='' || $foto==null)
// 	{
// 		$foto = 'foto.jpg';
// 	}

$sql = pg_query("insert into culinary_place (id, name, address, cp, open, close, capacity, employee, geom) values ('$id', '$name', '$address', '$cp',  '$open', '$close', '$capacity', '$employee',  ST_GeomFromText('$geom'))");


if ($sql){
	header("location:../?page=forml&id=$id");
	//echo "Success Create Data!<br>";
	//echo "Back to <a href='../?page=culinary'>Dashboard</a>";
}else{
	echo 'error';
}

?>