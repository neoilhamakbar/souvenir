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
$selectkec = $_POST['selectkec'];
$selectstat = $_POST['selectstat'];
$sql = pg_query("update oleh_oleh set nama_oleh_oleh='$nama', pemilik='$pemilik', cp='$telepon', alamat='$alamat', produk='$produk', harga_barang='$harga', jumlah_karyawan='$karyawan',id_jenis_oleh='$selectjns', id_kecamatan='$selectkec', id_status_tempat='$selectstat' where id_oleh_oleh='$id'");
if ($sql){
	echo "Success Updated!<br>";
	echo "Back to <a href='../?page=souvenirs'>Dashboard</a>";
}else {
	echo 'error';
}
?>