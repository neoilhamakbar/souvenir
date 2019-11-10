<?php if (isset($_GET['id'])){
	$id=$_GET['id'];
	$sql=pg_query("SELECT * FROM worship_place where id=$id");
	$data=pg_fetch_array($sql);

?> 
			  
			  <div class="col-sm-12"> <!-- menampilkan form add mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">
                        <div class="box-body">
             
                      <div class="form-group">
                        <form role="form" action="act/addevent1.php" method="post">
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $data['id'] ?>">
          <?php
							$sql2 = pg_query("select * from event order by name");
							while($dt2 = pg_fetch_array($sql2)){
								echo "<div class='checkbox'><label><input name='fasilitas[]' value=\"$dt2[id_fasilitas]\" type='checkbox'>$dt2[nama_fasilitas]</label></div>";
							}
						?>
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>   
</form> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
				 <?php } ?>