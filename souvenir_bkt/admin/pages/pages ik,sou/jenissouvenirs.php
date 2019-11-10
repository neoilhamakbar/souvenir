     <?php
if(isset($_GET['id_jenis_oleh']))
  {
  $id_jenis_oleh=$_GET["id_jenis_oleh"];

  $sql="DELETE from jenis_oleh_oleh where id_jenis_oleh=$id_jenis_oleh";

  if(pg_query($sql)){
      echo"<script>alert ('Data Berhasil Dihapus');</script>";
      //header("location:./?page=jenissouvenirs");
    }else
    {
      echo"<script>alert ('Data Gagal Dihapus');</script>";
    }
  }

      ?>       

              <div class="col-lg-15 ds" id="hide2"> 
                       
          
              <div class="box-body">
              
            <a href="?page=souvenirs<?php echo $id ?>" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>    
    <div class="btn-group pull-right">
    <a href="?page=formjnssou" class="btn btn-default">Tambah <i class="fa fa-plus"></i></a><br><br><br>
    </div>
    </div>
              <table id="" class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
     <!--  <th>ID Jenis Industri</th> -->
      <th>Jenis Souvenir</th>
      <th>Aksi</th>

      </tr>
    </thead>
    <tbody>
    
<?php
    include '../connect.php';
    $id_jenis_oleh = $_GET['id_jenis_oleh'];
    $querysearch  ="SELECT jenis_oleh_oleh.id_jenis_oleh, jenis_oleh_oleh.jenis_oleh FROM jenis_oleh_oleh order by id_jenis_oleh ASC ";
             
    $result=pg_query($querysearch);
    while($baris = pg_fetch_array($result))
    {
          $id_jenis_oleh=$baris['id_jenis_oleh'];
          $jenis_oleh=$baris['jenis_oleh'];
          
          
          $dataarray[]=array('id_jenis_oleh'=>$id_jenis_oleh,'jenis_oleh'=>$jenis_oleh);
?>
    <tr>
      
      <td><?php echo "$jenis_oleh" ?></td>
       <td><div class="btn-group">

      
      <a href="?page=editjnssou&id_jenis_oleh=<?php echo $id_jenis_oleh; ?>" class="btn btn-sm btn-default" title='Edit'><i class="fa fa-edit"></i> Edit</a>
      </div>
      <div class="btn-group">
        <a href="?page=jenissouvenirs&id_jenis_oleh=<?php echo $id_jenis_oleh; ?>" onclick="return confirm('Are You Sure To Delete?')" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash"></i></a>
       </div>
    </tr>
<?php
    }
//echo json_encode ($dataarray);
?>

    </tbody>
    </table>


  </div><!-- /.box-body -->
              </div>
              

