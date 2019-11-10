      <?php
      // include('../act/session.php');
      
if(isset($_GET['id']))
  {
  $id=$_GET["id"];

  $sql=pg_query("DELETE from detail_culinary where id_culinary_place='$id'");
  $sql3=pg_query("DELETE from detail_facility_culinary where id_culinary_place='$id'");
  $sql4=pg_query("DELETE from culinary_gallery where id='$id'");
  //$sql1=pg_query("DELETE from detail_culinary_place where id_culinary_place='$id_culinary_place'");
  $sql2=("DELETE from culinary_place where id='$id'");

  if(pg_query($sql2)){
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

      
    <div class="btn-group pull-right" style="width:120px;">
    <a href="?page=formkul" class="btn btn-theme">Add Data <i class="fa fa-plus"></i></a>
    </div>
    
     

    </div>
    <br><br><br>


              
              <table  id="dataTableExample2" class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
      <!-- <th>ID</th> -->
      <th  style="color:black">Nama</th>
      <th style="width:400px;color:black">Alamat</th>
      <th  style="width:200px;color:black">Aksi</th>
      
      </tr>
    </thead>
    <tbody>
    
<?php
    include("../../../connect.php");
    $id = $_GET['id'];
    $querysearch  ="SELECT culinary_place.id, culinary_place.name, culinary_place.address FROM culinary_place order by id ASC ";
             
    $hasil=pg_query($querysearch);
    while($baris = pg_fetch_array($hasil))
    {
      $id=$baris['id'];
          $name=$baris['name'];
          
          $address=$baris['address'];
          
          
          $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address);
?>
    <tr>
     
      <td style="color:black"><?php echo "$name" ?></td>
      
      <td style="color:black"><?php echo "$address" ?></td>
      

      <td><div class="btn-group">
        <a href="?page=detailculinary&id=<?php echo $id; ?>" class="btn btn-round btn-default" title='Detail'><i class="fa fa-exclamation-circle"></i> Detail</a>
        &nbsp&nbsp&nbsp
        </div>
        <div class="btn-group">
        <a href="?page=culinary&id=<?php echo $id; ?>" onclick="return confirm('Are You Sure Want To Delete?')" class="btn btn-round btn-default" title='Delete'><i class="fa fa-trash"></i> Delete</a>
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
            
           
             