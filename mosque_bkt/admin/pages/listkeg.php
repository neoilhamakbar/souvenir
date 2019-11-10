 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=addkeg" title="Add Event" class="btn btn-compose"><i class="fa fa-plus"></i>List Event</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Jenis Kegiatan</th>
                        <th>Description</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT event.id, event.name as event_name, type_event.name as type_event_name, description FROM event join type_event on type_event.id=event.id_type_event ");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id'];
                        $nama_keg = $data['event_name'];
						$jenis = $data['type_event_name'];
                        $deskripsi = $data['description'];
						
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama_keg"; ?></td>
						<td><?php echo "$jenis"; ?></td>
                        <td><?php echo "$deskripsi"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=updatekeg&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Edit'><i class="fa fa-edit"></i> Edit</a>
                        <a href="act/delkeg.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
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