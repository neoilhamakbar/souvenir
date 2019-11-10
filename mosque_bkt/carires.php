<?php
require '../connect.php';

$cari_nama = $_GET["cari_nama"];
 

$querysearch	=" 	SELECT distinct a.gid,a.nama_kulin,a.alamat, a.cp, a.menu_spesi, a.jam_buka, a.jam_tutup, a.kapasitas, a.fasilitas, a.harga, a.jml_karyaw, a.status_ser,ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude
					FROM rm as a where upper(a.nama_kulin) like upper('%$cari_nama%')
				";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $gid=$row['gid'];
          $nama_kulin=$row['nama_kulin'];
          $alamat=$row['alamat'];
		  $cp=$row['cp'];
		  $menu_spesi=$row['menu_spesi'];
		  $jam_buka=$row['jam_buka'];
		  $jam_tutup=$row['jam_tutup'];
          $kapasitas=$row['kapasitas'];
		  $fasilitas=$row['fasilitas'];
		  $harga=$row['harga'];
		  $jml_karyaw=$row['jml_karyaw'];
		  $status_ser=$row['status_ser'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('gid'=>$gid,'nama_kulin'=>$nama_kulin, 'alamat'=>$alamat, 'cp'=>$cp, 'menu_spesi'=>$menu_spesi, 'jam_buka'=>$jam_buka, 'jam_tutup'=>$jam_tutup,'kapasitas'=>$kapasitas, 'fasilitas'=>$fasilitas, 'harga'=>$harga, 'jml_karyaw'=>$jml_karyaw, 'status_ser'=>$status_ser, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>