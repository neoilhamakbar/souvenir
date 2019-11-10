<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
				<h4 style="text-transform:capitalize;">Type of Souvenirs</h4>
				<?php if (!isset($_GET['id_jenis_oleh'])){ ?>
				<form role="form" action="act/layanansouins.php" method="post">
					
					<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
					<div class="form-group" style="clear:both" id="lsou_form" >
						<label for="jenis_oleh">Type of Souvenirs</label>
						<input type="text" class="form-control" name="" value="" style="margin-bottom:3px;" autofocus required>
					</div>
				</form>
				<?php } if (isset($_GET['id_jenis_oleh'])){
					$id_jenis_oleh=$_GET['id_jenis_oleh'];
					$sql = pg_query("SELECT * FROM jenis_oleh_oleh where id_jenis_oleh=$id_jenis_oleh");
					$data = pg_fetch_array($sql)
				?>
				<form role="form" action="act/layanansouupd.php" method="post">
					<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
					<a href="?page=jenissouvenirs" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a> <br><br><br>
					<input type="text" class="form-control hidden" name="id_jenis_oleh" value="<?php echo $data['id_jenis_oleh'] ?>">
					<div class="form-group" style="clear:both">
						<label for="jenis_oleh">Type of Souvenirs</label>
						<input type="text" class="form-control" name="jenis_oleh" value="<?php echo $data['jenis_oleh'] ?>" required>
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