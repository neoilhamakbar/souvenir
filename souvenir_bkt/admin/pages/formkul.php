<div class="row">
<form role="form" action="act/digitkulprocess.php" enctype="multipart/form-data" method="post">
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

                    <div class="col-lg-4 ds"  id="hide3">
            <a class="btn btn-info">Please Add The Data</a>

         <div class="form-group">
          <label for="id"><span style="color:red">*</span> ID</label>
          <input class="form-control" id="id" name="id" value="" required></input>
        </div>
        <div class="form-group">
          <label for="geom"><span style="color:red">*</span> Coordinate</label>
          <textarea class="form-control" id="geom" name="geom" readonly required></textarea>
        </div>
        <div class="form-group">
          <label for="name"><span style="color:red">*</span>Name of Culinary</label>
          <input type="text" class="form-control" name="name" value="" required>
        </div>
         <div class="form-group">
          <label for="address"><span style="color:red">*</span>Address</label>
          <input type="text" class="form-control" name="address" value="" required>
        </div>
         <div class="form-group">
          <label for="cp"><span style="color:red">*</span> Contact Person</label>
          <input type="number" class="form-control" name="cp" value="" min="0" required>
        </div>
        
        <div class="form-group">
          <label for="open"><span style="color:red">*</span>Opened</label>
          <input type="time" class="form-control" name="open" value="" required>
        </div>
        <div class="form-group">
          <label for="close"><span style="color:red">*</span>Closed</label>
          <input type="time" class="form-control" name="close" value="" required>
        </div>
         <div class="form-group">
          <label for="capacity"><span style="color:red">*</span>Capasity</label>
          <input type="number" class="form-control" name="capacity" value="" min="0" required>
        </div>                  
          </select>
        
        <div class="form-group">
          <label for="employee"><span style="color:red">*</span>Number of Employees</label>
          <input type="number" class="form-control" name="employee" value="" min="0" required>
        </div>
    
        <button type="submit" class="btn btn-round pull-right" >Next <i class="fa fa-chevron-right"></i></button> 
        <a href="?page=culinary" class="btn btn-round btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>  
<!-- </form> -->

                      </div>
                                            
                  </div>
                  </form>
                  </div>
<script src="inc/mapedit2.js" type="text/javascript"></script>
        