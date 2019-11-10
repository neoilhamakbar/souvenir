<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
			<div id="form">
			<?php if (isset($_GET['id_oleh_oleh'])){
				$id_oleh_oleh=$_GET['id_oleh_oleh'];
				$sql = pg_query("SELECT * FROM oleh_oleh where id_oleh_oleh=$id_oleh_oleh");
				$data =  pg_fetch_array($sql);
			?>
				<h4 style="text-transform:capitalize;">Ubah Data Atribut <?php echo $data['nama_oleh_oleh'] ?></h4>
				<form role="form" action="act/editatributsouprocess.php" method="post">
				<a href="?page=detailsouvenirs&id_oleh_oleh=<?php echo $id_oleh_oleh ?>" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>
				<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Save</button>
				<br><br><br>
					<input type="text" class="form-control hidden" name="id" value="<?php echo $id_oleh_oleh ?>">
					<div class="form-group" style="clear:both">
						<label for="nama">Nama Souvenir</label>
						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama_oleh_oleh'] ?>">
					</div>
					<div class="form-group" style="clear:both">
						<label for="pemilik">Pemilik</label>
						<input type="text" class="form-control" name="pemilik" value="<?php echo $data['pemilik'] ?>">
					</div>
					<div class="form-group">
						<label for="telepon">Telepon</label>
						<input type="text" class="form-control" name="telepon" value="<?php echo $data['cp'] ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>">
					</div>
					<div class="form-group">
						<label for="produk">Produk</label>
						<input type="text" class="form-control" name="produk" value="<?php echo $data['produk'] ?>">
					</div>
					<div class="form-group">
						<label for="harga">Kisaran Harga</label>
						<input type="text" class="form-control" name="harga" value="<?php echo $data['harga_barang'] ?>">
					</div>
					<div class="form-group">
						<label for="karyawan">Jumlah Karyawan</label>
						<input type="text" class="form-control" name="karyawan" value="<?php echo $data['jumlah_karyawan'] ?>">
					</div>
					<div class="form-group">
						<label for="selectjns">Jenis Souvenir</label>
						<select required name="selectjns" id="selectjns" class="form-control">
							<?php
								  $sql = pg_query("select * from jenis_oleh_oleh 
								  	");
								while($dt = pg_fetch_array($sql)){
								if ($data[id_jenis_oleh]==$dt[id_jenis_oleh]){
									echo "<option value=\"$dt[id_jenis_oleh]\" selected>$dt[jenis_oleh]</option>";}
								else{
									echo "<option value=\"$dt[id_jenis_oleh]\">$dt[jenis_oleh]</option>";}
								}
							?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="selectstat">Status Tempat</label>
						<select required name="selectstat" id="selectstat" class="form-control">
							<?php
								  $sql = pg_query("select * from status_tempat 
								  	");
								while($dt = pg_fetch_array($sql)){
								if ($data[id_status_tempat]==$dt[id_status_tempat]){
									echo "<option value=\"$dt[id_status_tempat]\" selected>$dt[status]</option>";}
								else{
									echo "<option value=\"$dt[id_status_tempat]\">$dt[status]</option>";}
								}
							?>
						</select>
					</div>
				</form>
			<?php }	?>
			</div>
		</div>
	</div><!-- /.box -->
</div><!-- /.col -->
</div>