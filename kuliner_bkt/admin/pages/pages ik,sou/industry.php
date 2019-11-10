      <?php
      // include('../act/session.php');
      
if(isset($_GET['id']))
  {
  $id=$_GET["id"];

  $sql="DELETE from industri_kecil_region where id=$id";

  if(pg_query($sql)){
      echo"<script>alert ('Data Berhasil Dihapus');</script>";
      //header("location:../admin");
    }else
    {
      echo"<script>alert ('Data Gagal Dihapus');</script>";
    }
  }

      ?>


                    <div class="col-lg-15 ds" id="hide2"> 
                       
          
              <div class="box-body">

       
    <div class="btn-group pull-right">
    <a href="?page=form" class="btn btn-default">Add Data <i class="fa fa-plus"></i></a>
    </div>
    <!-- <div class="col-xs-6">
    <div id=example_length" class"dataTables_length">
    <label>
    <select size="1" name="example1_length" aria-controls="example1">
    <option value="10">10</option>
    <option value="25">25</option>
    <option value="50">50</option>
    <option value="100">100</option>
    </select>
    "data per halaman"
    </label>
    </div>
    </div>
 -->
     

    </div>
    <br><br><br>

           
                        
          
           
              
              
              <table  id="dataTableExample2" class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
      <!-- <th>ID</th> -->
      <th>Nama</th>
      <th>Alamat</th>
      <th>Produk</th>
      <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    
<?php
    include("inc/connect.php");
    $id = $_GET['id'];
    $querysearch  ="SELECT industri_kecil_region.id, industri_kecil_region.nama_industri, industri_kecil_region.alamat, industri_kecil_region.produk FROM industri_kecil_region order by id ASC ";
             
    $hasil=pg_query($querysearch);
    while($baris = pg_fetch_array($hasil))
    {
      $id=$baris['id'];
          $nama_industri=$baris['nama_industri'];
          
          $alamat=$baris['alamat'];
          $produk=$baris['produk'];
          
          $dataarray[]=array('id'=>$gid,'nama_industri'=>$nama_industri,'alamat'=>$alamat,'produk'=>$produk);
?>
    <tr>
     
      <td><?php echo "$nama_industri" ?></td>
      
      <td><?php echo "$alamat" ?></td>
      <td><?php echo "$produk" ?></td>

      <td><div class="btn-group">
        <a href="?page=detail&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-exclamation-circle"></i> Detail</a>
        </div>
        <div class="btn-group">
        <a href="?page=industry&id=<?php echo $id; ?>" onclick="return confirm('Are You Sure To Delete?')" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash"></i></a>
        </div>
      </td>

    </tr>
<?php
    }
//echo json_encode ($dataarray);
?>

    </tbody>
    </table>


  </div><!-- /.box-body -->
            
           
             