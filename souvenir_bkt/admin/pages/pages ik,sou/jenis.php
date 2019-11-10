     <?php
if(isset($_GET['id_jenis_industri']))
  {
  $id_jenis_industri=$_GET["id_jenis_industri"];

  $sql="DELETE from jenis_industri where id_jenis_industri=$id_jenis_industri";

  if(pg_query($sql)){
      echo"<script>alert ('Data Berhasil Dihapus');</script>";
      //header("location:./?page=jenis");
    }else
    {
      echo"<script>alert ('Data Gagal Dihapus');</script>";
    }
  }

      ?>       

              <div class="col-lg-15 ds" id="hide2"> 
                       
          
              <div class="box-body">
              
       <a href="?page=industry<?php echo $id ?>" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a>        
    <div class="btn-group pull-right">
    <a href="?page=formjns" class="btn btn-default">Tambah <i class="fa fa-plus"></i></a><br><br><br>

    </div>
    </div>
              <table id="" class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
     <!--  <th>ID Jenis Industri</th> -->
      <th>Jenis Industri</th>
      <th>Aksi</th>

      </tr>
    </thead>
    <tbody>
    
<?php
    include '../connect.php';
    $id_jenis_industri = $_GET['id_jenis_industri'];
    $querysearch  ="SELECT jenis_industri.id_jenis_industri, jenis_industri.nama_jenis_industri FROM jenis_industri order by id_jenis_industri ASC ";
             
    $result=pg_query($querysearch);
    while($baris = pg_fetch_array($result))
    {
          $id_jenis_industri=$baris['id_jenis_industri'];
          $nama_jenis_industri=$baris['nama_jenis_industri'];
          
          
          $dataarray[]=array('id_jenis_industri'=>$id_jenis_industri,'nama_jenis_industri'=>$nama_jenis_industri);
?>
    <tr>
      
      <td><?php echo "$nama_jenis_industri" ?></td>
       <td><div class="btn-group">

      
      <a href="?page=editjns&id_jenis_industri=<?php echo $id_jenis_industri; ?>" class="btn btn-sm btn-default" title='Edit'><i class="fa fa-edit"></i> Edit</a>
      </div>
      <div class="btn-group">
        <a href="?page=jenis&id_jenis_industri=<?php echo $id_jenis_industri; ?>" onclick="return confirm('Are You Sure To Delete?')" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash"></i></a>
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
              

