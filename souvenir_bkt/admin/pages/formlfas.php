<!-- <div class="col-xs-8 col-sm-10 col-md-10 col-lg-5">
                            <div class="panel panel-bd " >
                                <div class="panel-heading" style="height:45px;"> -->


<?php if (isset($_GET['id'])){
	$id_culinary_place=$_GET['id'];
	//$id_culinary=$_GET['id_culinary'];
?>

<form class="" role="form" action="act/uplayprocessfas.php" method="post">
<button type="submit" class="btn btn-primary" style="float:right"><i class="fa fa-floppy-o"></i> Simpan</button>
<div class="row" style="clear:both;">
<div class="col-xs-5">
	<div class="box">
		<div class="box-body">
		<h4 style="text-transform:capitalize;">Daftar Fasilitas <?php echo $data1['facility'] ?></h4>
			<div id="forml">
				<input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id_culinary_place ?>">
					
					<table class="table table-hover table-bordered table-striped">
					<thead><th>  </th><th>Jenis Fasilitas</th></thead>
					<tbody>
					<script>
						// function enable(id)
						// {
						// 	var inputHarga = document.getElementById('harga'+id.value)
						// 	if(id.checked){
						// 		inputHarga.value = "";
						// 		inputHarga.disabled = false;
						// 	} else {
						// 		inputHarga.value = 0;
						// 		inputHarga.disabled = true;
						// 	}
						// }
					</script>
					<tr>

					</tr>
						<?php
							$sql2 = pg_query("select * from facility_culinary order by facility");
							while($dt = pg_fetch_array($sql2))
							{ ?> <tr> <?php
								$sql3 = pg_query("SELECT * FROM detail_facility_culinary where id_culinary_place='$id_culinary_place' and id_facility='$dt[id]'");
								$data3 = pg_fetch_array($sql3);
								if ($dt['id']==$data3['id_facility']){
									echo "<td><input name='facility[]' value=\"$dt[id]\" type='checkbox' style='width:25px' onClick='enable(this)' checked=\"\"></td><td>$dt[facility]</td>";
									
									
								}else{
									echo "<td><input name='facility[]' value=\"$dt[id]\" type='checkbox' onClick='enable(this)' style='width:25px'></td><td>$dt[facility]</td>";
									
								}
							
						?> </tr>
						<?php } ?>
					</tbody>
					</table>

			</div>
		</div>
	</div><!-- /.box -->
</div><!-- /.col -->
</div>
</form>

<?php } ?>

<!-- </div>
</div>
</div> -->
