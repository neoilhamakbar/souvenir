 <div class="col-sm-12"> <!-- menampilkan form add event-->
				<section class="panel">
                    <div class="panel-body">

                        <a class="btn btn-compose">Add Event</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                     <?php if (isset($_GET['id']) && (isset($_GET['jam'])) && (isset($_GET['date']))){
					$id=$_GET['id'];
          $jam=$_GET['jam'];
          $tgl_keg=$_GET['date'];
          $ustad = $_POST['ustad'];
          $desc = $_POST['description'];
          echo "";
					$sql = pg_query("SELECT detail_event.id_event, detail_event.id_worship_place,event.name as event_name, detail_event.date, detail_event.id_ustad, ustad.name as ustad_name, detail_event.description as description, detail_event.time FROM detail_event join event on detail_event.id_event=event.id join worship_place on detail_event.id_worship_place=worship_place.id join ustad on detail_event.id_ustad=ustad.id where detail_event.date='$tgl_keg' and detail_event.time='$jam' ");
					$data = pg_fetch_array($sql);							
						?>
                        <form class="form-horizontal style-form" role="form" action="act/updkeguser.php" method="post">
                        <input type="text" class="form-control hidden" id="id_wor" name="id_wor" value="<?php echo $data['id_worship_place']?>">
                        <input type="text" class="form-control hidden" id="time" name="time" value="<?php echo $data['time']?>">
                        <input type="text" class="form-control hidden" id="date" name="date" value="<?php echo $data['date']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="id_keg"><span style="color:red"></span>Name</label>
          <div class="col-sm-10">
          <select  name="keg" id="keg" class="form-control">
           <?php
             $jenis=pg_query("select * from event ");
              while($rowkeg = pg_fetch_assoc($jenis))
              {
			  
			   if ($id==$rowkeg[id]){
									echo "<option value=\"$rowkeg[id]\" selected>$rowkeg[name]</option>";}
								else{
									echo"<option value=\"$rowkeg[id]\">$rowkeg[name]</option>";}
								}             
              ?>
                              
          </select>
          </div>
        </div>

		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="jam">Time</label>
          <div class="col-sm-10">
		  <div class="input-group bootstrap-timepicker">
      
		  <input type="time" class="form-control" name="jam" value="<?php echo $jam ;?>">

         <span class="input-group-btn">
           <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
           </span>

		  </div>
      </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="tgl_keg"><span style="color:red"></span>Date</label>
          <div class="col-sm-10">
          <input type="date" class="form-control form-control-inline input-medium " size="16" name="tgl" value="<?php echo $tgl_keg;?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="id_ustad"><span style="color:red"></span>Ustad</label>
          <div class="col-sm-10">
          <select  name="id_ustad" id="id_ustad" class="form-control">
             <?php
                                
              $ustad=pg_query("select * from ustad ");
              while($rowust = pg_fetch_assoc($ustad))
              {
				  if ($data[id_ustad]==$rowust[id]){
					   echo"<option value=\"$rowust[id]\" selected>$rowust[name]</option>";
				  }
              echo"<option value=\"$rowust[id]\">$rowust[name]</option>";
              }
              ?>
                              
          </select>
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="materi">Description</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="materi" value="<?php echo $data[description]; ?>">
        </div>
        </div> 
        <button type="submit" class="btn btn-primary pull-right" onclick="show1()">Save <i class="fa fa-floppy-o"></i></button>  
</form>
					 <?php } ?>
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>