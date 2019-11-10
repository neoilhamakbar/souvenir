<?php 
session_start();
include '../connect.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Mesjid Finder</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">


  <!--  Slide -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
    </style>

    <script src="assets/js/chart-master/Chart.js"></script>

    <script src="../config_public.js"></script>
    <!--<script src="_map.js"></script>-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"> </script>

    <!--LOADER-->
    <style>
    #loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 40px;
      margin: 5px;
      height: 40px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
  
  </head>
  
  <body onload="init();">

   <section id="container" >
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
             
      <!--logo start-->
      <a class="logo"><p><img src="assets/ico/111.png"><b>W</b>EB<b style="font-size: 17px">GIS</b></p></a>
      <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><div id="loader" style="display:none"></div></li>
            <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
          </ul>
        </div>
        <h4>
       

        <!-- <a href="admin/login.php" class="logo1" title="Login" style="margin-top: -4px"><img src="assets/ico/112.png"></a> -->
        

      </header>

      
 

      <aside>
          
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
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
          
              <li class="sub-menu">
                      <a href="index.php">
                          <i class="fa fa-arrow-left"></i>
                          <span>Back To Home</span>
                      </a>
                  </li> 

        </ul>
          </div>
      </aside>

      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row mt">
          <div class="col-lg-12 main-chart">
          <div class="col-sm-12">
            <div class="col-sm-6"> <!-- information -->
              <section class="panel">
                
              <header class="panel-heading">
                <h2 class="box-title" style="text-transform:capitalize;"><b> Detail Informasi</b></h2>
              </header>

              <div class="panel-body">
              <?php 
              $id = $_GET['idgallery'];
              $sql_mesjid = "SELECT * from worship_place where id='$id'";
              $query_mesjid = pg_query($sql_mesjid);
              $data_mesjid = pg_fetch_array($query_mesjid);
              ?>
                <table id="detgal" class="table">
                  <tbody  style='vertical-align:top;'>
                      <tbody style="vertical-align:top;">    
                        <tr><td>Name</td><td>:</td><td> <?php echo $data_mesjid['name'];?> </td></tr>
                        <tr><td>Address</td><td>:</td><td> <?php echo $data_mesjid['address'];?> </td></tr>
                        <tr><td>Capacity</td><td>:</td><td> <?php echo $data_mesjid['capacity'];?> </td></tr>
                        <tr><td>Land Size</td><td>:</td><td> <?php echo $data_mesjid['land_size'];?> </td></tr>
                        <tr><td>Building Size</td><td>:</td><td> <?php echo $data_mesjid['building_size'];?> </td></tr>
                        <tr><td>Park Area Size</td><td>:</td><td> <?php echo $data_mesjid['park_area_size'];?> </td></tr>
                        <tr><td>Establish</td><td>:</td><td> <?php echo $data_mesjid['est'];?> </td></tr>
                        <tr><td>Last Renovation</td><td>:</td><td> <?php echo $data_mesjid['last_renovation'];?> </td></tr>
                        <tr><td>Imam</td><td>:</td><td> <?php echo $data_mesjid['imam'];?> </td></tr>
                        <tr><td>Jamaah</td><td>:</td><td> <?php echo $data_mesjid['jamaah'];?> </td></tr>
                        <tr><td>Teenager</td><td>:</td><td> <?php echo $data_mesjid['teenager'];?> </td></tr>
                        <!-- <tr><td>Category</td><td>:</td><td> </td></tr> -->
                        <!-- <tr><td><b> Facility </b></td><td></td> -->
                        <tr>
                            <td>Facility</td>
                            <td>:</td>
                            <td>
              <?php 
              $sql_fasilitas_mesjid = "SELECT facility.* from detail_facility join facility on facility.id = detail_facility.id_facility where detail_facility.id_worship_place = '$id'";
              $query_fasilitas_mesjid = pg_query($sql_fasilitas_mesjid);
              while($row = pg_fetch_array($query_fasilitas_mesjid)){
                 $nama_fasilitas = $row['name'];
                 echo "$nama_fasilitas<br>";
              }

              ?>   
                            </td>
                          </tr>

                      </tbody>
                  </tbody>          
                </table>

                      
              </div>
            </section>

                    <section class="panel">

                      <header class="panel-heading">
                        <h2 class="box-title" style="text-transform:capitalize;"><b> Info</b></h2>
                      </header>

                    <?php 
                     require '../connect.php';
                      $id = $_GET["idgallery"];
                     // echo "ini $id";

                      if(strpos($id,"RM") !== false){
                        $sqlreview = "SELECT * from information_admin where id_kuliner = '$id'";
                      }elseif (strpos($id,"SO") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_souvenir = '$id'";
                      }elseif (strpos($id, "IK") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_ik = '$id'";
                      }elseif (strpos($id,"H") !== false) {
                         $sqlreview = "SELECT * from information_admin where id_hotel = '$id'";
                      }elseif (strpos($id,"tw")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_ow = '$id'";
                      }elseif (strpos($id,"M")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_worship = '$id'";
                      }
                        
                      $result = pg_query($sqlreview);
                    ?>
                    <table class="table">
                      <thead><th>Tanggal</th><th class="centered">Info</th></thead>
                    <?php  
                      while ($rows = pg_fetch_array($result)) 
                        {
                          $tgl = $rows['tanggal'];
                          $info = $rows['informasi'];
                          $id_info =$rows['id_informasi'];
                          echo "<tr><td>$tgl</td><td>$info</td><td></td></tr>";
                        }
                    

                       ?>               
                    
                  </table>

                    <div class="panel-body">
                      <!-- <table id="detgal" class="table">
                        <tbody  style='vertical-align:top;'>

                        <tr><td>Name :</td><td><textarea cols="30" rows="1"></textarea></td></tr>
                        <tr><td>Comment :</td><td><textarea cols="30" rows="5"></textarea></td></tr>
                        <tr><td><input type="submit" value="Post Comment"/></td><td></td></tr>
                          
                        </tbody>          
                      </table> -->

                      
                    </div>
                  </section>

                  <section class="panel">

                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b> Visitor's Reviews</b></h2>
                    </header>

                    <div class="panel-body">

                      <table id="detgal" class="table">

                      <form method="POST" action="insert_comment.php">
                          <tbody  style='vertical-align:top;'>
                          <input type="hidden" name="id" value="<?php echo $_GET['idgallery']; ?>">
                          <?php 
                          if ($_SESSION['C'] == true) 
                          {
                            $username = $_SESSION['username'];
                            echo "<tr><td>Comment :</td><td><textarea cols='30' rows='5' name='comment'></textarea></td></tr>
                          <tr><td><input type='submit' value='Post Comment'/></td><td><input name='nama' value='$username' hidden></td>
                          </tr>";
                          }
                          ?>
                            
                          </tbody>          
                      </table>
                      </form>

                      <?php 

                      require '../connect.php';
                      $id = $_GET['idgallery']; 

                      if (strpos($id,"RM") !== false) {
                        $sqlreview = "SELECT * FROM review where id_kuliner = '$id'";
                      } elseif (strpos($id,"SO") !== false) {
                        $sqlreview = "SELECT * FROM review where id_souvenir = '$id'";
                      } elseif (strpos($id,"IK") !== false) {
                        $sqlreview = "SELECT * FROM review where id_ik = '$id'";
                      } elseif (strpos($id,"H") !== false) {
                        $sqlreview = "SELECT * FROM review where id_hotel = '$id'";
                      } elseif (strpos($id,"OW") !== false) {
                        $sqlreview = "SELECT * FROM review where id_ow = '$id'";
                      } elseif (strpos($id,"M") !== false) {
                        $sqlreview = "SELECT * FROM review where id_worship = '$id'";
                      }


                      $result = pg_query($sqlreview);
                      ?>

                      <table class="table"> 
                      <?php 
                      while ($rows = pg_fetch_array($result))
                      {
                        $nama = $rows ['name'];
                        $komen = $rows['comment'];
                        echo "<tr><td>Name</td><td>:</td><td>$nama</td></tr><tr><td>Comment</td><td>:</td><td>$komen</td></tr>";
                      }

                      
                       ?>
                      </table>
                        




                      
                    </div>
                  </section>   
            </div>

            <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-12"> <!-- gallery -->
                    <section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-compose">Gallery</a>
                            <div class="content" style="text-align:center;">
                            <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="horizontal" data-width="350" data-height="250" data-resizemode="fit">  

                      <?php
                      require '../connect.php';

                      $id = $_GET["idgallery"];
                      if (strpos($id,"H") !== false) {  //Hotel

                              $querysearch  ="SELECT a.id, b.gallery_hotel FROM hotel as a left join hotel_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_hotel']=='-')||($baris['gallery_hotel']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_hotel']."'><img style='width:100%' src='../_foto/".$baris['gallery_hotel']."'></a>";
                                }
                              }
                    
                            } elseif (strpos($id,"tw") !== false) {  //Tourism

                              $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_tourism']."'><img style='width:100%' src='../_foto/".$baris['gallery_tourism']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"SO") !== false) {  //Souvenir

                              $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img style='width:100%' src='../_foto/".$baris['gallery_souvenir']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"RM") !== false) {  //Kuliner

                              $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_culinary']."'><img style='width:100%' src='../_foto/".$baris['gallery_culinary']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"M") !== false) {  //Worship

                              $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img style='width:100%' src='../_foto/".$baris['gallery_worship_place']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"IK") !== false) {  //Industry

                              $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_industry']=='-')||($baris['gallery_industry']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_industry']."'><img style='width:100%' src='../_foto/".$baris['gallery_industry']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"R") !== false) {  //Restoran

                              $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img style='width:100%' src='../_foto/".$baris['gallery_restaurant']."'></a>";
                                }
                              }

                            } else {  //Angkot

                              $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' ";  
                              //echo "$querysearch";     
                              echo "<script language='javascript'>alert('$querysearch');</script>";   
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_angkot']."'><img style='width:100%' src='../_foto/".$baris['gallery_angkot']."'></a>";
                                }
                              }

                            }
                        ?>
                                  
                            </div>
                            </div>
                        </div>
                    </section>

                </div>
                <div class="col-sm-12"> <!-- peta -->
                  <div class="white-panel pns">

                    <header class="panel-heading" style="float:left">
                    <label style="color: black; margin-right">Google Map with Location List :</label>
                <a class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi Saya"   ><i class="fa fa-location-arrow" style="color:black;"></i></a>
                
                <a class="btn btn-default" role="button" data-toggle="collapse" onclick="manualLocation()" title="Posisi Manual"><i class="fa fa-map-marker" style="color:black;"></i></a>
                    <!-- <a class="btn btn-default" role="button" data-toggle="collapse" href="#terdekat" title="Nearby" aria-controls="terdekat"><i class="fa fa-road" style="color:black;"></i></a> -->
                    <!-- <a class="btn btn-default" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="All Mosque" aria-controls="terdekat"><i class="fa fa-map-pin" style="color:black;"></i></a> -->

                    <!-- <label id="tombol">
                    <a class="btn btn-default" role="button" id="showlegenda" data-toggle="collapse" onclick="legenda()" title="Legend"   ><i class="fa fa-eye" style="color:black;"></i></a></label> -->
                    
                      
                      </header>
                      <div class="row">
                                 <div class="col-sm-6 col-xs-6"></div>
                               </div>                        
                               <div id="map" class="centered" style="height:260px">
                               </div>
                            </div>
                    
                    
                  </div>
                  
                </div>
                
              </div>
          
            </div>
          </div>
        </div>

        </section>
      
      </section>

   
  </section>


  <!-- js placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="assets/js/jquery.sparkline.js"></script>
  <!--<script src="_map.js" type="text/javascript"></script>-->
  <script src="assets/js/common-scripts.js"></script> 

  <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <!--<script src="assets/js/advanced-form-components.js"></script>-->      
  <script>

