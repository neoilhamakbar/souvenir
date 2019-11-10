<?php 
 include("../connect.php"); 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ADMIN</title>

   
    <script src="mapedit.js" type="text/javascript"></script>
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../assets/libs/jquery.min.js"></script>
    
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="../assets/js/chart-master/Chart.js"></script>
    <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

    
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
             <a href="index.html" class="logo"><b>INDUSTRY IN BUKITTINGGI</b></a>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                   <a href="login.php" class="logo1"><i class="fa fa-user"></i>
                   <span>Logout</span></a>
              </ul>
            </div>
        </header>
       <aside>

          <div id="sidebar"  class="nav-collapse " >
              <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              
              <p class="centered"><a href="#"><img src="../assets/img/jam.jpg" class="img-circle" width="150" height="120"></a></p>
              <h5 class="centered">Hi, Admin!!</h5>


                    
                 <li class="sub-menu">
                      <a class="active" href="tabel.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Data of Industry</span>
                      </a>
                  </li>

				<li class="sub-menu">
                      <a class="active" href="jenis.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Type of Industry</span>
                      </a>
                  </li>
                

            </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <section id="main-content">
          <section class="wrapper">
              <div class="col-lg-8 ds" id="hide2"> <!--menampilkan map-->
               <h3>                    
          <input id="latlng" type="text" value="" placeholder="  latitude, longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button> </h3>
          <div class="desc">
                    <div id="map" style="width:100%;height:400px; z-index:50"></div>
                  </div>
             
              </div>




                    <div class="col-lg-4 ds" id="hide3"> <!-- menampilkan form tambah mesjid-->
            <h3>Please Add The Data</h3>
                      <div class="desc" >
                        <form role="form" action="insertik.php" method="post">
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $idmax;?>">
        <div class="form-group">
          <label for="geom"><span style="color:red">*</span> Coordinate</label>
          <textarea class="form-control" id="geom" name="geom" readonly required></textarea>
        </div>
        <div class="form-group">
          <label for="nama"><span style="color:red">*</span>Name of Industry</label>
          <input type="text" class="form-control" name="nama" value="" required>
        </div>
        <div class="form-group">
          <label for="pemilik"><span style="color:red">*</span>Owner</label>
          <input type="text" class="form-control" name="pemilik" value="" required>
        </div>
        <div class="form-group">
          <label for="cp"><span style="color:red">*</span> Contact Person</label>
          <input type="text" class="form-control" name="cp" value="" required>
        </div>
        <div class="form-group">
          <label for="alamat"><span style="color:red">*</span>Address</label>
          <input type="text" class="form-control" name="alamat" value="" required>
        </div>
        <div class="form-group">
          <label for="product"><span style="color:red">*</span>Product</label>
          <input type="text" class="form-control" name="product" value="" required>
        </div>
        <div class="form-group">
          <label for="harga"><span style="color:red">*</span>Price</label>
          <input type="text" class="form-control" name="harga" value="" required>
        </div>
         <div class="form-group">
          <label for="stat"><span style="color:red">*</span>Status of Place</label>
          <select required name="stat" id="stat" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $stat=pg_query("select * from status_tempat ");
              while($rowstat = pg_fetch_assoc($stat))
              {
              echo"<option value=".$rowstat['id_status_tempat'].">".$rowstat['status']."</option>";
              }
              ?>
                              
          </select>
        </div> 
        <div class="form-group">
          <label for="jml"><span style="color:red">*</span>Number of Employees</label>
          <input type="text" class="form-control" name="jml" value="" required>
        </div>
        <div class="form-group">
          <label for="jns"><span style="color:red">*</span>Type of Industry</label>
          <select required name="jns" id="jns" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $jns=pg_query("select * from jenis_industri ");
              while($rowjns = pg_fetch_assoc($jns))
              {
              echo"<option value=".$rowjns['id_jenis_industri'].">".$rowjns['nama_jenis_industri']."</option>";
              }
              ?>
                              
          </select>
        </div>  
         <div class="form-group">
          <label for="kecam"><span style="color:red">*</span>Sub District</label>
          <select required name="kecam" id="kecam" class="form-control">
          <option value="">-Choose-</option>
             <?php
                                
              $kecam=pg_query("select * from kecamatan ");
              while($rowkecam = pg_fetch_assoc($kecam))
              {
              echo"<option value=".$rowkecam['id_kecamatan'].">".$rowkecam['nama_kecamatan']."</option>";
              }
              ?>
                              
          </select>
        </div> 
    
        <button type="submit" class="btn btn-primary pull-right" onclick="show1()">Save <i class="fa fa-floppy-o"></i></button>   
</form>

                      </div>
                                            
                  </div>

          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <!-- <footer class="site-footer">
          <div class="text-center">
              Fitriany Chairunnisa - 1311521018 -->
              <!-- <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a> -->
        <!--   </div>
      </footer> -->
      <!--footer end-->
  </section>

    <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>
    
    <script src="../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
  <!--   <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>
        <script type="text/javascript">
      $(function () {
         $(".timepicker").timepicker({
      showInputs: false,
      showMeridian: false,
      defaultTime: 'value'
        });
      });
    </script> -->
  </body>
</html>
