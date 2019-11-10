 <?php
require '../../connect.php';
$id = $_GET["id"];
$query = "SELECT worship_place.id, worship_place.name as worship_place_name, worship_place.address, worship_place.image, worship_place.land_size, worship_place.building_size, worship_place.park_area_size, worship_place.capacity, worship_place.est, worship_place.last_renovation, worship_place.imam, worship_place.jamaah, worship_place.teenager, category_worship_place.name as category_name, administrators.name as admin_name, ST_X(ST_Centroid(geom)) As lng, ST_Y(ST_Centroid(geom)) As lat FROM worship_place left join category_worship_place on category_worship_place.id=worship_place.id_category left join administrators on administrators.id_worship_place=worship_place.id where worship_place.id='$id'";
$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
  $id=$row['id'];
  $worship_place_name=$row['worship_place_name'];
  $address=$row['address'];
  $land_size=$row['land_size'];
  $building_size=$row['building_size'];
  $park_area_size=$row['park_area_size'];
  $capacity=$row['capacity'];
  $est=$row['est'];
  $last_renovation=$row['last_renovation'];
  $imam=$row['imam'];
  $jamaah=$row['jamaah'];
  $teenager=$row['teenager'];
  $category_name=$row['category_name'];
  $admin_name=$row['admin_name'];
  $image=$row['image'];
  $lat=$row['lat'];
  $lng=$row['lng'];
  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Kosong</span>';
    $lng='<span style="color:red">Kosong</span>';
  }
    if ($image=='null' || $image=='' || $image==null){
    $image='foto.jpg';
  }
}
  ?>
		
 
  <div class="col-sm-6"> 
                  <section class="panel">
                      <header class="panel-heading">
						<h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $worship_place_name ?></b></h2>
              
                      </header>
                      <div class="panel-body">
							<table>
					<tbody  style='vertical-align:top;'>
<tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
						
<tr><td><b>Land Size</b></td><td>:</td><td><?php echo $land_size ?> m<sup>2</sup></td></tr>

<tr><td><b>Building Size</b></td> <td> :</td><td><?php echo $building_size ?></td></tr>

<tr><td><b>Park Area Size<b> </td><td>: </td><td><?php echo $park_area_size ?> m<sup>2</sup></td></tr>

<tr><td><b>Capacity<b> </td><td>: </td><td><?php echo $capacity ?></td></tr>

<tr><td><b>Establish<b> </td><td>: </td><td><?php echo $est ?></td></tr>

<tr><td><b>Last Renovation<b> </td><td>: </td><td><?php echo $last_renovation ?></td></tr>

<tr><td><b>Imam<b> </td><td>: </td><td><?php echo $imam ?></td></tr>

<tr><td><b>Jamaah<b> </td><td>: </td><td><?php echo $jamaah ?></td></tr>

<tr><td><b>Teenager<b> </td><td>: </td><td><?php echo $teenager ?></td></tr>

<tr><td><b>Category<b> </td><td>: </td><td><?php echo $category_name ?></td></tr>

<tr><td><b>Administrator<b> </td><td>: </td><td><?php echo $admin_name ?></td></tr>

<tr><td><b>Koordinat<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>
						
					</tbody>
					
				</table>
				<div class="btn-group">
						<a href="?page=updatemesjidadminlay&id=<?php echo $id ?>" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp Edit Information</a>

            <br><br><br><br><br><a class='btn btn-round' role='button' data-toggle='collapse' href='#info' onclick='' title='Nearby' aria-controls='Nearby'><i class='fa fa-plus' style='color:black;'></i><label>&nbsp Add Info</label>
                            </a>
        </div>

        <div class='collapse' id='info'>
          <form method="post" action="act/addinfo.php">
            <input type="text" class="form-control hidden " id="id" name="id" value="<?php echo $id ?>">
            <input type="text" class="form-control hidden " id="username" name="username" value="<?php echo $username ?>">
            <table class="table">
              <tbody  style='vertical-align:top;'>
                <tr><td><b>Essential Information :</td><td><textarea cols="40" rows="5" name="info"></textarea></td></tr>
                            <tr><td><input type="submit" value="Post Information"/></td><td></td></tr>

                
              </tbody>          
            </table>

          </form>
          </div>
           <?php 
                     
                      $id = $_GET["id"];
                      // echo "ini $id";

                      if(strpos($id,"H") !== false){
                        $sqlreview = "SELECT * from information_admin where id_hotel = '$id'";
                      }elseif (strpos($id,"RM") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_kuliner = '$id'";
                      }elseif (strpos($id, "SO") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_souvenir = '$id'";
                      }elseif (strpos($id,"IK") !== false) {
                         $sqlreview = "SELECT * from information_admin where id_ik = '$id'";
                      }elseif (strpos($id,"tw")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_ow = '$id'";
                      }elseif (strpos($id,"M")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_worship = '$id'";
                      }
                        
                      $result = pg_query($sqlreview);
                    ?>
                    <table class="table">
                      <thead><th>Tanggal</th><th class="centered">Info</th><th>action</th></thead>
                      <?php  
                        while ($rows = pg_fetch_array($result)) 
                          {
                            $tgl = $rows['tanggal'];
                            $info = $rows['informasi'];
                            $id_info =$rows['id_informasi'];
                            echo "<tr><td>$tgl</td><td>$info</td><td><a href='act/deleteinfo.php?id_informasi=$id_info' class='btn btn-sm btn-default' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";
                          }

                       ?>               
                    
                    </table>
        </div>

</section>
	</div>
	
	<div class="col-sm-5"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3> Picture of <?php echo $worship_place_name ?></h3>
              
                      </header>
                      <div class="panel-body">
                         <?php $id=$_GET['id'] ?>
	<?php
	$querysearch="SELECT gallery_worship_place FROM worship_place_gallery where id='$id'";

	$hasil=pg_query($querysearch);
	 
	 while($baris = pg_fetch_array($hasil))
	 {
	 	
	 	//echo $baris['gallery_culinary'];
	 	?>
				<image src="../../_foto/<?php echo $baris['gallery_worship_place']; ?>" style="width:10%;">
			<?php
	 }
	?>
                      </div>
					  
					  
                  </section>
              </div>
			  <div class="col-sm-5"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>Upload Picture of <?php echo $worship_place_name ?></h3>
              
                      </header>
                      <div class="panel-body">
                          <!-- form start -->
	

	<form role="form" action="act/uploadfotomes.php" enctype="multipart/form-data" method="post">
	  <div class="box-body">
		
		<input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
		 <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
		</div>
		<span style="color:red;">*Maximum image size 500kb</span>
	  </div><!-- /.box-body -->

	  <div class="box-footer">
		<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
	  </div>
	</form>
                      </div>
					  
					  
                  </section>
              </div>
                  
              