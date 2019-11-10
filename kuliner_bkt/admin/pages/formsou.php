<div class="row">
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
                     <?php
          $query = pg_query("SELECT MAX(id_oleh_oleh) AS id_oleh_oleh FROM oleh_oleh");
          $result = pg_fetch_array($query);
          $idmax = $result['id_oleh_oleh'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
            <h3>Please Add The Data</h3>
                      <div class="desc" >
                        <!-- <form role="form" action="insertik.php" method="post"> -->
         <input type="text" class="form-control hidden" id="id_oleh_oleh" name="id_oleh_oleh" value="<?php echo $idmax;?>">
        <div class="form-group">
          <label for="geom"><span style="color:red">*</span> Coordinate</label>
          <textarea class="form-control" id="geom" name="geom" readonly required></textarea>
        </div>
        <div class="form-group">
          <label for="nama"><span style="color:red">*</span>Name of Souvenirs</label>
          <input type="text" class="form-control" name="nama" value="" required>
        </div>
        <div class="form-group">
          <label for="pemilik"><span style="color:red">*</span>Owner</label>
          <input type="text" class="form-control" name="pemilik" value="" required>
        </div>
        <div class="form-group">
          <label for="cp"><span style="color:red">*</span> Contact Person</label>
          <input type="text" class="form-control" name="cp" value="" required>
        </div>
        <div class="form-group">
          <label for="alamat"><span style="color:red">*</span>Address</label>
          <input type="text" class="form-control" name="alamat" value="" required>
        </div>
        <div class="form-group">
          <label for="product"><span style="color:red">*</span>Product</label>
          <input type="text" class="form-control" name="product" value="" required>
        </div>
        <div class="form-group">
          <label for="harga"><span style="color:red">*</span>Price</label>
          <input type="text" class="form-control" name="harga" value="" required>
        </div>
         <div class="form-group">
          <label for="stat"><span style="color:red">*</span>Status of Place</label>
          <select required name="stat" id="stat" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $stat=pg_query("select * from status_tempat ");
              while($rowstat = pg_fetch_assoc($stat))
              {
              echo"<option value=".$rowstat['id_status_tempat'].">".$rowstat['status']."</option>";
              }
              ?>
                              
          </select>
        </div> 
        <div class="form-group">
          <label for="jml"><span style="color:red">*</span>Number of Employees</label>
          <input type="text" class="form-control" name="jml" value="" required>
        </div>
        <div class="form-group">
          <label for="jns"><span style="color:red">*</span>Type of Souvenirs</label>
          <select required name="jns" id="jns" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $jns=pg_query("select * from jenis_oleh_oleh ");
              while($rowjns = pg_fetch_assoc($jns))
              {
              echo"<option value=".$rowjns['id_jenis_oleh'].">".$rowjns['jenis_oleh']."</option>";
              }
              ?>
                              
          </select>
        </div>  
      

         <div class="form-group">
                  <label for="file">Upload Foto</label>
                  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
                </div>
                <span style="color:red;">*Ukuran gambar maksimal 500kb</span>
                <br><br>
    
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
        <a href="?page=souvenirs" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>    
<!-- </form> -->

                      </div>
                                            
                  </div>
                  </form>
                  </div>
<script src="inc/mapedit1.js" type="text/javascript"></script>
        