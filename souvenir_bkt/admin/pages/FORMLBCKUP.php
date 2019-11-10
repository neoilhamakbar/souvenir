<!-- <div class="col-xs-8 col-sm-10 col-md-10 col-lg-5">
                            <div class="panel panel-bd " >
                                <div class="panel-heading" style="height:45px;"> -->


<?php if (isset($_GET['id'])){
	$id_culinary_place=$_GET['id'];
	//$id_culinary=$_GET['id_culinary'];
?>

<form class="" role="form" action="act/uplayprocess.php" method="post">
<button type="submit" class="btn btn-primary" style="float:right"><i class="fa fa-floppy-o"></i> Simpan</button>
<div class="row" style="clear:both;">
<div class="col-xs-5">
	<div class="box">
		<div class="box-body">
		<h4 style="text-transform:capitalize;">Daftar Kuliner <?php echo $data1['name'] ?></h4>
			<div id="forml">
				<input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id_culinary_place ?>">
					
					<table class="table table-hover table-bordered table-striped">
					<thead><th>  </th><th>Jenis Kuliner</th><th>Harga</th></thead>
					<tbody>
					<script>
						function enable(id)
						{
							var inputHarga = document.getElementById('harga'+id.value)
							if(id.checked){
								inputHarga.disabled = false;
							} else {
								inputHarga.value = 0;
								inputHarga.disabled = true;
							}
						}
					</script>
					
						<?php
							$sql2 = pg_query("select * from culinary order by name");
							while($dt = pg_fetch_array($sql2))
							{
								$sql3 = pg_query("SELECT * FROM detail_culinary where id_culinary_place='$id_culinary_place' and id_culinary=$dt[id]");
								$data3 = pg_fetch_array($sql3);
								if ($dt['id']==$data3['id_culinary']){
									echo "<div class='checkbox'><label><input name='culinary[]' value=\"$dt[id]\" type='checkbox' style='width:25px' onClick='enable(this)' checked=\"\">$dt[name]</label></div><br>";
									echo"<td><input class='form-control ' type='number' style='margin-bottom:10px;width:200px' id='harga".$dt[id]."' value='$data3[price]' name='harga".$dt[id]."'></td>";
									
								}else{
									echo "<div class='checkbox'><label><input name='culinary[]' value=\"$dt[id]\" type='checkbox' onClick='enable(this)' style='width:25px'>$dt[name]</label></div><br>";
									echo"<td><input class='form-control ' type='number' style='margin-bottom:10px;
																		width:200px' id='harga".$dt[id]."'  name='harga".$dt[id]."' value='0' disabled></td>";
								}
							
						?>
						
					<tr>
						<td><?php echo $rowl['name']; ?></td>
						<td><?php echo $rowl['name']; ?></td>
						<td><?php echo $rowl['price']; ?></td>
						</tr>
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
