 <div class="col-sm-12"> <!-- menampilkan form add event-->
				<section class="panel">
                    <div class="panel-body">

                        <a class="btn btn-compose">Add Event</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                     
                        <form class="form-horizontal style-form" role="form" action="act/insertdetkeg.php" method="post">
                         <?php
          $query = pg_query("SELECT MAX(id) AS id_keg FROM event");
          $result = pg_fetch_array($query);
          $idmax = $result['id_keg'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
                        <input type="text" class="form-control hidden" id="id_keg" name="id_keg" value="<?php echo $idmax;?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="nama"><span style="color:red"></span>Name</label>
          <div class="col-sm-10">
          <select  name="keg" id="keg" class="form-control">
             <?php
                                
              $keg=pg_query("select * from event ");
              while($rowkeg = pg_fetch_assoc($keg))
              {
              echo"<option value=".$rowkeg['id'].">".$rowkeg['name']."</option>";
              }
              ?>
                              
          </select>
          </div>
        </div>

		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="tanggal">Time</label>
          <div class="col-sm-10">
		  <div class="input-group bootstrap-timepicker">
      
		  <input type="time" class="form-control" name="jam">

         <span class="input-group-btn">
           <!-- <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button> -->
           </span>

		  </div>
      </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jam"><span style="color:red"></span>Date</label>
          <div class="col-sm-10">
          <input type="date" class="form-control" size="16" name="tgl" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jam"><span style="color:red"></span>Ustad</label>
          <div class="col-sm-10">
          <select  name="ustad" id="ustad" class="form-control">
             <?php
                                
              $ustad=pg_query("select * from ustad ");
              while($rowust = pg_fetch_assoc($ustad))
              {
              echo"<option value=".$rowust['id'].">".$rowust['name']."</option>";
              }
              ?>
                              
          </select>
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="org">Description</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="description" value="">
        </div>
        </div> 
        <button type="submit" class="btn btn-primary pull-right" onclick="show1()">Save <i class="fa fa-floppy-o"></i></button>  
</form>

                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>