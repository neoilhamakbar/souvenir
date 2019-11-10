<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
				<h4 style="text-transform:capitalize;">Layanan Bengkel</h4>
				<?php if (!isset($_GET['id'])){ ?>
				<form role="form" action="act/layananins.php" method="post">
					<a class="btn btn-success btn-sm" onclick="add()"><i class="fa fa-plus"></i></a>
					<a class="btn btn-danger btn-sm" onclick="rem()"><i class="fa fa-times"></i></a>
					<button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-floppy-o"></i></button>
					<div class="form-group" style="clear:both" id="l_form">
						<label for="nama">Layanan</label>
						<input type="text" class="form-control" name="" value="" style="margin-bottom:3px;" autofocus required>
					</div>
				</form>
				<?php } if (isset($_GET['id'])){
					$id=$_GET['id'];
					$sql = pg_query("SELECT * FROM layanan where layanan_id=$id");
					$data = pg_fetch_array($sql)
				?>
				<form role="form" action="act/layananupd.php" method="post">
					<button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-floppy-o"></i></button>
					<input type="text" class="form-control hidden" name="id_layanan" value="<?php echo $data['layanan_id'] ?>">
					<div class="form-group" style="clear:both">
						<label for="nama">Layanan</label>
						<input type="text" class="form-control" name="layanan" value="<?php echo $data['jenis_layanan'] ?>" required>
					</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div><!-- /.box -->
</div><!-- /.col -->
</div>
<script>
function add(){
	$('#l_form').append('<input type="text" class="form-control" name="layanan[]" value="" style="margin-bottom:3px;" required>');
}
function rem(){
	var x = document.getElementById("l_form");
	var y = x.getElementsByClassName("form-control");
	var last_y = y[y.length - 1];
	if (y.length>1){
		last_y.remove();
	}
}
</script>