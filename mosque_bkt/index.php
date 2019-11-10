<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Bukittinggi's Mosque</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	  <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.html" />
	  <link rel="stylesheet" href="assets/css/bootstrap-slider.css" type="text/css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
    <script src="assets/js/chart-master/Chart.js"></script>
	  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	  <style type="text/css">
    .slider.slider-horizontal{
      width:100% !important;
    }
      #legend {
        background:white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
    }
		font-color: blue;
        font-family: Arial, sans-serif;
		opacity: 2.5;
	  }
		.color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
		}
	  .a {
        background: #f58d6f;
      }
	  .b {
        background: #f58d6f;
      }
      .c {
        background: #fce8b7;
      }
	  .d {
        background: #ec87ec;
      }
	  .e {
        background: #42cb6f;
      }
	  .f {
        background: #5c9ded;
      }
	  .g {
        background: #373435;
      }
	  .h {
        background: #d51e5a;
      }
	  .i {
        background: #9398ec;
      }
	  .j {
        background: #f9695d;
      }
	  .k {
        background: #ec87bf;
      }
	  .l {
        background: navy;
      }
   </style>
  </head>

  <body>

   <section id="container" >
      <header class="header black-bg">
             
            <a class="logo"><p><img src="assets/ico/111.png"><b>W</b>EB<b style="font-size: 17px">GIS</b></p></a>
            <!-- <a href="admin/login.php" class="logo1" title="Login" style="margin-top: 10px"><img src="assets/ico/112.png"></a> -->
            <h4>
            <div class="top-menu">
              <ul class="nav pull-right" style="margin-top: 6px">
                   <?php 
                   if ($_SESSION['C'] == false) 
                   {
                    echo "<a href='admin/' class='logo1' title='Login' ><img src='image/login.png'>
                   <span>Login</span></a>";
                   }
                   else
                   {
                    echo "<a href='admin/act/logout.php' class='logo1' title='Login' ><img src='image/login.png'>
                   <span>Logout</span></a>";
                   }
                    ?>
              </ul> 
            </div></h4>
            
 
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p>
				          <h5 class="centered">Hi, 
                  <?php 
                  if ($_SESSION['C'] == true) {
                    echo $_SESSION['username']; 
                  }
                  else{
                    echo "Visitor";
                  }
                  
                  ?>&nbsp!</h5>

                  <br>


                  <h6 class="centered" style="color: #f7d976;">Mosque</h6>
               
                    <!-- <a class="btn btn-default" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="All Mosque" aria-controls="terdekat"><i class="fa fa-map-pin" style="color:black;"></i></a> --> 

                     <li class="sub-menu">
                     <a href="javascript:;" onclick="tampilsemua()">
                        <i class="fa fa-list"></i>
                        <span>Mosque List</span>
                     </a>
                     </li>

                     <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-map-pin"></i>
                        <span>Mosque Arround You</span>
                      </a>
                      <ul class="treeview-menu">
                        <div class=" form-group" style="color: white;"> <br>
                          <label>Based On Radius</label><br>
                          <label for="inputradiuss">Radius : </label>
                          <label  id="nilai">0</label> m
                          
                            <input  type="range" onchange="init();cekkk();aktifkanRadius()" id="inputradius" 
                                  name="inputradius" data-highlight="true" min="0" max="20" data-slider-max="30" value="0" >
                          <script>
                            function cekkk()
                            {
                              document.getElementById('nilai').innerHTML=document.getElementById('inputradius').value*100
                            }
                          </script>
                        </div>
                                      <!-- <button type="button" id="inputradius" onclick="aktifkanRadius()" class="btn btn-info btn-block btn-flat" >Cari</button> -->
                      </ul>
                    </li>

                    <!-- <div class="panel-body">
                            <a style="margin-top: -20px; color: white" ><span>Nearby</span></a>
               <input  type="range" onclick="aktifkanRadiusAngkot();resultt()" id="inputradiusangkot" name="inputradiusangkot" data-highlight="true" min="0.5" max="15" value="0.5"> 
                          </div>
                      </ul>
                  </li>
                      </ul>
                  </li> -->


                      <li class="sub-menu">
                      <a href="javascript:;" onclick="resultt()">
                          <i class="fa fa-eye"></i>
                          <span>View Mosque</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-sort-alpha-asc"></i>
                          <span>Name</span>
                      </a>
                      <ul class="sub">
                        <div  class="panel-body" >
                          
                            <input type="text" class="form-control" id="carimasjid" name="carimasjid" placeholder="Search..." >
                            <br>
                            <button type="submit" class="btn btn-default" value="carimasjid" onclick="carinamamasjid()"> <i class="fa fa-search"></i></button>                          
                         
                        </div>
                      </ul>
                  </li>
				  

                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()" >
                          <i class="fa fa-globe"></i>
                          <span>Sub District</span>
                      </a>
                      <ul class="sub">
                         <div  class="panel-body" >
                            <select class="form-control" id="kecamatan" >
                                <?php
                                include("../connect.php"); 
                                $kecamatan=pg_query("select * from district ");
                                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                                {
                                echo"<option value=".$rowkecamatan['id'].">".$rowkecamatan['name']."</option>";
                                }
                                ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="caritpkec"  value="cari" onclick="caritpkec()"><i class="fa fa-search"></i></button>
                          </div>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-institution "></i>
                          <span>Categories</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
                          <select class="form-control" id="id_kategori" >
                                <?php
                                include("../connect.php"); 
                                $kategori=pg_query("select * from category_worship_place ");
                                while($rowkategori = pg_fetch_assoc($kategori))
                                {
                                echo"<option value=".$rowkategori['id'].">".$rowkategori['name']."</option>";
                                }
                                ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='carikategori()'><i class="fa fa-search"></i></button>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-filter"></i>
                          <span>Filter</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
                          <label style="color:white;">District</label>
                          <select class="form-control" id="kecamatan1" >
                                <?php
                                include("../connect.php"); 
                                $kecamatan=pg_query("select * from district ");
                                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                                {
                                echo"<option value=".$rowkecamatan['id'].">".$rowkecamatan['name']."</option>";
                                }
                                ?>
                                </select>
                
                                <label style="color:white;">Category</label>
                <select class="form-control" id="id_kategori1" >
      
                                <?php
                   include "../connect.php";
                  $result=  pg_query("select id as nilai, name as nama from category_worship_place order by nama ASC");
                  while($baris = pg_fetch_assoc($result))
                  {
                      echo "<option value=".$baris["nilai"].">".$baris["nama"]."</option>";
                  }
                pg_close();

                ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" onclick='tampilkatwilayah()'><i class="fa fa-search"></i></button>
                
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-car"></i>
                          <span>Transportation</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
                          <select class="form-control" style="width: 90%;" id="pilihkend" >  
                          <option value="bus">Bus</option>
                          <option value="cars">Cars</option>
                          <option value="motor">Motorcycle</option>
                          </select>
                          <br>
                          <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='pilihkendaraan()'><i class="fa fa-search"></i></button>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-bus"></i>
                          <span>Public Transportation</span>
                      </a>

                      <ul class="sub">
                      
                      
                          <div  class="panel-body" >
                          <a style="margin-top: -20px; color: white" ><span>Search by Majors</span></a>
                          <select class="form-control" style="width: 90%;" id="jurusan" >  
                          <?php
                                include("../connect.php"); 
                                $angkot=pg_query("select * from angkot ");
                                while($rowangkot = pg_fetch_assoc($angkot))
                                {
                                echo"<option value=".$rowangkot['id'].">".$rowangkot['destination']."</option>";
                                }
                                ?>
                          </select>
                          <br>
                          <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='tampiljurusan()'><i class="fa fa-search"></i></button>
                          </div>
						  <div class="panel-body">
                            <a style="margin-top: -20px; color: white" ><span>Nearby</span></a>
							 <input  type="range" onclick="aktifkanRadiusAngkot();resultt()" id="inputradiusangkot" name="inputradiusangkot" data-highlight="true" min="0.5" max="15" value="0.5"> 
                          </div>
                      </ul>
                  </li>
                      </ul>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" onclick="fasilitas()">
                          <i class="fa fa-thumbs-up"></i>
                          <span>Facility</span>
                      </a>
                      <ul class="sub">
                      <div class="box-body" id="fasilitaslist">
                      
                         <div class="kategori"><h7 style="color :#f3fff4">Choose Facility</h7></div>
                            
                        </div>
                        <button type="submit" class="btn btn-default" id="carifasilitas"  value="fas" onclick='carifasilitas()'><i class="fa fa-search"></i></button>
                        
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a href="javascript:;" onclick="eventt()" >
                          <i class="fa fa-tasks"></i>
                          <span>Event</span>
						  </a>
						  <ul class="sub">
                          <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-calendar"></i>
                          <span>Date</span>
                      </a>
                      <ul class="sub">
                        <div  class="panel-body" >
                        <div class="form-group">
                         
                          <input type="text" class="form-control form-control-inline input-medium default-date-picker" size="16" name="caritgl" id="caritgl" value="">
                          <button type="submit" class="btn btn-default" value="caritgl" onclick="caritglkeg();resultt()"> <i class="fa fa-search"></i></button> 
                         
                        </div>

                                                 
                        
                        </div>
                      </ul>
                  </li>
				  </ul>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="list()" >
                          <i class="fa fa-file-image-o"></i>
                          <span>Mosque's Gallery</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a class="active" href=".././">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <!--<li class="sub-menu">
                      <a class="active" href=".././">
                          <i class="fa fa-download"></i>
                          <span>Download Android Apps</span>
                      </a>
                  </li>-->
