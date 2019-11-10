<div class="col-sm-12">  <!-- menampilkan fasilitas--> 
    <section class="panel"> 
 
    <div class="box-body"> 
 
    <br>  
    <div class="btn-group pull-right" style="width:120px;"> 
    <a href="?page=user_add" class="btn btn-theme">Add Data <i class="fa fa-plus"></i></a> 
    </div> 
     
      
 
    </div> 
    <br><br><br> 
            <table id="dataTableExample2" class="table table-hover table-bordered table-striped"> 
            <br> 
            <thead> 
            <tr> 
            <th style="width:200px;color:black">Username</th> 
            <th style="width:200px;color:black">Name</th> 
            <!-- <th style="width:200px;color:black">Periode</th>  -->
            <th style="width:200px;color:black">Action</th> 
            </tr> 
            </thead> 
            <tbody> 
             
            <?php 
            $sql = pg_query("SELECT name , stewardship_period, username from admin"); 
                while($data =  pg_fetch_array($sql)){ 
                    $username = $data['username']; 
                    $nama = $data['name']; 
                    $periode = $data['stewardship_period'];           
            ?> 
                             
            <tr> 
            <td><?php echo "$username"; ?></td> 
            <td><?php echo "$nama"; ?></td> 
            <!-- <td><?php echo "$periode"; ?></td>  -->
            <td> 
 
            <div class="btn-group"> 
            <a href="?page=user_update&username=<?php echo $username; ?>" class="btn btn-round btn-default" title='Update'><i class="fa fa-exclamation-circle"></i>Update</a> 
            &nbsp&nbsp 
            </div> 
             
            <div class="btn-group"> 
            <a href="act/user_delete.php?username=<?php echo $username; ?>" onclick="return confirm('Are You Sure Want To Delete?')" class="btn btn-round btn-default" title='Delete'><i class="fa fa-trash"></i>Delete</a> 
            </div> 
                                </td> 
                            </tr> 
            <?php }  
            ?> 
                        </tbody> 
                    </table>  
                </div>                    
            </div> 
        </div> 
    </section> 
</div>