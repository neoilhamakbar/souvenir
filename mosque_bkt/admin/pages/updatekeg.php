<div class="col-sm-12"> <!-- menampilkan form add event-->
				<section class="panel">
                    <div class="panel-body">
	
                        <a class="btn btn-compose">Update Event</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
				       <?php  if (isset($_GET['id'])){
					$id=$_GET['id'];
					$sql = pg_query("SELECT id, name, description, id_type_event FROM event where id=$id");
					$data = pg_fetch_array($sql)
				?> 	
        <form class="form-horizontal style-form" role="form" action="act/updkeg.php" method="post">
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $data['id']?>">
    <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="nama">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_keg" value="<?php echo $data['name']?>">
                </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jam">Description</label>
      <div class="col-sm-10">
          <input class="form-control" rows="4" name="deskripsi" value="<?php echo $data['description'] ?>"></input>
      </div>
        </div>
      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jenis">Jenis Kegiatan</label>
      <div class="col-sm-10">
          <select  name="id_jenis_keg" id="id_jenis_keg" class="form-control" value="<?php echo $data['id_type_event'] ?>">
             <?php
             $jenis=pg_query("select * from type_event ");
              while($rowkeg = pg_fetch_assoc($jenis))
              {
			  
			   if ($data[id]==$rowkeg[id]){
									echo "<option value=\"$rowkeg[id]\" selected>$rowkeg[name]</option>";}
								else{
									echo "<option value=\"$rowkeg[id]\">$rowkeg[name]</option>";}
								}             
              ?>
                              
          </select>
      </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>  
			
</form>
<?php } ?>



                      </div>                   
                  </div>
                    </div>
					
                </section>
                 </div>