var slideIndex = 1;
var server = 'http://localhost/html1/mosque_bkt/'
//showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

<script>


var infoDua = [];
var markers = [];
var markersDua = [];
var markersDua1 = [];
var circles=[];
var angkot = [];
var jalurAngkot=[];
var rute = [];  //NAVIGASI
var pos ='null';
var infowindow;
var centerBaru;
var centerLokasi;
var inputradiusmes;
var fotosrc = '../_foto/';
var directionsDisplay;
var marker_1 = []; //MARKER UNTUK POSISI SAAT INIvar marker_2 = []; //MARKER UNTUK POSISI SAAT INI
var marker_2 = [];
var awal = 0;
var tujuan = 0;

// membuat fungsi saat onload
function init(){
    basemap();
    tempatibadah();
    kecamatanTampil();
  detailmasjid('<?php echo $_GET["idgallery"] ?>')
}

function basemap() //google maps
{
    
    map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 13,
          center: new google.maps.LatLng(-0.304820, 100.381421),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
//      styles:[
//   {
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#8ec3b9"
//       }
//     ]
//   },
//   {
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1a3646"
//       }
//     ]
//   },
//   {
//     "featureType": "administrative.country",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#4b6878"
//       }
//     ]
//   },
//   {
//     "featureType": "administrative.land_parcel",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#64779e"
//       }
//     ]
//   },
//   {
//     "featureType": "administrative.province",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#4b6878"
//       }
//     ]
//   },
//   {
//     "featureType": "landscape.man_made",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#334e87"
//       }
//     ]
//   },
//   {
//     "featureType": "landscape.natural",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#023e58"
//       }
//     ]
//   },
//   {
//     "featureType": "poi",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#283d6a"
//       }
//     ]
//   },
//   {
//     "featureType": "poi",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#6f9ba5"
//       }
//     ]
//   },
//   {
//     "featureType": "poi",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "featureType": "poi.park",
//     "elementType": "geometry.fill",
//     "stylers": [
//       {
//         "color": "#023e58"
//       }
//     ]
//   },
//   {
//     "featureType": "poi.park",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#3C7680"
//       }
//     ]
//   },
//   {
//     "featureType": "road",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#304a7d"
//       }
//     ]
//   },
//   {
//     "featureType": "road",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#98a5be"
//       }
//     ]
//   },
//   {
//     "featureType": "road",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#2c6675"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "geometry.stroke",
//     "stylers": [
//       {
//         "color": "#255763"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#b0d5ce"
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#023e58"
//       }
//     ]
//   },
//   {
//     "featureType": "transit",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#98a5be"
//       }
//     ]
//   },
//   {
//     "featureType": "transit",
//     "elementType": "labels.text.stroke",
//     "stylers": [
//       {
//         "color": "#1d2c4d"
//       }
//     ]
//   },
//   {
//     "featureType": "transit.line",
//     "elementType": "geometry.fill",
//     "stylers": [
//       {
//         "color": "#283d6a"
//       }
//     ]
//   },
//   {
//     "featureType": "transit.station",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#3a4762"
//       }
//     ]
//   },
//   {
//     "featureType": "water",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#0e1626"
//       }
//     ]
//   },
//   {
//     "featureType": "water",
//     "elementType": "labels.text.fill",
//     "stylers": [
//       {
//         "color": "#4e6d70"
//       }
//     ]
//   }
// ]
        });
}

