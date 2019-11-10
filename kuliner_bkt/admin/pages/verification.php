<div class="col-sm-12">  <!-- menampilkan fasilitas-->
    <section class="panel">
        <div class="panel-body">
            <a class="btn btn-compose"></i>User Verification</a>
            <div class="box-body">
                <div class="form-group">
                    <table id="example3" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        //include ('../../../connect.php');


                            $sql = pg_query("SELECT * FROM admin where role is null");
                            while($data =  pg_fetch_array($sql)){
                            $nama = $data['name'];
                            $username = $data['username'];
                            $hp = $data['hp'];
                            $address = $data['address'];
                        ?>
                            <tr>
                                <td><?php echo "$nama"; ?></td>
                                <td><?php echo "$username"; ?></td>
                                <td><?php echo "$hp"; ?></td>
                                <td><?php echo "$address"; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="act/accept.php?username=<?php echo $username; ?>" class="btn btn-sm btn-success" title='accept'>Accept</a>
                                        <a href="act/ignore.php?username=<?php echo $username; ?>" class="btn btn-sm btn-danger" title='Delete'>Ignore</a>
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