<?php
 // skrip koneksi database
 	include('../connect.php');
 $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
 $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
 $waktu   = time(); //
 // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
 $s = pg_query("SELECT * FROM statistika2 WHERE ip='$ip' AND tanggal='$tanggal'");
 
 // Kalau belum ada, simpan data user tersebut ke database
 if(pg_num_rows($s) == 0){
     pg_query("INSERT INTO statistika2 (ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
 }
 // Jika sudah ada, update
 else{
     pg_query("UPDATE statistika2  SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");

 }
 $pengunjung       = pg_num_rows(pg_query("SELECT * FROM statistika2  WHERE tanggal='$tanggal' GROUP BY ip, hits, online, tanggal")); // Hitung jumlah pengunjung
 $totalpengunjung  = pg_result(pg_query("SELECT COUNT(hits) FROM statistika2 "), 0); // hitung total pengunjung
 $bataswaktu       = time() - 300;
 $pengunjungonline = pg_num_rows(pg_query("SELECT * FROM statistika2  WHERE online > '$bataswaktu'")); // hitung pengunjung online
 ?> 

 <li class="sub-menu">
                      <a href="javascript:;" onclick="list()" >    
                  </li> 
				</ul>
          </div>
      </aside>
      <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row mt">
              <div class="col-sm-8" id="hide2">
                  <section class="panel">
                      <header class="panel-heading">
                          <label style="color: black">Google Map with Location List :</label>
                          <a class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi Saya"   ><i class="fa fa-location-arrow" style="color:black;"></i></a>
                          <a class="btn btn-default" role="button" data-toggle="collapse" onclick="manualLocation()" title="Posisi Manual"><i class="fa fa-map-marker" style="color:black;"></i></a>
                    <!-- <a class="btn btn-default" role="button" data-toggle="collapse" href="#terdekat" title="Nearby" aria-controls="terdekat"><i class="fa fa-road" style="color:black;"></i></a> -->
                    <!-- <a class="btn btn-default" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="All Mosque" aria-controls="terdekat"><i class="fa fa-map-pin" style="color:black;"></i></a> -->
					<label id="tombol">
					<a class="btn btn-default" role="button" id="showlegenda" data-toggle="collapse" onclick="legenda()" title="Legend"   ><i class="fa fa-eye" style="color:black;"></i></a></label>
                    <label></label>         
                    <div class="collapse" id="terdekat">
                    <div class="well">
                    <label><b>Radius&nbsp</b></label><label style="color:black" id="km"><b>0</b></label>&nbsp<label><b>m</b></label><br>
                    <input  type="range" onclick="cek();aktifkanRadius();resultt()" id="inputradiusmes" name="inputradiusmes" data-highlight="true" min="1" max="20" value="1" >
                    </div>
          </div>
					

               </h3>
                      </header>
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:400px; z-index:60"></div>
                      </div>
                  </section>
              </div>
              <div class="col-sm-4" id="resultsekitar" style="display:none">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Result</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group" id="hasilcariresult" style="display:none;">
                        <table class="table table-bordered" id='hasilcarisekitar'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>

              <div class="col-sm-4" id="result">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Result</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group" id="hasilcari1" style="display:none;">
                        <table class="table table-bordered" id='hasilcari'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
				  
                        <div class="col-sm-4" style="display:none;" id="eventt">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Event</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group" id="hasilcarievent">
                        <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Event Name</th>
                        
                        </tr>
                        </thead>
                        <tbody>

                        <?php
            include ("../connect.php");
                        $sql = pg_query("SELECT * FROM event order by id asc");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id'];
                        $name = $data['name'];
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$name"; ?></td>
                        
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

                 <!-- <div class="col-sm-8" style="display:none;" id="infoo">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Information</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group">
                        <table class="table" id='info'>
                        <tbody  style='vertical-align:top;'>
                        </tbody> 
                        </table> 
						
                      </div> 
	
					  
                  </div>
                    </div>
                </section>
                 </div> -->
				 
				  <div class="col-sm-8" style="display:none;" id="infoev">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Information of Event</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group">
                        <table class="table" id='infoevent'>
                        <tbody  style='vertical-align:top;'>
                        </tbody> 
                        </table> 					
                      </div> 
                  </div>
                    </div>
                </section>
                 </div>

                 <div class="col-sm-8" style="display:none;" id="infoo1">
                    <section class="panel">
                      <div class="panel-body">
                        <a class="btn btn-compose">Route Public Transportation</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
                          <div class="form-group">
                            <table class="table table-bordered" id='infoak'>
                            </table>            
                          </div>       
                        </div>
                      </div>
                    </section>
                 </div>
				 
				 <div class="col-sm-4" style="display:none;" id="resultaround">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Attraction Around</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group" id="hasilcari2" style="display:none;">
                        <table class="table table-bordered" id='hasilcariaround'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>

                  <div class="col-sm-8" style="display:none;" id="att1">  
    <section class="panel">
                    <div class="panel-body" >
                        <a class="btn btn-compose">Attraction Around Mosque</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group">
                        <table class="table table-bordered" id='info1'>
                        </table>   
                      </div>                  
                  </div>
                    </div>
                    </section>
					</div>
					<div class="col-sm-4" style="display:none;" id="att2">
          <section class="panel">
					<div class="panel-body">
                        <a class="btn btn-compose">Route</a>
                    </div>
                    <div id="rute" class='box-body'></div>
                </section>
                 </div>
          </div>
    
    <div class="row mt" style="display:none;" id="showlist">  
    <?php 
    include '../connect.php';
    $sql = pg_query("SELECT * FROM worship_place");
     ?>
<?php
  $jml_kolom=3;
  $cnt = 1;
  while($data =  pg_fetch_assoc($sql)){
		if ($cnt >= $jml_kolom) 
		{
          echo "<div class='row mt mb'>";
		}
 
  ?>
  <div class="row-mt">
    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-6 desc">
		<div class="project-wrapper">
			<div class="project">
				<div class="photo-wrapper">
					<div class="photo">
						<a class="fancybox" href="../_foto/<?php echo $data['image']; ?>"><img class="img-responsive" src="../_foto/<?php echo $data['image']; ?>" alt=""></a>
					</div>
					<div class="overlay"></div>
					<p style="color: #f3fff4"><?php echo $data['name']; ?><br><?php echo $data['address']; ?></p>
				</div>
			</div>      
		</div>      
	</div>
  </div>      
      
  <?php
  if ($cnt >= $jml_kolom) 
		{
          
          $cnt = 0;
		  echo "</div>";
		}
		$cnt++;
  }
  ?>
 

        </div>

    </section>
         
      </section>
    <!--   <footer class="site-footer">
          <div class="text-center">
              1311521008 - Fitri Yuliani
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
  </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
	  <script type="text/javascript" src="assets/js/bootstrap-slider.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
	  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	  <script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	  <script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="assets/js/advanced-form-components.js"></script>  

    <!--common script for all pages-->
	// <script type="text/javascript">
 //        $(document).ready(function () {
 //        var unique_id = $.gritter.add({
 //            // (string | mandatory) the heading of the notification
 //            title: 'Visitor Statistics',
 //            // (string | mandatory) the text inside the notification
 //            text: ' <span>Today : <?php echo $pengunjung; ?> <br> Total : <?php echo $totalpengunjung; ?> <br> Online User : <?php echo $pengunjungonline; ?>	</span>',
 //            // (string | optional) the image to display on the left
 //            image: 'assets/img/1.ico',
 //            // (bool | optional) if you want it to fade out on its own or just sit there
 //            sticky: true,
 //            // (int | optional) the time you want it to be alive for before fading out
 //            time: '',
 //            // (string | optional) the class name you want to apply to that specific message
 //            class_name: 'my-sticky-class'
 //        });

 //        return false;
 //        });
	// </script>
    
	  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  <script type="text/javascript">
$('#inputradius').slider({
	formatter: function(value) {
		return value*100+' m';
		}
	});
$('[data-toggle="tooltip"]').tooltip();
</script>
  </body>
</html>