function tempatibadah() //tampil digitasi tempat ibadah
    {
            ti = new google.maps.Data();
            ti.loadGeoJson(server+'masjid.php');
            ti.setStyle(function(feature){
            return({
                    fillColor: '#2a9dd6',
                    strokeColor: '#2a9dd6',
                    strokeWeight: 1,
                    fillOpacity: 7
                   });          
              });
            ti.setMap(map);
        }

function kecamatanTampil()
  {
    kecamatan = new google.maps.Data();
    kecamatan.loadGeoJson(server+'kecamatan.php');
    kecamatan.setStyle(function(feature)
    {
      var gid = feature.getProperty('id');
      if (gid == 'K001'){ color = '#ff3300' 
        return({
      fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        }); 
    }
      else if(gid == 'K002'){ color = '#ffd777' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        });
    }
      else if(gid == 'K003'){ color = '#ec87ec' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpacity:0.3,
          clickable: false
        });

    }
      
       
        
    });
    kecamatan.setMap(map);
  }

  function detailmasjid(id1){  //menampilkan informasi masjid
  $('#info').empty();
   hapusInfo();
      clearroute2();
    clearroute();
      hapusMarkerTerdekat();
   // clearangkot();
       $.ajax({ 
      url: server+'detailmasjid.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
     console.log("hiaiii");
          for (var i in rows.data) 
          { 

            console.log('dd');
            var row = rows.data[i];
            var id = row.id;
            var nama = row.name_mesjid;
            var alamat=row.address;
            var luas_tanah=row.land_size;
            var luas_bangunan=row.building_size;
            var luas_area_parkir=row.park_area_size;
            var kapasitas=row.capacity;
            var thn_berdiri=row.est;
            var thn_renovasi_terakhir=row.last_renovation;
            var jml_imam=row.imam;
            var jml_jamaah=row.jamaah;
            var jml_remaja=row.teenager;
            var nama_kat=row.name_category;
            var image = row.image;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;

            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/ico/marker_masjid.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });

          infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home' style='color:black'></i>Nama</td><td>:</td><td> "+nama+"</td></tr>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
              
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+nama+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+alamat+"</td></tr><tr><td><b>Capacity</b></td><td>:</td><td>"+kapasitas+" Jamaah</td></tr><tr><td><b>Land Size</b></td><td>:</td><td> "+luas_tanah+" m<sup>2</sup></td></tr><tr><td><b>Building Size</b></td><td>:</td><td> "+luas_bangunan+" m<sup>2</sup></td></tr><tr><td><b>Park Area Size</b></td><td>:</td><td> "+luas_area_parkir+" m<sup>2</sup></td></tr><tr><td><b>Establish</b></td><td>:</td><td> "+thn_berdiri+"</td></tr><tr><td><b>Last Renovation</b></td><td>:</td><td> "+thn_renovasi_terakhir+"</td></tr><tr><td><b>Imam</b></td><td>:</td><td> "+jml_imam+"</td></tr><tr><td><b>Jamaah</b></td><td>:</td><td> "+jml_jamaah+"</td></tr><tr><td><b>Teenager</b></td><td>:</td><td> "+jml_remaja+"</td></tr><tr><td><b>Category</b></td><td>:</td><td> "+nama_kat+"</td></tr><tr><td><a class='btn btn-default' role=button' data-toggle='collapse' href='#terdekat1' onclick='tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+nama+"\")' title='Nearby' aria-controls='Nearby'><i class='fa fa-compass' style='color:black;''></i><label>&nbsp Attraction Nearby</label></a><div class='collapse' id='terdekat1'><div class='well' style='width: 150%'><div class='checkbox'><label><input id='check_t' type='checkbox'>Tourism</label></div><div class='checkbox'><label><input id='check_i' type='checkbox'>Small Industry</label></div><div class='checkbox'><label><input id='check_oo' type='checkbox' value=''>Souvenir</label></div><div class='checkbox'><label><input id='check_k' type='checkbox' value=''>Culinary</label></div><div class='checkbox'><label><input id='check_h' type='checkbox' value='5'>Hotel</label></div><div class='checkbox'><label><input id='check_r' type='checkbox' value=''>Restaurant</label></div><label><b>Radius&nbsp</b></label><label style='color:black' id='km1'><b>0</b></label>&nbsp<label><b>m</b></label><br><input  type='range' onchange='cek1();aktifkanRadiusSekitar();resultt1();info1();' id='inputradius1' name='inputradius1' data-highlight='true' min='1' max='15' value='1' ></div></div></td></tr>")
      //FASILITAS MASJID
          var isi="<br><b style='margin-left:20px'>Facility</b> <br><ol>";
          for (var i in rows.fasilitas){ 
            var row = rows.fasilitas[i];
            var id_fas = row.id_fas;
            var name = row.name;
            console.log(name);
            isi = isi+"<li>"+name+"</li>";
          }//end for
          isi = isi + "</ol>";
          $('#info').append(isi);
      
      //KEGIATAN MASJID
          var isi="<b style='margin-left:20px'>Event</b> <br><ol>";
          for (var i in rows.keg){ 
            var row = rows.keg[i];
            var event_name = row.event_name;
            var date = row.date;
            var time = row.time;
            console.log(event_name);
            isi = isi+"<li><b>Event Name</b><b>:</b> &nbsp "+event_name+"<br><b>Date</b><b>:</b> &nbsp"+date+"<br><b>Time</b><b>:</b> &nbsp"+time+"</li>";
          }//end for
          isi = isi + "</ol>";
          $('#info').append(isi);
      
           
            
          }  
           

        }
      }); 
}

