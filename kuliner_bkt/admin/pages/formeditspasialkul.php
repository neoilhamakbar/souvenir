<?php
$id=$_GET['id'];
$sql = pg_query("SELECT name, address, cp, open, close, capacity, employee, ST_AsText(geom) as geom FROM culinary_place where id='$id'");
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
				<form role="form" action="act/editspasialkulprocess.php" method="post">

				 <div class="col-sm-8" id="hide2"> <!-- menampilkan peta-->
				 <div class="box-header">
					<h3 class="box-title" style="text-transform:capitalize;">Edit Data  <?php echo $data['name'] ?>	
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
						<label for="name">Nama Kuliner</label>
						<input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>">
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
						<label for="open">Jam Buka</label>
						<input type="time" class="form-control" name="open" value="<?php echo $data['open'] ?>">
					</div>
					<div class="form-group">
						<label for="close">Jam Tutup</label>
						<input type="time" class="form-control" name="close" value="<?php echo $data['close'] ?>">
					</div>
					<div class="form-group">
						<label for="capacity">Kapasitas</label>
						<input type="text" class="form-control" name="capacity" value="<?php echo $data['capacity'] ?>">
					</div>
					<div class="form-group">
						<label for="employee">Jumlah Karyawan</label>
						<input type="text" class="form-control" name="employee" value="<?php echo $data['employee'] ?>">
					</div>



					<a href="?page=detailculinary&id=<?php echo $id ?>" class="btn btn-round btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
					<button type="submit" class="btn btn-round pull-right"><i class="fa fa-floppy-o"></i> Simpan</button>
				
			
		</div>
</div>

 </form>
</div></div></div>
		
	
<script src="inc/mapedit2.js" type="text/javascript"></script>