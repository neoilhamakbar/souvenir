 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
    
        <div class="panel-body">
            <a href="?page=addevent" title="Add Event" class="btn btn-compose"><i class="fa fa-plus"></i>List Event</a>
            <div class="box-body">
             
                <div class="form-group">
                <table id="example1" class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                <th>Name</th>
                <th>Time</th>
                <th>Date</th>
				<th>Ustad</th>
				<th>Description</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>

            <?php
                       
            $sql = pg_query("SELECT detail_event.date, detail_event.time, detail_event.id_ustad, detail_event.id_event, detail_event.id_worship_place, detail_event.description, event.name as event_name, event.id , ustad.name as nama_ustad from detail_event join event on detail_event.id_event=event.id join ustad on detail_event.id_ustad=ustad.id where detail_event.id_worship_place='$id'");

            while($data =  pg_fetch_array($sql)){
                $nama_keg = $data['event_name'];
                $id = $data['id_worship_place'];
                $id_event = $data['id_event'];
                $jam = $data['time'];
                $tgl_keg = $data['date'];
                $nama_ustad = $data['nama_ustad'];
                $materi = $data['description'];
             ?>




            <tr>
            <td><?php echo "$nama_keg"; ?></td>
            <td><?php echo "$jam"; ?></td>
            <td><?php echo "$tgl_keg"; ?></td>
            <td><?php echo "$nama_ustad"; ?></td>
            <td><?php echo "$materi"; ?></td>
            <td><div class="btn-group">
            <a href="?page=updatekegiatanuser&id=<?php echo $id_event; ?>&jam=<?php echo $jam; ?>&date=<?php echo $tgl_keg; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i> Update</a>
            </div>
            <a href="act/delevent.php?id=<?php echo $id_event; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
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