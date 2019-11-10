<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-body">
<form role="form" action="act/addjnskulprocess.php" method="post">
             <!--menampilkan map-->
    <?php
          $query = pg_query("SELECT MAX(id) AS id FROM culinary");
          $result = pg_fetch_array($query);
          $idmax = $result['id'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
          
            <h4>Please Add The Data</h4>
                      <div class="desc" >

       <!-- <div class="form-group">
          <label for="id"><span style="color:red">*</span>ID</label>
          <input type="text" class="form-control" name="id" value="" required>
        </div> -->
      <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax;?>">

        <div class="form-group">
          <label for="name"><span style="color:red">*</span>Type of Culinary</label>
          <input type="text" class="form-control" name="name" value="" required>
        </div>
   
    
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>   
        <a href="?page=jenisculinary" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>

                      </div>
                                           
                  
                  </form>
                  </div>
                  </div>
                  </div>
                  </div>

        