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
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 5000000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$sourcename;
		$name=$id.$serial_number.".jpg";
		$filepath="../../../_foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
	} else if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}
		
$sql = pg_query("insert into worship_place (id, name, address, capacity, geom, id_category, image, land_size, building_size, park_area_size, est, last_renovation, jamaah, imam, teenager) values ('$id', '$nama', '$alamat', '$kapasitas', ST_GeomFromText('$geom'), '$kategori', '$name', '$luas_tanah', '$luas_bangunan', '$luas_area_parkir', '$thn_berdiri', '$thn_renovasi_terakhir', '$jml_jamaah', '$jml_imam', '$jml_remaja')");


if ($sql){
	echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../'\");
		</script>";
}else{
	echo 'error';
}
	



?>