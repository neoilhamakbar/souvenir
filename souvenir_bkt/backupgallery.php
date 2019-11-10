<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bukittinggi's Souvenir</title>
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

<body>
     <header class="header black-bg">
            <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a class="logo"><p><img src="image/kul.png">&nbsp<b>WEB</b><b style="font-size: 17px">GIS</b> - <b>S</b>ouvenir</p></a>
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

              $querysearch  ="   SELECT a.id, b.gallery_souvenir as foto,b.serial_number
                                 FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' order by serial_number asc";
      echo "zzz";
                $hasil=mysqli_query($conn, $querysearch);
                while($baris = mysqli_fetch_assoc($hasil))
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
 
</body></html>
</body>