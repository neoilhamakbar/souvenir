<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-body">
<form role="form" action="act/addjnssouprocess.php" method="post">
             <!--menampilkan map-->
    <?php
          $query = pg_query("SELECT MAX(id_jenis_oleh) AS id_jenis_oleh FROM jenis_oleh_oleh");
          $result = pg_fetch_array($query);
          $idmax = $result['id_jenis_oleh'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
           <!-- menampilkan form tambah mesjid-->
            <h4>Please Add The Data</h4>
                      <div class="desc" >

       <!-- <div class="form-group">
          <label for="id"><span style="color:red">*</span>ID</label>
          <input type="text" class="form-control" name="id" value="" required>
        </div> -->
      <input type="text" class="form-control hidden" id="id_jenis_oleh" name="id_jenis_oleh" value="<?php echo $idmax;?>">

        <div class="form-group">
          <label for="jenis"><span style="color:red">*</span>Type of Souvenirs</label>
          <input type="text" class="form-control" name="jenis" value="" required>
        </div>
   
    
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>   
        <a href="?page=jenissouvenirs" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>

                      </div>
                                           
                  
                  </form>
                  </div>
                  </div>
                  </div>
                  </div>

        