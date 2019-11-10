 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=ustad" title="Add Event" class="btn btn-compose"><i class="fa fa-plus"></i>List Ustad</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT * FROM ustad");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id'];
                        $nama = $data['name'];
                        $alamat = $data['address'];
                        $no_hp = $data['cp'];
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$alamat"; ?></td>
                        <td><?php echo "$no_hp"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=updateustad&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i> Ubah</a>
						<a href="act/delust.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>