function tempatibadah() //tampil digitasi tempat ibadah
    {
            ti = new google.maps.Data();
            ti.loadGeoJson(server+'masjid.php');
            ti.setStyle(function(feature){
            return({
                    fillColor: '#2a9dd6',
                    strokeColor: '#2a9dd6',
                    strokeWeight: 1,
                    fillOpacity: 7
                   });          
              });
            ti.setMap(map);
        }

function tampilsemua(){ //menampilkan semua masjid

  $.ajax({ url: server+'carimasjid.php', data: "", dataType: 'json', success: function (rows){
    cari_masjid(rows);
  }});
}

function addMarker(location){
    hapusposisi();
    marker = new google.maps.Marker({
      position : location,
      map: map,
      animation: google.maps.Animation.DROP,
      });
    pos = {
      lat: location.lat(), lng: location.lng()
    }
    centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
    markers.push(marker);
    infowindow = new google.maps.InfoWindow();
    infowindow.setContent('Current Position');
    infowindow.open(map, marker);
    usegeolocation=true;
    google.maps.event.clearListeners(map, 'click');
  console.log(pos);

}

function cekRadius(){
          rad = inputradius.value*100;
          console.log(rad);
          }
      
function cekRadiusangkot(){
          rad = inputradiusangkot.value*100;
          console.log(rad);
          }
      
