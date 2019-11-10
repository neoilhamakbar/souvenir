<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
				<h4 style="text-transform:capitalize;">Type of Industry</h4>
				
					
				<?php if (!isset($_GET['id_jenis_industri'])){ ?>

				<form role="form" action="act/layananins.php" method="post">
					
					<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>

					<div class="form-group" style="clear:both" id="l_form" >
						<label for="nama_jenis_industri">Type of Industry</label>
						<input type="text" class="form-control" name="" value="" style="margin-bottom:3px;" autofocus required>
					</div>
				</form>

				<?php } if (isset($_GET['id_jenis_industri'])){
					$id_jenis_industri=$_GET['id_jenis_industri'];
					$sql = pg_query("SELECT * FROM jenis_industri where id_jenis_industri=$id_jenis_industri");
					$data = pg_fetch_array($sql)
				?>
				<form role="form" action="act/layananupd.php" method="post">
					<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
					<a href="?page=jenis" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a> <br><br><br>
					<input type="text" class="form-control hidden" name="id_jenis_industri" value="<?php echo $data['id_jenis_industri'] ?>">
					<div class="form-group" style="clear:both">
						<label for="nama_jenis_industri">Jenis Industri</label>
						<input type="text" class="form-control" name="nama_jenis_industri" value="<?php echo $data['nama_jenis_industri'] ?>" required>
					</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div><!-- /.box -->
</div><!-- /.col -->
</div>
<script>

</script>