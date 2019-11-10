      <?php
      // include('../act/session.php');
      
if(isset($_GET['id']))
  {
  $id=$_GET["id"];

  $sql=pg_query("DELETE from detail_product_small_industry where id_small_industry='$id'");
  //$sql3=pg_query("DELETE from detail_facility_culinary where id_culinary_place='$id'");
  $sql1=pg_query("DELETE from detail_small_industry where id_small_industry='$id'");
  $sql4=pg_query("DELETE from industry_gallery where id='$id'");
  $sql2=("DELETE from small_industry where id='$id'");

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

      
    <div class="btn-group" style="width:120px;">
    <a href="?page=formcraft" class="btn btn-theme">Add Craft's Data <i class="fa fa-plus"></i></a>
    </div>
    <br><br>

    <!-- <div class="btn-group" style="width:120px;">
    <a href="?page=formsou2" class="btn btn-theme">Add Craft's Data <i class="fa fa-plus"></i></a>
    </div> -->

    
    
     

    </div>
    <br><br><br>

    <table  id="dataTableExample2" class="table table-hover table-bordered table-striped">
    
    <thead>
      <tr>
      <!-- <th>ID</th> -->
      <th  style="width:200px;color:black">Nama</th>
      <th style="width:200px;color:black">Alamat</th>
      <th  style="width:200px;color:black">Aksi</th>
      
      </tr>
    </thead>
    <tbody>
    
    <?php
    include("inc/connect.php");
    $id = $_GET['id'];
    // $querysearch  ="SELECT souvenir.id, souvenir.name, souvenir.address FROM souvenir order by id ASC ";
    // $hasil=pg_query($querysearch);
    
    
    $querysearch2  ="SELECT small_industry.id, small_industry.name, small_industry.address FROM small_industry order by id ASC ";
    $hasil2=pg_query($querysearch2);



    // while($baris = pg_fetch_array($hasil))
    // {
    //   $id=$baris['id'];
    //       $name=$baris['name'];
          
    //       $address=$baris['address'];
          
          
    //       $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address);



?>
  <!--   <tr>
     
    <td style="color:black"><?php echo "$name" ?>
    </td>
      
    <td style="color:black"><?php echo "$address" ?>
    </td>
      

      <td>
      <div class="btn-group">
        <a href="?page=detailsouvenir&id=<?php echo $id; ?>" class="btn btn-round btn-default" title='Detail'><i class="fa fa-exclamation-circle"></i> Detail</a>
        &nbsp&nbsp&nbsp
        </div>
        <div class="btn-group">
        <a href="?page=souvenir&id=<?php echo $id; ?>" onclick="return confirm('Are You Sure To Delete?')" class="btn btn-round btn-default" title='Delete'><i class="fa fa-trash"></i> Delete</a>
        </div>
      </td>

    </tr> -->
<?php
    // }
echo json_encode ($dataarray);
    while($baris = pg_fetch_array($hasil2))
    {
      $id=$baris['id'];
          $name=$baris['name'];
          
          $address=$baris['address'];
          
          
          $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address);



?>
    <tr>
     
    <td style="color:black"><?php echo "$name" ?>
    </td>
      
    <td style="color:black"><?php echo "$address" ?>
    </td>
      

      <td>
      <div class="btn-group">
        <a href="?page=detailcraft&id=<?php echo $id; ?>" class="btn btn-round btn-default" title='Detail'><i class="fa fa-exclamation-circle"></i> Detail</a>
        &nbsp&nbsp&nbsp
        </div>
        <div class="btn-group">
        <a href="?page=craft&id=<?php echo $id; ?>" onclick="return confirm('Are You Sure To Delete?')" class="btn btn-round btn-default" title='Delete'><i class="fa fa-trash"></i> Delete</a>
        </div>
      </td>

    </tr>
<?php
    }
?>

    </tbody>
    </table>


  </div><!-- /.box-body -->
  