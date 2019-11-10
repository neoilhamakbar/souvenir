<?php
require '../../connect.php';
$id=$_GET["id"];

$query="SELECT small_industry.id,small_industry.name,small_industry.address,small_industry.cp,small_industry.employee,small_industry.owner, status.status, industry_type.name AS tipe,ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) As lat FROM small_industry join status on small_industry.id_status=status.id join industry_type on small_industry.id_industry_type=industry_type.id  where small_industry.id='$id' ";

$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
	$id=$row['id'];
	$name=$row['name'];
	$address=$row['address'];
	$cp=$row['cp'];
	$owner=$row['owner'];
	$employee=$row['employee'];
	$status=$row['status'];
	$tipe=$row['tipe'];
	 $lat=$row['lat'];
	$lng=$row['lng'];
	if ($lat=='' || $lat==''){
		$lat='<span style="color:red">Kosong</span>';
		$lng='<span style="color:red">Kosong</span>';
	}
}
?>
<!-- Default box -->

    <div class="row mt">
    <div class="col-lg-7 ds" style="background-color:#f2f2f2;margin-left:30px;margin-bottom:20px">
	<div class="box-header with-border">
	 <h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $name ?></b></h2>
	</div>

    <!-- First Action -->
    <div class="panel-body">
    <table>
		<tbody  style='vertical-align:top;'>
		<tr><td><b>Type</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $tipe ?></td></tr>
		<tr><td><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
		<tr><td><b>Telephone</b></td><td>:</td><td><?php echo $cp ?></td></tr>
		<tr><td><b>Owner</b></td><td>:</td><td><?php echo $owner ?></td></tr>
		<tr><td><b>Employee</b> </td><td>: </td><td><?php echo $employee ?></td></tr>
		<tr><td><b>Status</b> </td><td>: </td><td><?php echo $status ?></td></tr>
		<tr><td><b>Data Spasial</b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <b>Longitude</b> : <?php echo $lng ?></td></tr>
		<tr><td><b>Product</b> </td><td>: </td><td>
		
		<ul style="padding-left:20px;">
		<table class="table table-hover table-bordered table-striped">
			<thead><th>Produk Souvenir</th><th>Harga</th></thead>
			<tbody>													
			<?php 
			$queryl = "SELECT * from detail_product_small_industry join product_small_industry on detail_product_small_industry.id_product=product_small_industry.id join small_industry on detail_product_small_industry.id_small_industry=small_industry.id where small_industry.id='$id' order by detail_product_small_industry.id_product";
			$hasill=pg_query($queryl);
			while($rowl = pg_fetch_array($hasill)){
			?>
			
			<tr>
			<td><?php echo $rowl['product']; ?></td>
			<td><?php echo $rowl['price']; ?></td>
			</tr>
			
			<?php } ?>
			</tbody>
			</ul>
			</table>
			
			<a href="?page=forml2&id=<?php echo $id ?>" class="btn btn-round btn-warning"><i class="fa fa-edit"></i> Set Product</a>
			</td></tr>
					</tbody>
				</table>
				</ul>


				<br><tr><td>
					<class="btn btn-round btn-warning"><i class="fa fa-plus-square"></i><b> Add Information</b></a>
				</td></tr>

				
					<table id="addinfo" class="table">
					<form method="POST" action="act/addinfoc.php">
                        <tbody  style='vertical-align:top;'>
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <tr><td><b>Essential Information :</td><td><textarea cols="40" rows="5" name="info"></textarea></td></tr>
                        <tr><td><input type="submit" value="Post Information"/></td><td></td></tr>
                           <?php 
                     
                      // $id = $_GET["id"];
                      // echo "ini $id";

                      if(strpos($id,"RM") !== false){
                        $sqlreview = "SELECT * from information_admin where id_kuliner = '$id'";
                      }elseif (strpos($id,"SO") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_souvenir = '$id'";
                      }elseif (strpos($id, "IK") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_ik = '$id'";
                      }elseif (strpos($id,"H") !== false) {
                         $sqlreview = "SELECT * from information_admin where id_hotel = '$id'";
                      }elseif (strpos($id,"OW")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_ow = '$id'";
                      }
                      // echo $sqlreview;
                      $result = pg_query($sqlreview);
                    ?>
                    <table class="table">
                    	<thead><th>Tanggal</th><th class="centered">Informasi</th><th>Action</th></thead>
                    <?php  
                      while ($rows = pg_fetch_array($result)) 
                        {
                          $tgl = $rows['tanggal'];
                          $info = $rows['informasi'];
                          $id_info = $rows['id_informasi'];
                          echo "<tr><td>$tgl</td><td>$info</td><td><a href='act/deleteinfoc.php?id_informasi=$id_info&id=$_GET[id]' class='btn btn-sm btn-default' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";
                        }
                    

                       ?> 
                          </tbody>          
                      </table>
                      </form>


				</div>

				<div class="box-footer">
					<div class="btn-group">
					</div>
					<!-- <br><br> -->
					<td><div class="btn-group"><a href="?page=craft" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a> </div>
					<div class="btn-group"><a href="?page=formeditspasialind&id=<?php echo $id ?>" class="btn btn-primary pull-left"><i class="fa fa-edit"></i> Edit Data</a></div>
					</td>
				</div><!-- /.box-footer-->
            </div>


	<div class="col-lg-1 col-xs-1">
	</div>

	<div class="col-lg-3 col-xs-3" style="background-color:#f2f2f2">
		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Foto</h3>
			  <h4 class="box-title" style="text-transform:capitalize;"><b> <?php echo $name ?></b></h4>
			</div>
			<div class="box-body">
					<?php $id=$_GET['id'] ?>
							<?php
							$querysearch="SELECT gallery_industry FROM industry_gallery where id='$id'";

							$hasil=pg_query($querysearch);
							 
							 while($baris = pg_fetch_array($hasil))
							 {
							 	?>
										<image src="../../_foto/<?php echo $baris['gallery_industry']; ?>" style="width:30%;">
									<?php
							 }
							?>
			</div>
			<br>
			<div class="box-footer">
				<div class="btn-group">
				</div>

					<form role="form" action="act/uploadphotoind.php" enctype="multipart/form-data" method="post">
					  <div class="box-body">
						
						<input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
						<div class="form-group">
						  <label for="file">Upload Foto</label>
						  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
						</div>
						<span style="color:red;">*Ukuran gambar maksimal 500kb</span>
					  </div><!-- /.box-body -->

					  <div class="box-footer">
						<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
					  </div>
					</form>
			</div><!-- /.box-footer-->

			<br>
		</div>
	</div>

	<div class="col-lg-1 col-xs-1"></div>



</div>



</div>
<script>
	
</script>