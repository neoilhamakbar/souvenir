<?php
include ('../../../../connect.php');
$id_oleh_oleh = $_POST['id_oleh_oleh'];
$nama = $_POST['nama'];
$pemilik = $_POST['pemilik'];
$cp = $_POST['cp'];
$alamat = $_POST['alamat'];
$product = $_POST['product'];
$harga = $_POST['harga'];
$stat = $_POST['stat'];
$jml = $_POST['jml'];
$jns = $_POST['jns'];

$geom = $_POST['geom'];
$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id_oleh_oleh.'_'.$sourcename;
		$filepath="../../image/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
	}
	else if ($foto=='null' || $foto=='' || $foto==null)
	{
		$foto = 'foto.jpg';
	}

$sql = pg_query("insert into oleh_oleh (foto, id_oleh_oleh, nama_oleh_oleh, pemilik, cp, alamat,produk, harga_barang, id_status_tempat, jumlah_karyawan, id_jenis_oleh,  geom) values ('$name', '$id_oleh_oleh', '$nama', '$pemilik', '$cp', '$alamat', '$product', '$harga', '$stat', '$jml', '$jns',  ST_GeomFromText('$geom'))");


if ($sql){
	
	echo "Success Create Data!<br>";
	echo "Back to <a href='../?page=souvenirs'>Dashboard</a>";
}else{
	echo 'error';
}

?>