<?php
include ('../../../../connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$pemilik = $_POST['pemilik'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$produk = $_POST['produk'];
$harga = $_POST['harga'];
$karyawan = $_POST['karyawan'];
$selectjns = $_POST['selectjns'];

$selectstat = $_POST['selectstat'];
$sql = pg_query("update industri_kecil_region set nama_industri='$nama', pemilik='$pemilik', cp='$telepon', alamat='$alamat', produk='$produk', harga_barang='$harga', jumlah_karyawan='$karyawan',id_jenis_industri='$selectjns',  id_status_tempat='$selectstat' where id='$id'");
if ($sql){
	echo "Success Updated!<br>";
	echo "Back to <a href='../'>Dashboard</a>";
}else {
	echo 'error';
}
?>