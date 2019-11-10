<div class="row">
  <?php
  $query = pg_query("SELECT MAX(id) AS id FROM small_industry");
            $result = pg_fetch_array($query);
            $idmax = $result['id'];
            if ($idmax==null) {$idmax=1;}
            else {$idmax++;}
    ?>

<form role="form" action="act/digitsouprocess.php" enctype="multipart/form-data" method="post">
               <div class="col-sm-8" id="hide2"> <!-- menampilkan peta-->
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
            <!-- <a class="btn btn-info">Please Add The Data</a> -->
        

        <div class="form-group">
          <!-- <label for="id"><span style="color:red">*</span> ID</label> -->
          <input class="form-control hidden" id="id" name="id" value="<?php echo $idmax ?>"></input>
        </div>
        
        <div class="form-group">
          <label for="geom"><span style="color:red">*</span> Coordinate</label>
          <textarea class="form-control" id="geom" name="geom" readonly required></textarea>
        </div>
        
        <div class="form-group">
          <label for="name"><span style="color:red">*</span>Name of Craft</label>
          <input type="text" class="form-control" name="name" value="" required>
        </div>
        
        <div class="form-group">
          <label for="owner"><span style="color:red">*</span>Owner</label>
          <input type="text" class="form-control" name="owner" value="" required>
        </div>
        
        <div class="form-group">
          <label for="cp"><span style="color:red">*</span> Contact Person</label>
          <input type="text" class="form-control" name="cp" value="" required>
        </div>
        
        <div class="form-group">
          <label for="address"><span style="color:red">*</span>Address</label>
          <input type="text" class="form-control" name="address" value="" required>
        </div>
        
        <div class="form-group">
          <label for="stat"><span style="color:red">*</span>Status of Place</label>
          <select required name="status" id="status" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $stat=pg_query("select * from status ");
              while($rowstat = pg_fetch_assoc($stat))
              {
              echo"<option value=".$rowstat['id'].">".$rowstat['status']."</option>";
              }
              ?>
                              
          </select>
        </div> 
        <div class="form-group">
          <label for="employee"><span style="color:red">*</span>Number of Employees</label>
          <input type="text" class="form-control" name="employee" value="" required>
        </div>
        <div class="form-group">
          <label for="jns"><span style="color:red">*</span>Type of Craft</label>
          <select required name="jns" id="jns" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $jns=pg_query("select * from industry_type");
              while($rowjns = pg_fetch_assoc($jns))
              {
              echo"<option value=".$rowjns['id'].">".$rowjns['name']."</option>";
              }
              ?>
                              
          </select>
        </div>  
      
<!-- 
         <div class="form-group">
                  <label for="file">Upload Foto</label>
                  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
                </div>
                <span style="color:red;">*Ukuran gambar maksimal 500kb</span>
                <br><br> -->
    
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
        <a href="?page=souvenirs" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>    
<!-- </form> -->

                      </div>
                                            
                  </div>
                  </form>
                  </div>
<script src="inc/mapedit1.js" type="text/javascript"></script>
        