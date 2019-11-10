<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
				<h4 style="text-transform:capitalize;">Facility</h4>
				<?php if (!isset($_GET['id'])){ ?>
				<form role="form" action="act/layanankulfasins.php" method="post">
					
					<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
					<div class="form-group" style="clear:both" id="lsou_form" >
						<label for="facility">Facility</label>
						<input type="text" class="form-control" name="" value="" style="margin-bottom:3px;" autofocus required>
					</div>
				</form>
				<?php } if (isset($_GET['id'])){
					$id=$_GET['id'];
					$sql = pg_query("SELECT * FROM facility_culinary where id='$id'");
					$data = pg_fetch_array($sql)
				?>
				<form role="form" action="act/layanankuludpfas.php" method="post">
					<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
					<a href="?page=fasculinary" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a> <br><br><br>
					<input type="text" class="form-control hidden" name="id" value="<?php echo $data['id'] ?>">
					<div class="form-group" style="clear:both">
						<label for="facility">Type of Culinary</label>
						<input type="text" class="form-control" name="facility" value="<?php echo $data['facility'] ?>" required>
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