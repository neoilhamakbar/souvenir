<?php
include ('../../../connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$pemilik = $_POST['pemilik'];
$cp = $_POST['cp'];
$alamat = $_POST['alamat'];
$product = $_POST['product'];
$harga = $_POST['harga'];
$stat = $_POST['stat'];
$jml = $_POST['jml'];
$jns = $_POST['jns'];
$kecam = $_POST['kecam'];
$geom = $_POST['geom'];

$sql = pg_query("insert into industri_kecil_region (id, nama_industri, pemilik, cp, alamat,produk, harga_barang, id_status_tempat, jumlah_karyawan, id_jenis_industri, id_kecamatan, geom) values ('$id', '$nama', '$pemilik', '$cp', '$alamat', '$product', '$harga', '$stat', '$jml', '$jns', '$kecam', ST_GeomFromText('$geom'))");

?>