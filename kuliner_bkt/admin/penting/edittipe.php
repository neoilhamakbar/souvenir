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
                      <a class="active" href="jenis.php">
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
               <h3>EDIT TIPE INDUSTRI KOTA BUKITTINGGI</h3>

               <?php 
               include '../connect.php';
               if (!isset($_GET['id_jenis_industri'])){ ?>
        <form role="form" href="layananins.php" method="post">
          
          <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-floppy-o"></i></button>
          <div class="form-group" style="clear:both" id="l_form">
            <label for="nama_jenis_industri">Layanan</label>
            <input type="text" class="form-control" name="" value="" style="margin-bottom:3px;" autofocus required>
          </div>
        </form>
        <?php } 
        if (isset($_GET['id_jenis_industri'])){
          $id_jenis_industri=$_GET['id_jenis_industri'];
          $sql = pg_query("SELECT * FROM jenis_industri where id_jenis_industri=$id_jenis_industri");
          $data = pg_fetch_array($sql)
        ?>
        <form role="form" action="act/layananupd.php" method="post">
          <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-floppy-o"></i></button>
          <input type="text" class="form-control hidden" name="id_layanan" value="<?php echo $data['layanan_id'] ?>">
          <div class="form-group" style="clear:both">
            <label for="nama">Layanan</label>
            <input type="text" class="form-control" name="layanan" value="<?php echo $data['jenis_layanan'] ?>" required>
          </div>
        </form>
        <?php } ?>

        </div>
        </section>
        </section>
        <script>

</script>
</section>
</body>
</html>
