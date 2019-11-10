  

              <div class="col-lg-15 ds" id="hide2"> 
                       
          
              <div class="box-body">
              <div class="btn-group pull-left" style="width:100px;">
            <a href="?page=souvenir<?php echo $id ?>" class="btn btn-theme"><i class="fa fa-chevron-left"></i> Kembali</a>  </div>
              
    <div class="btn-group pull-right" style="width:90px;">
    <a href="?page=formprosouv" class="btn btn-theme">Tambah <i class="fa fa-plus"></i></a><br><br><br>
    </div>
    </div>
              <table id="" class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
     <!--  <th>ID Jenis Industri</th> -->
      <th>Produk Souvenir</th>
      <th>Aksi</th>

      </tr>
    </thead>
    <tbody>
    
<?php
    include '../../connect.php';
    $id = $_GET['id'];
    $querysearch  ="SELECT product_souvenir.id, product_souvenir.product FROM product_souvenir order by id ASC ";
             
    $result=pg_query($querysearch);
    while($baris = pg_fetch_array($result))
    {
          $id=$baris['id'];
          $product=$baris['product'];
          
          
          $dataarray[]=array('id'=>$id,'product'=>$product);
?>
    <tr>
      
      <td><?php echo "$product" ?></td>
       <td><div class="btn-group">

      
      <a href="?page=editprosouv&id=<?php echo $id; ?>" class="btn btn-round btn-default" title='Edit'><i class="fa fa-edit"></i> Edit</a>
      </div>
      <div class="btn-group">
        <a href="act/delete_produksouvenir.php?id=<?php echo $id; ?>" onclick="return confirm('Are You Sure Want To Delete?')" class="btn btn-round btn-default" title='Delete'><i class="fa fa-trash"></i> Delete</a>
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
              

