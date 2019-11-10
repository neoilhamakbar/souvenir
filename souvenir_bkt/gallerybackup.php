<!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Bukittinggi's Souvenir</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

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
    <script src="_map.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"> </script>

  
</head>

<body onload="init();">

  <section id="container" >
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>

      <!--logo start-->
      <a class="logo"><p><img src="image/kul.png">&nbsp<b>WEB</b><b style="font-size: 17px">GIS</b> - <b>S</b>ouvenir</p></a>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><div id="loader" style="display:none"></div></li>
            <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
          </ul>
        </div>
        <h4>
        
        <div class="top-menu">
          <ul class="nav pull-right" style="margin-top: 6px">
            <a href="admin/" class="logo1" title="Login" ><img src="image/login.png">
        <!-- <i class="fa fa-user"></i> -->
        <span>Login</span></a>
              </ul>
            </div></h4>
      </header>

      <aside>

          <div id="sidebar"  class="nav-collapse " >
              <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              
              <p class="centered"><a href="#"><img src="assets/img/jam.jpg" class="img-circle" width="150" height="120"></a></p>
              <h5 class="centered">Hi, Visitor!!</h5>

              <li class="sub-menu">
                      <a class="active" href="index.php">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Back</span>
                      </a>
                  </li>

            <br>
              
                  <!--p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p-->

        </ul>
          </div>
      </aside>

      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row mt">
            <div class="col-sm-6">
              <div class="white-panel pns">
                <header class="panel-heading">
                <label style="color: black">Google Map With Location List :</label>
                   <button type="button" onclick="posisisekarang()" class="btn btn-default " data-toggle="tooltip" id="posisinow" title="Posisi Saya" 
                    style="margin: 15px" style="margin-right: 7px;" ><i class="fa fa-location-arrow" > </i>
                      </button>

                       <button type="button" onclick="lokasimanual()" class="btn btn-default"  data-toggle="tooltip" id="posmanual" title="Posisi Manual" 
                              style="margin-right: 7px;"><i class="fa fa-map-marker" ></i>
                      </button>
                                            
                       <label id="tombol">
                       <a type="button" onclick="legenda()" id="showlegenda" class="btn btn-default" data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye"></i>
                       </a>
                       </label>
                  </header>
                          <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>                        
                           <div id="map" class="centered" style="height:460px">
                           </div>
                        </div>
            </div>


              <div class="col-sm-6" id="result">

                <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Gallery</a>
                        <div class="content" style="text-align:center;">
                        <div class="html5gallery" style="max-height:700px;overflow:auto;" data-skin="horizontal" data-width="500" data-height="400" data-resizemode="fit">  
                                  
                        </div>
                        </div>
                    </div>
                </section>
              </div>
                      
          </div>
        </section>
         
      </section>

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
    <script src="_map.js" type="text/javascript"></script>
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
  <script>
var slideIndex = 1;
var server = 'http://localhost/html1/souvenir_bkt/'
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
    //Membuat Fungsi Saat Onload
    function init()
    {
      basemap();
      viewdigitcul();
      viewdigitkec();
    }


    //Mmebuat fungsi menampilkan Peta Google Map
    function basemap() 
    {
      map = new google.maps.Map(document.getElementById('map'), 
      {
        zoom: 13,
        center: new google.maps.LatLng(-0.2986721,100.3764663),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
    }


    //Membuat fungsi menampilkan digitasi souvenir
    function viewdigitcul()
    {
      cull = new google.maps.Data();
      cull.loadGeoJson(server+'souvenir.php');
      cull.setStyle(function(feature)
      {
        return({
                fillColor: '#f75d5d',
                strokeColor: '#f75d5d ',
                strokeWeight: 2,
                fillOpacity: 0.5
              });          
      }
      );
      cull.setMap(map);
    }


    //Membuat Fungsi Menampilkan Digitasi Kecamatan (Batas Kecamatan Bukittinggi)
    function viewdigitkec()
    {
      ab = new google.maps.Data();
      ab.loadGeoJson(server+'subdistrict_boundary.php');
      ab.setStyle(function(feature)
      {
         var gid = feature.getProperty('id');
         console.log("gid="+gid);
         color = '#ff3300';
         console.log(color); 
          if (gid == 'K001'){ color = '#ff3300'; 
            console.log(color); 
            return({
              fillColor:color,
              strokeWeight:2.0,
              strokeColor:'black',
              fillOpacity:0.2,
              clickable: false
            }); 
        }
          else if(gid == 'K002'){ color = '#ffd777'; 
            return({
            fillColor:color,
              strokeWeight:2.0,
              strokeColor:'black',
              fillOpacity:0.2,
              clickable: false
            });
        }
          else if(gid == 'K003'){ color = '#ec87ec'; 
            return({
            fillColor:color,
              strokeWeight:2.0,
              strokeColor:'black',
              fillOpacity:0.2,
              clickable: false
            });

        }
                  
      }
      );
      ab.setMap(map);
    }



    </script>
  </body>
</html>
