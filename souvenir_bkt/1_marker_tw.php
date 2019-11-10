<?php
require '../connect.php';

$cari = $_GET["cari"];

$querysearch	="SELECT id, nama, lokasi, jam_buka, jam_tutup, biaya, fasilitas, keterangan, st_x(st_centroid(geom)) as lon,st_y(st_centroid(geom)) as lat 
from _tempat_wisata where id='$cari'";
			   
$hasil=mysqli_query($conn, $querysearch);
while($baris = mysqli_fetch_array($hasil))
	{
		  $id=$baris['id'];
		  $nama=$baris['nama'];
		  $lokasi=$baris['lokasi'];
		  $jam_buka=$baris['jam_buka'];
		  $jam_tutup=$baris['jam_tutup'];
		  $biaya=$baris['biaya'];
		  $fasilitas=$baris['fasilitas'];
		  $keterangan=$baris['keterangan'];	
		  $longitude=$baris['lon'];
		  $latitude=$baris['lat'];
		  $dataarray[]=array('id'=>$id,'nama'=>$nama,'lokasi'=>$lokasi,'jam_buka'=>$jam_buka, 'jam_tutup'=>$jam_tutup,'biaya'=>$biaya,'fasilitas'=>$fasilitas,'keterangan'=>$keterangan,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
