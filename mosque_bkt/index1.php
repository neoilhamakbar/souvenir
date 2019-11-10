<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Masjid</title>


    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/libs/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
    <script src="script.js" type="text/javascript"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="assets/js/chart-master/Chart.js"></script>

  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="index.html" class="logo"><b>Mosque Finder Geographic Information System</b></a>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                   <a href="login.php" class="logo1"><i class="fa fa-sign-in"></i>
                   <span>Login</span></a>
              </ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Mosque Finder</h5>

                  
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="resultt()">
                          <i class="fa fa-search"></i>
                          <span>Search By</span>
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
                            <button type="submit" class="btn btn-default" value="carimasjid" onclick="cari_masjid()"> <i class="fa fa-search"></i></button>                          
                         
                        </div>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()" >
                          <i class="fa fa-cogs"></i>
                          <span>District</span>
                      </a>
                      <ul class="sub">
                         <div  class="panel-body" >
                            <select class="form-control" id="kecamatan" >
                                <?php
                                include("connect.php"); 
                                $kecamatan=pg_query("select * from kecamatan ");
                                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                                {
                                echo"<option value=".$rowkecamatan['id'].">".$rowkecamatan['nama_kecam']."</option>";
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
                          <i class="fa fa-book"></i>
                          <span>Categories</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
                          <select class="form-control" id="id_kategori" >
                                <?php
                                include("connect.php"); 
                                $kategori=pg_query("select * from kategori ");
                                while($rowkategori = pg_fetch_assoc($kategori))
                                {
                                echo"<option value=".$rowkategori['id_kategori'].">".$rowkategori['nama_kat']."</option>";
                                }
                                ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='carikategori()'><i class="fa fa-search"></i></button>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Transportation</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
                          <select class="form-control" style="width: 90%;" id="" >  
                          <?php
                                include("connect.php"); 
                                $kendaraan=pg_query("select * from jenis_kendaraan ");
                                while($rowkendaraan = pg_fetch_assoc($kendaraan))
                                {
                                echo"<option value=".$rowkendaraan['id_jenis_kendaraan'].">".$rowkendaraan['jenis_kendaraan']."</option>";
                                }
                                ?>
                          </select>
                          <br>
                          <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='carikategori()'><i class="fa fa-search"></i></button>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Public Transportation</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
                          <select class="form-control" style="width: 90%;" id="kecamatan" >  
                          <?php
                                include("connect.php"); 
                                $angkot=pg_query("select * from angkot ");
                                while($rowangkot = pg_fetch_assoc($angkot))
                                {
                                echo"<option value=".$rowangkot['angkot_id'].">".$rowangkot['angkot_nama']."</option>";
                                }
                                ?>
                          </select>
                          <br>
                          <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='carikategori()'><i class="fa fa-search"></i></button>
                      </ul>
                  </li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="eventt()" >
                          <i class="fa fa-tasks"></i>
                          <span>Event</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="list()" >
                          <i class="fa fa-tasks"></i>
                          <span>List Mosque</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="list()" >
                          <i class="fa fa-tasks"></i>
                          <span>List Garin</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <section id="main-content">
          <section class="wrapper">
                            <div class="col-lg-9 ds" id="hide2">
              
               <h3>Map 
                <a class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Current Position"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                    <a class="btn btn-default" role="button" data-toggle="collapse" href="#terdekat" title="Nearby" aria-controls="terdekat"><i class="fa fa-road" style="color:black;"></i></a>
               </h3>
          <div class="desc">
                    <div id="map" style="width:100%;height:350px; z-index:50"></div>
                  </div>
             
              </div>
                  <div class="col-lg-3 ds" id="result">
            <h3>Result</h3>
            <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group" id="hasilcari1" style="display:none;">
                        <table class="table table-bordered" id='hasilcari'>
                        </table>  
                      </div>                   
                  </div>
            </div>

             <div class="col-lg-3 ds" style="display:none;" id="eventt">
            <h3>Event</h3>
            <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group" id="hasilcari1" style="display:none;">
                        <table class="table table-bordered" id='hasilcari'>
                        </table>  
                      </div>                   
                  </div>
            </div>
            <br>

            <div class="col-lg-9 ds" id="infoo">
            <h3>Information</h3>
                    
             
                      <div class="form-group">
                        <table class="table table-bordered" id='info'>
                        </table>  
                      </div>                   
                
              </div>

               <div class="col-lg-3 ds" id="att1">
            <h3>Attraction Around Mosque</h3>
                    
             
                      <div class="form-group" style="max-height:500px;overflow:auto;">
                        <table class="table table-bordered" id='info1'>
                        </table>  
                      </div>                   
                
              </div>

              <div id="showlist" style="display:none;">
                      <div class="row mt">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo" style="width:100%;height:350px; z-index:90">
                                  <a class="fancybox" href="foto/1.jpg"><img class="img-responsive" src="foto/1.jpg" alt=""></a>
                                  <label>Mesjid Agung</label>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo" style="width:100%;height:350px; z-index:90">
                                  <a class="fancybox" href="foto/2.jpg"><img class="img-responsive" src="foto/2.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo" style="width:100%;height:350px; z-index:90">
                                  <a class="fancybox" href="foto/3.jpg"><img class="img-responsive" src="foto/3.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
        </div><!-- /row -->

        <div class="row mt">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                  <a class="fancybox" href="foto/4.jpg"><img class="img-responsive" src="foto/4.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                  <a class="fancybox" href="foto/5.jpg"><img class="img-responsive" src="foto/5.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                  <a class="fancybox" href="foto/6.jpg"><img class="img-responsive" src="foto/6.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
        </div><!-- /row -->

        <div class="row mt mb">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                  <a class="fancybox" href="foto/7.jpg"><img class="img-responsive" src="foto/8.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                  <a class="fancybox" href="foto/8.jpg"><img class="img-responsive" src="foto/8.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                  <a class="fancybox" href="foto/9.jpg"><img class="img-responsive" src="foto/9.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
          </div><!-- col-lg-4 -->
        </div><!-- /row -->
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

    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  </body>
</html>
