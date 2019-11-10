<?php
include ('../../../connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$luas_tanah = $_POST['luas_tanah'];
$luas_bangunan = $_POST['luas_bangunan'];
$luas_area_parkir = $_POST['luas_area_parkir'];
$kapasitas = $_POST['kapasitas'];
$thn_berdiri = $_POST['thn_berdiri'];
$thn_renovasi_terakhir = $_POST['thn_renovasi_terakhir'];
$jml_imam = $_POST['jml_imam'];
$jml_jamaah = $_POST['jml_jamaah'];
$jml_remaja = $_POST['jml_remaja'];
$kategori = $_POST['kategori'];
$geom = $_POST['geom'];
$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 600000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id.'_'.$sourcename;
		$filepath="../../foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
	} else if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}
$sql = pg_query("update worship_place set name='$nama', address='$alamat', land_size='$luas_tanah', building_size='$luas_bangunan', park_area_size='$luas_area_parkir', capacity='$kapasitas', est='$thn_berdiri', last_renovation='$thn_renovasi_terakhir', imam='$jml_imam', jamaah='$jml_jamaah', teenager='$jml_remaja', id_category='$kategori', image='$name', geom=ST_GeomFromText('$geom') where id='$id'");
if ($sql){
	echo "<script>
		alert (' Data Successfully Change');
		eval(\"parent.location='../index.php?page=detail&id=$id '\");	
		</script>";
}else {
	echo 'error';
}
?>