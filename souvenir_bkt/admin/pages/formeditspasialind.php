<?php
$id=$_GET['id'];
$sql = pg_query("SELECT small_industry.id,small_industry.name as nama,small_industry.address,small_industry.cp,small_industry.employee,small_industry.owner, status.status, industry_type.name,ST_AsText(small_industry.geom) as geom FROM small_industry join status on small_industry.id_status=status.id join industry_type on small_industry.id_industry_type=industry_type.id  where small_industry.id='$id'");



$data =  pg_fetch_array($sql);
?>
<div class="row">

<div class="form-group">
	<!-- <div class="">
		<div class="box box-primary"> -->
			
			<!-- <div class="box-body"> -->
				<!-- <div class="pull-right" id="regedit">
					<button class="btn btn-default my-btn" id="hider" title="Hide region" onclick="hideReg()"><i class="fa fa-eye-slash"></i> Hide region</button>
				</div> -->
				<form role="form" action="act/editspasialindprocess.php" method="post">

				 <div class="col-sm-8" id="hide2"> <!-- menampilkan peta-->
				 <div class="box-header">
					<h3 class="box-title" style="text-transform:capitalize;">Edit Data  <?php echo $data['nama'] ?>	
					</h3>
				</div>
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>       
                          <center>            
          <input id="latlng" type="text" class="form-control" style="width:200px" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" style="margin-top:10px" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" style="margin-top:10px" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button></center>  </h3>
              
                      </header>
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:420px; z-index:50"></div>
                      </div>
                  </section>
              </div>

              <div class="col-lg-4 ds" id="hide3">
					<input type="text" class="hidden" id="id" name="id" value="<?php echo $id ?>" hidden>
					<div class="form-group" style="clear:both">
						<label for="geom">Koordinat</label>
						<textarea rows="6" class="form-control" id="geom" name="geom" readonly required><?php echo $data['geom'] ?></textarea>
					</div>


					<div class="form-group" style="clear:both">
						<label for="nama">Nama Tempat</label>
						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
					</div>
					<div class="form-group" style="clear:both">
						<label for="address">Alamat</label>
						<input type="text" class="form-control" name="address" value="<?php echo $data['address'] ?>">
					</div>
					<div class="form-group">
						<label for="cp">Telepon</label>
						<input type="text" class="form-control" name="cp" value="<?php echo $data['cp'] ?>">
					</div>
					
					<div class="form-group">
						<label for="owner">Pemilik</label>
						<input type="text" class="form-control" name="owner" value="<?php echo $data['owner'] ?>">
					</div>
					<div class="form-group">
						<label for="status">Status Tempat</label>
						<!-- <input type="text" class="form-control" name="close" value=""> -->
						    <select required name="status" id="status" class="form-control">
					            <?php
					                                
					              $stat=pg_query("select * from status ");
					              while($dt = pg_fetch_array($stat)){
					           		if ($data[status]==$dt[status]){
					           		echo "<option value=\"$dt[id]\" selected>$dt[status]</option>";}
					           		else{
					           			echo "<option value=\"$dt[id]\">$dt[status]</option>";}
					           			}
					           	?>
					                              
					         </select>
					</div>
					<div class="form-group">
						<label for="jns">Tipe Industri</label>
						     <select required name="jns" id="jns" class="form-control">
						         <?php
					                                
					              $jns=pg_query("select * from industry_type ");
					              while($dt = pg_fetch_array($jns)){
					           		if ($data[name]==$dt[name]){
					           		echo "<option value=\"$dt[id]\" selected>$dt[name]</option>";}
					           		else{
					           			echo "<option value=\"$dt[id]\">$dt[name]</option>";}
					           			}
					           	?>             
						          </select>
					</div>
					<div class="form-group">
						<label for="employee">Jumlah Karyawan</label>
						<input type="text" class="form-control" name="employee" value="<?php echo $data['employee'] ?>">
					</div>



					<a href="?page=detailindustry&id=<?php echo $id ?>" class="btn btn-round btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
					<button type="submit" class="btn btn-round pull-right"><i class="fa fa-floppy-o"></i> Simpan</button>
				
			
		</div>
</div>

 </form>
</div></div></div>
		
	
<script src="inc/mapedit2.js" type="text/javascript"></script>