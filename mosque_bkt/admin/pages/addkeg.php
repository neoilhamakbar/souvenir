 <div class="col-sm-12"> <!-- menampilkan form add event-->
				<section class="panel">
                    <div class="panel-body">

                        <a class="btn btn-compose">Add Event</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                     
                        <form class="form-horizontal style-form" role="form" action="act/kegiatan.php" method="post">
                         <?php
          $query = pg_query("SELECT MAX(id) AS id FROM event");
          $result = pg_fetch_array($query);
          $idmax = $result['id'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
        <input type="text" class="form-control hidden" id="id_keg" name="id_keg" value="<?php echo $idmax;?>">
		<div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="nama">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_keg" value="">
                </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jam">Description</label>
		  <div class="col-sm-10">
          <textarea class="form-control" rows="4" name="deskripsi" value=""></textarea>
		  </div>
        </div>
			<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jenis">Jenis Kegiatan</label>
		  <div class="col-sm-10">
          <select  name="jenis" id="jenis" class="form-control">
             <?php
                                
              $jenis=pg_query("select * from type_event ");
              while($rowkeg = pg_fetch_assoc($jenis))
              {
              echo"<option value=".$rowkeg['id'].">".$rowkeg['name']."</option>";
              }
              ?>
                              
          </select>
		  </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>  
</form>


                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>