function cekRadius1(){
          rad = inputradius1.value*100;
          console.log(rad);
          }

function clearroute2(){      
    if(typeof(directionsDisplay) != "undefined" && directionsDisplay.getMap() != undefined){
    directionsDisplay.setMap(null);
    $("#detailrute").remove();
    }     

}

function hapusMarkerTerdekat() {
          for (var i = 0; i < markersDua.length; i++) {
                markersDua[i].setMap(null);
            }
        }

function hapusMarkerTerdekat1() {
          for (var i = 0; i < markersDua1.length; i++) {
                markersDua1[i].setMap(null);
            }
        }

function hapusMarkerInfowindow(){
         setMapOnAll(null);
         hapusMarkerTerdekat();
         pos = 'null';
    }
function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
        }
    }
function hapusInfo() {
        for (var i = 0; i < infoDua.length; i++) {
              infoDua[i].setMap(null);
              }
      }

function hapusRadius(){
  for(var i=0;i<circles.length;i++)
               {
                   circles[i].setMap(null);
               }
    circles=[];
  cekRadiusStatus = 'off';
  }
  

  function hapusposisi(){
  for (var i = 0; i < markers.length; i++){
    markers[i].setMap(null);
  }
  markers = [];
}

 function clearroute(){
          for (i in rute){
            rute[i].setMap(null);
          } 
          rute=[]; 
        }
        window.onload=init;





</script>
                    










                      
                </div>
    </section>
         
      </section>
     <!--  <footer class="site-footer">
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
  <script type="text/javascript" src="html5gallery/html5gallery.js"></script>

    <script src="assets/js/jquery.sparkline.js"></script>
    <!--<script src="script.js" type="text/javascript"></script>-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <!--<script src="assets/js/advanced-form-components.js"></script>-->      
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  </body>
</html>
