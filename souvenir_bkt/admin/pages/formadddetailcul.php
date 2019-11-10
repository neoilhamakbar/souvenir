<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-body">
<form role="form" action="act/addjnssouprocess.php" method="post">
             <!--menampilkan map-->
                      <h4 style="text-transform:capitalize;">Type of Industry</h4>
        
          
        <?php if (!isset($_GET['id_tempat_kuliner'])){ ?>

        <form role="form" action="act/layananins.php" method="post">
          
          <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>

          <div class="form-group" style="clear:both" id="l_form" >
            <label for="nama_jenis_industri">Type of Industry</label>
             <select required name="kul" id="kul" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $kul=pg_query("select * from kuliner ");
              while($rowkul = pg_fetch_assoc($kul))
              {
              echo"<option value=".$rowkul['id_kuliner'].">".$rowkul['nama_kuliner']."</option>";
              }
              ?>
                              
          </select>
          </div>
        </form>

        <?php } if (isset($_GET['id_tempat_kuliner'])){
          $id_tempat_kuliner=$_GET['id_tempat_kuliner'];
          $sql = pg_query("SELECT * FROM jenis_industri where id_tempat_kuliner=$id_tempat_kuliner");
          $data = pg_fetch_array($sql)
        ?>
        <form role="form" action="act/layananupd.php" method="post">
          <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
          <a href="?page=jenis" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a> <br><br><br>
          <input type="text" class="form-control hidden" name="id_tempat_kuliner" value="<?php echo $data['id_tempat_kuliner'] ?>">
          <div class="form-group" style="clear:both">
            <label for="nama_jenis_industri">Jenis Industri</label>
            <input type="text" class="form-control" name="nama_jenis_industri" value="<?php echo $data['nama_jenis_industri'] ?>" required>
          </div>
        </form>
        <?php } ?>
                  


                  </form>
                  </div>
                  </div>
                  </div>
                  </div>

        