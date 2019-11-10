  <?php
  session_start();
require 'act/viewdatamas.php';
  ?>
		 			
                  <div class="col-lg-12">
					<div class="row content-panel">
						<div class="col-md-4 profile-text mt mb centered">
							<div class="right-divider hidden-sm hidden-xs">
								<img src="../../_foto/<?php echo "$image"; ?>" style="width:50%;;">
							</div>
						</div>
						
						<div class="col-md-4 profile-text">
							<h3><b> <?php echo $worship_place_name ?></b></h3>
							<p><?php echo $address ?></p>
							<br>
						</div>
						
						<div class="col-md-4 centered">
							<div class="profile-pic">
								<p><img src="../assets/img/masjid.png"></p>
							</div>
						</div>
					</div><!-- /row -->	   
          		</div>

          		<div class="col-lg-6 mt">
          		<div class="row content-panel">
          		<div class="col-lg-9 col-lg-offset-2 detailed">
                  <h4>INFORMATION</h4>
							<table class="table table-stripped">
					<tbody  style='vertical-align:top;'>
						<tr><td><b>Land Size</b></td><td>:</td><td><?php echo $land_size ?> m<sup>2</sup></td></tr>
						<tr><td><b>Building Size</b></td> <td> :</td><td><?php echo $building_size ?> m<sup>2</sup></td></tr>
						<tr><td><b>Park Area Size<b> </td><td>: </td><td><?php echo $park_area_size ?> m<sup>2</sup></td></tr>
						<tr><td><b>Capacity<b> </td><td>: </td><td><?php echo $capacity ?></td></tr>
						<tr><td><b>Establish<b> </td><td>: </td><td><?php echo $est ?></td></tr>
						<tr><td><b>Last Renovation<b> </td><td>: </td><td><?php echo $last_renovation ?></td></tr>
						<tr><td><b>Imam<b> </td><td>: </td><td><?php echo $imam ?></td></tr>
						<tr><td><b>Jamaah<b> </td><td>: </td><td><?php echo $jamaah ?></td></tr>
						<tr><td><b>Teenager<b> </td><td>: </td><td><?php echo $teenager ?></td></tr>
						<tr><td><b>Category<b> </td><td>: </td><td><?php echo $category_name ?></td></tr>
						<tr><td><b>Administrator<b> </td><td>: </td><td><?php echo $admin_name ?></td></tr>
						<tr><td><b>Facility<b> </td><td>: </td><td><ul style="padding-left:20px;"><?php $query1 = "select * from detail_facility join facility on detail_facility.id_facility=facility.id where id_worship_place='$id' order by detail_facility.id_facility";
						$hasil1 = pg_query($query1); 
						while($row1 = pg_fetch_array($hasil1)){
							echo '<li>'.$row1['name'].'</li>';
						}
						?></ul></td></tr>
						<tr><td><b>Coordinate<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>	
					</tbody>
					
				</table>
                      </div>
                      </div>
                      </div>

			  
			  
			  <div class="col-lg-6 mt">
          		<div class="row content-panel">
          		<div class="col-lg-8 col-lg-offset-2 detailed">
                  <h4>Picture of <?php echo $worship_place_name ?></h4>
				  <br>
				  <div class="box-body" style="max-height:720px;overflow:auto;">
					<?php $id=$_GET['id'] ?>
	<?php
	$querysearch="SELECT gallery_worship_place FROM worship_place_gallery where id='$id_worship_place'";

	$hasil=pg_query($querysearch);
	 
	 while($baris = pg_fetch_array($hasil))
	 {
	 	?>
		<div class="col-sm-20">
				<image src="../foto/<?php echo $baris['gallery_worship_place']; ?>" style="width:100%; padding:3px">
				</div>
			<?php
	 }
	?>
	<br>
	 </div>
	 </div>
                      
                      </div>
                      </div>

  <br><br>
  <div class="col-lg-6 mt">
  <div class="row content-panel">
  <div class="col-lg-8 col-lg-offset-2 detailed">
  <h4>Add Information</h4>
  <tr><td>
  <class="btn btn-round btn-warning"><i class="fa fa-plus-square"></i><b> Add Information</b></a>
  </td></tr>

  	<table id="addinfo" class="table">
		<form method="POST" action="act/addinfo.php">
		<tbody  style='vertical-align:top;'>
		<input type="hidden" name="id" value="<?php echo $_SESSION["id_mesjid"]; ?>">
		<input type="hidden" name="id" value="<?php echo $_SESSION["id_mesjid"]; ?>">
			<tr><td><b>Essential Information :</td><td><textarea cols="40" rows="5" name="info"></textarea></td></tr>
		<tr><td><input type="submit" value="Post Information"/></td><td></td></tr>
		   <?php 

		$id = $_SESSION["id_mesjid"];
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
		}elseif (strpos($id,"M")!== false) {
		 $sqlreview = "SELECT * from information_admin where id_worship = '$id'";
		}

		// echo $sqlreview;
		$result = pg_query($sqlreview);
		?>
		<table class="table">
		<thead><th>Tanggal</th><th class="centered">Informasi</th><th>Action</th>
		</thead>
		<?php  
		while ($rows = pg_fetch_array($result)) 
		{
		  $tgl = $rows['tanggal'];
		  $info = $rows['informasi'];
		  $id_info = $rows['id_informasi'];
		  echo "<tr><td>$tgl</td><td>$info</td><td><a href='act/deleteinfo.php?id_informasi=$id_info&id=$_GET[id]' class='btn btn-sm btn-default' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";
		}


		?> 
		  </tbody>          
		</table>
		</form>


		</div>		


  </div>
  </div>
  </div>


         