<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bukittinggi's Culinary</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
</head>

<body onload="init()">

<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
            <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
           <a class="logo"><p><img src="image/kul.png">&nbsp<b>WEB</b><b style="font-size: 17px">GIS</b> - <b>C</b>ulinary</p></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
              <ul class="nav top-menu">
                    <!-- settings start -->
                   
                    <!-- inbox dropdown end -->
              </ul>
                <!--  notification end -->
            </div>
            <h4>
            <div class="top-menu">
              <ul class="nav pull-right" style="margin-top: 6px">
                   <a href="admin/" class="logo1" title="Login" ><img src="image/login.png">
                   <!-- <i class="fa fa-user"></i> -->
                   <span>Login</span></a>
              </ul>
            </div></h4>

            <style type="text/css">
      #legend {
        background:white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
    font-color: blue;
        font-family: Arial, sans-serif;
    }
    .color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
    }

    legenda 
    .a {
        background: #f75d5d;
      }
    .b {
        background: #ff3300;
      }
    .c {
        background: #ffd777;
      }
    .d {
        background: #ec87ec;
      }
    .e {
        background: #e2e231 ;
      }
    .f {
        background: #000000 ;
      }
    .g {
        background: #ff07d5;
      }
    .h {
        background: #9ad7f9;
      }
    .i {
        background: #f92a2a;
      }
    .j {
        background: #6df73b;
      }
    .k {
        background: #1796c4;
      }
       .l {
        background: #f75d5d;
      }
   
   </style>

      </header>

     <header class="header black-bg">
            <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
           <a class="logo"><p><b>WEB</b><b style="font-size: 17px">GIS</b> - <b>C</b>ulinary</p></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
              <ul class="nav top-menu">
                    <!-- settings start -->
                   
                    <!-- inbox dropdown end -->
              </ul>
                <!--  notification end -->
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

<aside><

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
</ul>
</div>
</aside>
     <!--  <img src="img/blank.jpg"> -->

<section id="main-content">
        <section class="wrapper">
       <div class="box-header with-border">
        <h2 class="box-title" style="text-transform:capitalize;"><b><u> Gallery</u></b></h2>
      </div>
        </div>
          <div class="col-lg-12 ds">
          <div class="panel box-v3">
                <div class="panel-body">
                  <div class="col-md-12 padding-0 text-center">

        <div class="content" style="text-align:center;">
          <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="horizontal" data-width="600" data-height="450" data-resizemode="fill" >

                      <?php
            require '../connect.php';

            $id = $_GET["idgallery"];

              $querysearch  ="   SELECT a.id, b.gallery_culinary as foto
                                 FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";
      echo "zzz";
                $hasil=pg_query($querysearch);
                while($baris = pg_fetch_assoc($hasil))
                                  {
                                    if(($baris['foto']=='-')||($baris['foto']==''))
                                    {
                                        echo "<a href='img/noimage.jpg'><img src='img/noimage.jpg' ></a>";
                                    }
                                    else
                                    {
                                            echo "<a href='img/".$baris['foto']."'><img src='img/".$baris['foto']."' ></a>";
                                    }
                                   
                                  }

                                    ?>
                   
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    </section>

    <script src="assets/js/bootstrap.min.js"></script>
 
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
        center: new google.maps.LatLng(-0.297030581246098, 100.388439689506),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
    }


    //Membuat fungsi menampilkan digitasi kuliner
    function viewdigitcul()
    {
      cull = new google.maps.Data();
      cull.loadGeoJson(server+'culinary.php');
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

</body></html>

