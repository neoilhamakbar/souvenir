<?php
require 'inc/connect.php';
$id=$_GET["id"];
// date_default_timezone_set('Asia/Jakarta');
// $day=date("w");
// $query="SELECT distinct a.id_kecamatan, a.id,a.nama_industri, a.pemilik,a.cp,a.alamat,a.produk,a.harga_barang,a.foto,a.jumlah_karyawan, b.status, c.nama_jenis_industri, ,ST_X(ST_Centroid(a.geom)) AS lng, ST_Y(ST_CENTROID(a.geom)) As lat

//  FROM industri_kecil_region as a left join status_tempat as b on a.id_status_tempat=b.id_status_tempat left join jenis_industri as c on a.id_jenis_industri=c.id_jenis_industri, kecamatan where st_contains(kecamatan.geom, a.geom) and kecamatan.id_kecamatan='$id2' and c.id_jenis_industri='$' and b.id_status_tempat = '$cari' order by a.nama_industri ASC";


$query="SELECT industri_kecil_region.id,nama_industri,pemilik,cp,alamat,produk,harga_barang,foto,jumlah_karyawan, nama_jenis_industri,  status, ST_X(ST_Centroid(industri_kecil_region.geom)) AS lng, ST_Y(ST_CENTROID(industri_kecil_region.geom)) As lat FROM industri_kecil_region join status_tempat on status_tempat.id_status_tempat=industri_kecil_region.id_status_tempat join jenis_industri on jenis_industri.id_jenis_industri=industri_kecil_region.id_jenis_industri  where industri_kecil_region.id=$id ";


$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
	$id=$row['id'];
	$nama_industri=$row['nama_industri'];
	$pemilik=$row['pemilik'];
	$cp=$row['cp'];
	$alamat=$row['alamat'];
	$produk=$row['produk'];
	$harga_barang=$row['harga_barang'];
	$foto=$row['foto'];
	$jumlah_karyawan=$row['jumlah_karyawan'];
	$nama_jenis_industri=$row['nama_jenis_industri'];
	
	$status=$row['status'];
	 $lat=$row['lat'];
	$lng=$row['lng'];
	if ($lat=='' || $lat==''){
		$lat='<span style="color:red">Kosong</span>';
		$lng='<span style="color:red">Kosong</span>';
	}
	
if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}

}
?>
<!-- Default box -->
<div class="row">
	<div class="col-lg-7 col-xs-7 col-r-0">
		<div class="box">
			<div class="box-header with-border">
			  <h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $nama_industri ?></b></h2>
			</div>
			<div class="box-body">
				<table>
					<tbody  style='vertical-align:top;'>
						<tr><td><b>Pemilik</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $pemilik ?></td></tr>
						<tr><td><b>Telepon</b></td><td>:</td><td><?php echo $cp ?></td></tr>
						<tr><td><b>Alamat</b></td> <td> :</td><td><?php echo $alamat ?></td></tr>
						<tr><td><b>Produk<b> </td><td>: </td><td><?php echo $produk ?></td></tr>
						<tr><td><b>Kisaran Harga Barang<b> </td><td>: </td><td><?php echo $harga_barang ?></td></tr>
						<tr><td><b>Jumlah Karyawan<b> </td><td>: </td><td><?php echo $jumlah_karyawan ?></td></tr>
						<tr><td><b>Jenis Industri<b> </td><td>: </td><td><?php echo $nama_jenis_industri ?></td></tr>
						
						<tr><td><b>Status Tempat<b> </td><td>: </td><td><?php echo $status ?></td></tr>
						<tr><td><b>Data Spasial<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <b>Longitude</b> : <?php echo $lng ?></td></tr>
					</tbody>
				</table>
			</div>
			<br><!-- /.box-body -->
			<div class="box-footer">
				<div class="btn-group">
					<a href="?page=formeditatribut&id=<?php echo $id ?>" class="btn btn-default"><i class="fa fa-edit"></i> Data atribut</a>
					<a href="?page=formeditspasial&id=<?php echo $id ?>" class="btn btn-default"><i class="fa fa-edit"></i> Data spasial</a>
				</div>
				<br><br>
				<div class="btn-group">
				 <a href="?page=industry" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>
				 </div>
			</div><!-- /.box-footer-->
		</div><!-- /.box -->
	</div>
	<div class="col-lg-5 col-xs-5">
		<div class="box">
			<div class="box-header with-border">
			  <h2 class="box-title">Foto</h2>
			</div>
			<div class="box-body">
				<image src="../image/<?php echo "$foto"; ?>" style="width:100%;;">
			</div>
			<br>
			<div class="box-footer">
				<div class="btn-group">
					<a href="?page=formeditphoto&id=<?php echo $id ?>" class="btn btn-default"><i class="fa fa-picture-o"></i> Ganti Foto</a>
				</div>
			</div><!-- /.box-footer-->
		</div>
	</div>
</div>
<script>
	
</script>