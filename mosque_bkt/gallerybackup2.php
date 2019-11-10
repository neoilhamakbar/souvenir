<?php 
session_start();
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
    <script src="script.js"></script>
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

  <body onload="init();detailmasjid('<?php echo $_GET["idgallery"] ?>');">

   <section id="container" >
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
          </div>

          <!-- logo start -->
          <a class="logo"><p><img src="assets/ico/111.png"><b>W</b>EB<b style="font-size: 17px">GIS</b></p></a>
          <a href="admin/login.php" class="logo1" title="Login" style="margin-top: -4px"><img src="assets/ico/112.png"></a>
 
        </header>
        
        <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start -->
            <ul class="sidebar-menu" id="nav-accordion">
              
              <p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p>
				  
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
          <div class="row">
          <div class="col-lg-12 main-chart"> 
           <div class="col-sm-12">
              <div class="col-sm-6"> <!-- information -->
                  <section class="panel">

                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b> Detail Informasi</b></h2>
                    </header>

                    <div class="panel-body">
                      <table id="detgal" class="table">
                        <tbody  style='vertical-align:top;'>
                          
                        </tbody>          
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

                    <header class="panel-heading" style='float:left'>
                    <label style="color: black">Google Map with Location List :</label>
                <button type="button" onclick="aktifkanGeolocation()" class="btn btn-default" data-toggle="collapse" title="Posisi Saya" style="margin-right: 7px;" ><i class="fa fa-location-arrow" > </i></button>

                <button type="button" onclick="manualLocation()" class="btn btn-default" data-toggle="collapse" title="Posisi Manual" style="margin-right: 7px;"><i class="fa fa-map-marker" ></i></button>

                 <!-- <label id="tombol">
                       <a type="button" onclick="legenda()" id="showlegenda" class="btn btn-default" data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye"></i>
                       </a>
                       </label> -->
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
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="_map.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    <script src="assets/js/advanced-form-components.js"></script>      
    <script>

    var slideIndex = 1;
    var server = 'http://localhost/html1/kuliner_bkt/'
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

    window.onload=init;
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
    var server = "http://localhost/html1/mosque_bkt/";
    //var server = "http://gisfaisal.in/tourism_bkt/t2-eng/";

    function init()
    {
      basemap();
      tempatibadah();
      kecamatanTampil();
    }


    function detailmasjid(id1){  //menampilkan informasi masjid
    
    $('#info').empty();
     hapusInfo();
        clearroute2();
      clearroute();
        hapusMarkerTerdekat();
     clearangkot();
         $.ajax({ 
        url: server+'detailmasjid.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
          { 
       console.log("hiaiii");
            console.log(id1);
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
                console.log(latitude);
                console.log(longitude);
                markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(18); 
              $('#info').append("<tr><td><b>Name</b></td><td>:</td><td> "+nama+"</td></tr><tr><td><b>Address </b></td><td>:</td><td> "+alamat+"</td></tr><tr><td><b>Capacity</b></td><td>:</td><td>"+kapasitas+" Jamaah</td></tr><tr><td><b>Land Size</b></td><td>:</td><td> "+luas_tanah+" m<sup>2</sup></td></tr><tr><td><b>Building Size</b></td><td>:</td><td> "+luas_bangunan+" m<sup>2</sup></td></tr><tr><td><b>Park Area Size</b></td><td>:</td><td> "+luas_area_parkir+" m<sup>2</sup></td></tr><tr><td><b>Establish</b></td><td>:</td><td> "+thn_berdiri+"</td></tr><tr><td><b>Last Renovation</b></td><td>:</td><td> "+thn_renovasi_terakhir+"</td></tr><tr><td><b>Imam</b></td><td>:</td><td> "+jml_imam+"</td></tr><tr><td><b>Jamaah</b></td><td>:</td><td> "+jml_jamaah+"</td></tr><tr><td><b>Teenager</b></td><td>:</td><td> "+jml_remaja+"</td></tr><tr><td><b>Category</b></td><td>:</td><td> "+nama_kat+"</td></tr><tr><td><a class='btn btn-default' role=button' data-toggle='collapse' href='#terdekat1' onclick='tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+nama+"\")' title='Nearby' aria-controls='Nearby'><i class='fa fa-compass' style='color:black;''></i><label>&nbsp Attraction Nearby</label></a><div class='collapse' id='terdekat1'><div class='well' style='width: 150%'><div class='checkbox'><label><input id='check_t' type='checkbox'>Tourism</label></div><div class='checkbox'><label><input id='check_i' type='checkbox'>Small Industry</label></div><div class='checkbox'><label><input id='check_oo' type='checkbox' value=''>Souvenir</label></div><div class='checkbox'><label><input id='check_k' type='checkbox' value=''>Culinary</label></div><div class='checkbox'><label><input id='check_h' type='checkbox' value='5'>Hotel</label></div><div class='checkbox'><label><input id='check_r' type='checkbox' value=''>Restaurant</label></div><label><b>Radius&nbsp</b></label><label style='color:black' id='km1'><b>0</b></label>&nbsp<label><b>m</b></label><br><input  type='range' onchange='cek1();aktifkanRadiusSekitar();resultt1();info1();' id='inputradius1' name='inputradius1' data-highlight='true' min='1' max='15' value='1' ></div></div></td></tr>")
         infowindow = new google.maps.InfoWindow({
              position: centerBaru,
              content: "<span style=color:black><center><b>Information</b><br><img src='"+fotosrc+image+"' alt='image in infowindow' width='150'></center><br><i class='fa fa-home'></i> "+nama+"<br><i class='fa fa-map-marker'></i> "+alamat+"<br><br><input type='button' class='btn btn-success' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp&nbsp<input type='button' class='btn btn-success' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
              pixelOffset: new google.maps.Size(0, -33)
              });
            infoDua.push(infowindow); 
            hapusInfo();
            infowindow.open(map);
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


  function basemap() //google maps
  {
      
      map = new google.maps.Map(document.getElementById('map'), 
          {
            zoom: 13,
            center: new google.maps.LatLng(-0.304820, 100.381421),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
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


  function tampilsemua(){ //menampilkan semua masjid

  $.ajax({ url: server+'carimasjid.php', data: "", dataType: 'json', success: function (rows){
    cari_masjid(rows);
  }});
}







      

      <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row mt">
              <div class="col-sm-7" id="result">
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Gallery</a>
                        <div class="content" style="text-align:center;">
                        <div class="html5gallery" style="max-height:600px;overflow:auto;" data-skin="horizontal" data-width="500" data-height="300" data-resizemode="fit">  
                        <?php
require '../connect.php';

$id = $_GET["idgallery"];

  $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
$hasil=pg_query($querysearch);
while($baris = pg_fetch_assoc($hasil))
                  {
                    if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']==''))
                    {
                        echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                    }
                    else
                    {
                            echo "<a href='foto/".$baris['gallery_worship_place']."'><img src='foto/".$baris['gallery_worship_place']."'></a>";
                    }
                  }

                    ?>
                                  
                        </div>
                        </div>
                    </div>
                </section>
                 </div>
                      
                </div>
    </section>
         
      </section>
      <footer class="site-footer">
          <div class="text-center">
              1311521008 - Fitri Yuliani
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
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
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <script src="assets/js/advanced-form-components.js"></script>      
	  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  </body>
</html>
