<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ADMIN</title>
    

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <script src="../assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript">



  </script>
  </head>

  <body>

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
            <a href="index.html" class="logo"><b>INDUSTRY IN BUKITTINGGI</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
              <ul class="nav top-menu">
                    <!-- settings start -->
                   
                    <!-- inbox dropdown end -->
              </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
              </ul>
            </div>
      </header>
      <!--header end-->

<!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>

          <div id="sidebar"  class="nav-collapse " >
              <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              
              <p class="centered"><a href="#"><img src="../assets/img/jam.jpg" class="img-circle" width="150" height="120"></a></p>
              <h5 class="centered">Hi, Admin!!</h5>


                    
                 <li class="sub-menu">
                      <a class="active" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Back</span>
                      </a>
                  </li>

                 

            </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
 *********************************************************************************************************************************************************** -->

      <section id="main-content">
          <section class="wrapper">
              <div class="col-lg-15 ds" id="hide2"> 
               <h3>DATA INDUSTRI KOTA BUKITTINGGI</h3>          
          
              <div class="box-body">
              
              
              <table id="" class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Produk</th>
      <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    
<?php
    include '../connect.php';
    $gid = $_GET['gid'];
    $querysearch  ="SELECT industri_kecil_region.gid, industri_kecil_region.nama_industri,industri_kecil_region.alamat, industri_kecil_region.produk FROM industri_kecil_region order by id ASC ";
             
    $hasil=pg_query($querysearch);
    while($baris = pg_fetch_array($hasil))
    {
      $gid=$baris['gid'];
          $nama_industri=$baris['nama_industri'];
          $alamat=$baris['alamat'];
          $produk=$baris['produk'];
          
          $dataarray[]=array('gid'=>$gid,'nama_industri'=>$nama_industri,'alamat'=>$alamat,'produk'=>$produk);
?>
    <tr>
      <td><?php echo "$gid" ?></td>
      <td><?php echo "$nama_industri" ?></td>
      <td><?php echo "$alamat" ?></td>
      <td><?php echo "$produk" ?></td>
      <td><div class="btn-group">


        <a href="coba.php" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-edit"></i> Detail</a>
        
      </td>
    </tr>
<?php
    }
//echo json_encode ($dataarray);
?>

    </tbody>
    </table>


  </div><!-- /.box-body -->
              </div>



<!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
*********************************************************************************************************************************************************** -->


                  

                  

      <!--main content end-->
      <!--footer start-->
      
      <!--footer end-->
  </section>

    <!-- <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script> -->
   <!--  <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script> -->
   <!--  <script src="../assets/js/jquery.scrollTo.min.js"></script> -->
   <!--  <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>
     -->
    <!-- <script src="../assets/js/common-scripts.js"></script> -->
    
    <!-- <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script> -->
        <script type="text/javascript">
      // $(function () {
      //    $(".timepicker").timepicker({
      // showInputs: false,
      // showMeridian: false,
      // defaultTime: 'value'
      //   });
      // });
    </script>
  </body>
</html>
