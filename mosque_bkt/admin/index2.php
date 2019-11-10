<?php 
session_start();
if(!isset($_SESSION['admin'])){
	echo"<script language='JavaScript'>document.location='login.php'</script>";
	  exit();
}
include("../../connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mosque Finder</title>

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
	<script src="mapedit.js" type="text/javascript"></script>
	<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true&libraries=drawing&callback="  async defer"></script>
    <script src="../assets/js/chart-master/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/datertimepicker.html" />

	
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                  
              </div>
              <a href="./" class="logo" style="font-size:14px"><b>Mosque Finder Geographic Information System</b></a>
            
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                   <a href="logout.php" class="logo1"><i class="fa fa-sign-in"></i>
                   <span>Logout</span></a>
              </ul>
            </div>
        </header>
      <aside>
                    <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="../assets/img/fr-10.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><p><?php echo $_SESSION['username']; ?></p></h5>
                    
                  <li class="mt">
                      <a href="javascript:;" onclick="reset1()">
                          <i class="fa fa-dashboard"></i>
                          <span>Edit Information</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="show1()">
                          <i class="fa fa-cogs"></i>
                          <span>List Event</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="show3()">
                          <i class="fa fa-book"></i>
                          <span>List Mosque</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="show4()">
                          <i class="fa fa-book"></i>
                          <span>Facility</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="show2()">
                          <i class="fa fa-tasks"></i>
                          <span>User Management</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <section id="main-content">
          <section class="wrapper">
		  <div class="row mt">
		  <div class="col-sm-6" id="hide2"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>                    
          <input id="latlng" type="text" class="form-control" style="width:200px" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button> </h3>
              
                      </header>
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:350px; z-index:50"></div>
                      </div>
                  </section>
              </div>
			  
			  <div class="col-sm-6" id="hide3"> <!-- menampilkan form add mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Add Mosque</a>
                        <div class="box-body">
             
                      <div class="form-group" id="hasilcari1">
                        <form role="form" action="insertmasjid.php" enctype="multipart/form-data" method="post">
                         <?php
          $query = pg_query("SELECT MAX(id) AS id FROM mesjid");
          $result = pg_fetch_array($query);
          $idmax = $result['id'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax;?>">
        <div class="form-group">
          <label for="geom"><span style="color:red">*</span> Koordinat</label>
          <textarea class="form-control" id="geom" name="geom" readonly required></textarea>
        </div>
        <div class="form-group">
          <label for="nama"><span style="color:red">*</span>Name</label>
          <input type="text" class="form-control" name="nama" value="" required>
        </div>
        <div class="form-group">
          <label for="alamat">Address</label>
          <input type="text" class="form-control" name="alamat" value="">
        </div>
        <div class="form-group">
          <label for="pengurus">Pengurus Name</label>
          <select  name="pengurus" id="pengurus" class="form-control">
             <?php
                                
              $pengurus=pg_query("select * from login ");
              while($rowpengurus = pg_fetch_assoc($pengurus))
              {
              echo"<option value=".$rowpengurus['username'].">".$rowpengurus['nama']."</option>";
              }
              ?>
                              
          </select>
        </div>
        <div class="form-group">
          <label for="luas_tanah">Luas Tanah</label>
          <input type="text" class="form-control" name="luas_tanah" value="" >
        </div>
        <div class="form-group">
          <label for="luas_bangunan">Luas Bangunan</label>
          <input type="text" class="form-control" name="luas_bangunan" value="" >
        </div>
        <div class="form-group">
          <label for="luas_area_parkir">Luas Area Parkir</label>
          <input type="text" class="form-control" name="luas_area_parkir" value="">
        </div>
        <div class="form-group">
          <label for="kapasitas">Capacity</label>
          <input type="text" class="form-control" name="kapasitas" value="">
        </div>
        <div class="form-group">
          <label for="thn_berdiri">Tahun Berdiri</label>
          <input type="text" class="form-control" name="thn_berdiri" value="">
        </div>
        <div class="form-group">
          <label for="thn_renovasi_terakhir">Tahun Renovasi Terakhir</label>
          <input type="text" class="form-control" name="thn_renovasi_terakhir" value="">
        </div>
        <div class="form-group">
          <label for="jml_imam">Jumlah Imam</label>
          <input type="text" class="form-control" name="jml_imam" value="">
        </div>
        <div class="form-group">
          <label for="jml_jamaah">Jumlah Jamaah</label>
          <input type="text" class="form-control" name="jml_jamaah" value="">
        </div>
        <div class="form-group">
          <label for="jml_remaja">Jumlah Remaja</label>
          <input type="text" class="form-control" name="jml_remaja" value="">
        </div>
        <div class="form-group">
          <label for="kategori">Category</label>
          <select name="kategori" id="kategori" class="form-control">
             <?php
                                
              $kategori=pg_query("select * from kategori ");
              while($rowkategori = pg_fetch_assoc($kategori))
              {
              echo"<option value=".$rowkategori['id_kategori'].">".$rowkategori['nama_kat']."</option>";
              }
              ?>
                              
          </select>
        </div>  
         <div class="form-group">
                                  <label class="control-label col-md-3">Image Upload</label>
                                  <div class="col-md-9">
								  
                                      <div class="fileupload fileupload-new" data-provides="fileupload">
                                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                          </div>
                                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                          <div>
                                              <span class="btn btn-theme02 btn-file">
	                                              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
	                                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
												  <input type="file" class="default" name="image"/>
											  </span>
                                              <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                          </div>
                                      </div>
                                      <span class="label label-danger">NOTE!</span>
                                     <span>
										Maximum image size of 500KB
                                     </span>
                                  </div>
                              </div>
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>   
</form> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
				 
				 <div class="col-sm-12" id="hide1" style="display:none;"> <!-- menampilkan form add event-->
				<section class="panel">
                    <div class="panel-body">

                        <a class="btn btn-compose">Add Event</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                     
                        <form role="form" action="kegiatan.php" method="post">
                         <?php
          $query = pg_query("SELECT MAX(id_keg) AS id_keg FROM kegiatan");
          $result = pg_fetch_array($query);
          $idmax = $result['id_keg'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
                        <input type="text" class="form-control hidden" id="id_keg" name="id_keg" value="<?php echo $idmax;?>">
        <div class="form-group">
          <label for="nama"><span style="color:red">*</span>Name of Event</label>
          <input type="text" class="form-control" name="nama_keg" value="">
        </div>

		<div class="form-group">
          <label for="tanggal">Time</label>
		  <div class="input-group bootstrap-timepicker">
		  <input type="text" class="form-control timepicker-default" name="jam">
         <span class="input-group-btn">
           <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
           </span>
		  </div>
        </div>
        <div class="form-group">
          <label for="jam"><span style="color:red">*</span>Date</label>
          <input type="text" class="form-control form-control-inline input-medium default-date-picker" size="16" name="tgl" value="">
        </div>
        <div class="form-group">
          <label for="jam"><span style="color:red">*</span>Description</label>
          <input type="text" class="form-control" name="deskripsi" value="">
        </div>
        <div class="form-group">
          <label for="org">Organizer</label>
          <input type="text" class="form-control" name="penyelenggara" value="">
        </div>
        <div class="form-group">
          <label for="part">Participant</label>
          <input type="number" class="form-control" name="peserta" value="">
        </div>   
        <button type="submit" class="btn btn-primary pull-right" onclick="show1()">Save <i class="fa fa-floppy-o"></i></button>  
</form>

                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
				 
				 <div class="col-sm-12" id="hide4" style="display: none">  <!-- menampilkan list event-->
    <section class="panel">
                    <div class="panel-body">
                       <a onclick="reset()" class="btn btn-compose" title="Add Facility"><i class="fa fa-plus"></i>List Event</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Event Name</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Organizer</th>
                        <th>Participant</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT * FROM kegiatan");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id_keg'];
                        $nama_keg = $data['nama_keg'];
                        $jam = $data['jam'];
                        $tgl = $data['tgl'];
                        $deskripsi = $data['deskripsi'];
                        $penyelenggara = $data['penyelenggara'];
                        $peserta = $data['peserta'];
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama_keg"; ?></td>
                        <td><?php echo "$jam"; ?></td>
                        <td><?php echo "$tgl"; ?></td>
                        <td><?php echo "$deskripsi"; ?></td>
                        <td><?php echo "$penyelenggara"; ?></td>
                        <td><?php echo "$peserta"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=l_form&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i> Ubah</a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>

                 <div class="col-sm-12" id="hide8" style="display: none">  <!-- menampilkan fasilitas-->
    <section class="panel">
                    <div class="panel-body">
                        <a onclick="show5()" class="btn btn-compose" title="Add Facility"><i class="fa fa-plus"></i>Facility</a>
                        <div class="box-body">


                      <div class="form-group">

                       <table id="example3" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Facility</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT * FROM fasilitas");
                        while($data =  pg_fetch_array($sql)){
                        $id_fasilitas = $data['id_fasilitas'];
                        $nama_fasilitas = $data['nama_fasilitas'];
                        ?>
                        <tr>
                        <td><?php echo "$id_fasilitas"; ?></td>
                        <td><?php echo "$nama_fasilitas"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=l_form&id=<?php echo $id_fasilitas; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i> Ubah</a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>

                 <div class="col-sm-12" id="hide7" style="display: none">  <!-- menampilkan list mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">List Mosque</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Garin's Name</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT * FROM mesjid");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id'];
                        $nama = $data['nama'];
                        $alamat = $data['alamat'];
                        $nama_garin = $data['nama_garin'];
                        $deskripsi = $data['deskripsi'];
                        $penyelenggara = $data['penyelenggara'];
                        $peserta = $data['peserta'];
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$alamat"; ?></td>
                        <td><?php echo "$nama_garin"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=detail&gid=<?php echo $gid; ?>" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-exclamation-circle"></i> Detail</a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
         
				 
				  <div class="col-sm-12" id="hide5" style="display:none;"> <!-- menampilkan form add user-->
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Add User</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                        <?php if (!isset($_GET['user'])){ ?>
                        <form role="form" action="insertuser.php" method="post">
        <div class="form-group">
          <label for="user"><span style="color:red">*</span>Name</label>
          <input type="text" class="form-control" name="nama_user" value="">
        </div>
        <div class="form-group">
          <label for="user"><span style="color:red">*</span>Role</label>
          <select required name="role" class="form-control">
            <option value="admin">Admin Utama</option>
            <option value="admin_tempat_ibadah">Admin Tempat Ibadah</option>                             
          </select>
        </div>
        <div class="form-group">
          <label for="user"><span style="color:red">*</span>Username</label>
          <input type="text" class="form-control" name="username" value="">
        </div>
        <div class="form-group">
          <label for="pass"><span style="color:red">*</span>Password</label>
          <input type="password" class="form-control" name="password" value="">
        </div>  
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>  
</form>
<?php } ?>
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>

                 <div class="col-sm-12" id="hide9" style="display: none"> <!-- menampilkan form add facility-->
        <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Add Facility</a>
                        <div class="box-body" >
<?php if (!isset($_GET['id'])){ ?>
        <form role="form" action="insertfas.php" method="post">
          <a class="btn btn-success btn-sm" onclick="add()"><i class="fa fa-plus"></i></a>
          <a class="btn btn-danger btn-sm" onclick="rem()"><i class="fa fa-times"></i></a>
          <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-floppy-o"></i></button>
          <div class="form-group" style="clear:both" id="l_form">
            <label for="nama_fasilitas">Facility</label>
            <input type="text" class="form-control" name="fasilitas[]" value="" style="margin-bottom:3px;" autofocus required>
          </div>
        </form>

        <?php } ?>                 
                  </div>
                    </div>
                </section>
                 </div>

                 <div class="col-sm-12" id="hide4" style="display: none">  <!-- menampilkan list event-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">List Event</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Event Name</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Organizer</th>
                        <th>Participant</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT * FROM kegiatan");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id_keg'];
                        $nama_keg = $data['nama_keg'];
                        $jam = $data['jam'];
                        $tgl = $data['tgl'];
                        $deskripsi = $data['deskripsi'];
                        $penyelenggara = $data['penyelenggara'];
                        $peserta = $data['peserta'];
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama_keg"; ?></td>
                        <td><?php echo "$jam"; ?></td>
                        <td><?php echo "$tgl"; ?></td>
                        <td><?php echo "$deskripsi"; ?></td>
                        <td><?php echo "$penyelenggara"; ?></td>
                        <td><?php echo "$peserta"; ?></td>
                        <td><div class="btn-group">
                        <a href="?page=l_form&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i> Ubah</a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
			  
			  
			</div>
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    
  
  
   <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>
   <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>
	<script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>	
	<script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script src="../assets/js/advanced-form-components.js"></script>    
     <script type="text/javascript">
      $(function () {
        $('#example1, #example2, #example3').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
		  "iDisplayLength": 10,
		  "oLanguage": {
			 "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			 "sLengthMenu": "_MENU_ data per halaman",
			 "sSearch": "Cari:"
			}
        });
      });
    </script>

 

    
  </body>
</html>
