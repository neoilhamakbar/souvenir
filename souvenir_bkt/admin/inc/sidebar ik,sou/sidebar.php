<aside class="main-sidebar">
<section class="sidebar">

      <?php
      if (isset($_GET['page'])) {
        $page=$_GET['page'];
      } else {
        $page="home";        
      }


      ?>


<p class="centered"><a href="#"><img src="../assets/img/jam.jpg" class="img-circle" width="150" height="120"></a></p>
              <h5 class="centered">Hi, Admin!!</h5>

                  <li class="sub-menu">
                      <a class="active" href="../">
                          <i class="fa fa-dashboard"></i>
                          <span>Halaman Pengguna</span>
                      </a>
                  </li>
                  <!-- <div style="display:none;" id="tampilik"> -->
          <?php
            if($page == "industry"){
          ?>
              <h6 class="centered" style="color: #f7d976;">Industri Kecil</h6>
                 <li class="sub-menu">
                      <a class="active" href="?page=industry">
                          <i class="fa fa-dashboard"></i>
                          <span>Data of Industry</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a class="active" href="?page=jenis">
                          <i class="fa fa-dashboard"></i>
                          <span>Type of Industry</span>
                      </a>
                  </li>
                  <!-- </div> -->
          <?php
            }
            if($page == "souvenirs"){
          ?>
                 <!--  <div style="display:none;" id="tampilsouv"> -->
              <h6 class="centered" style="color: #f7d976;">Souvenirs</h6>
                 <li class="sub-menu">
                      <a class="active" href="?page=souvenirs">
                          <i class="fa fa-dashboard"></i>
                          <span>Data of Souvenirs</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="?page=jenissouvenirs">
                          <i class="fa fa-dashboard"></i>
                          <span>Type of Souvenirs</span>
                      </a>
                  </li>
                  <!-- </div> -->
          <?php
            }
            if($page == "culinary"){
          ?>
                  <!-- <div style="display:none;" id="tampilkul"> -->
              <h6 class="centered" style="color: #f7d976;">Culinary</h6>
                 <li class="sub-menu">
                      <a class="active" href="?page=culinary">
                          <i class="fa fa-dashboard"></i>
                          <span>Data of Place's Culinary</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="?page=detailculinary1111">
                          <i class="fa fa-dashboard"></i>
                          <span>Detail Culinary</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="?page=jenisculinary">
                          <i class="fa fa-dashboard"></i>
                          <span>Culinary</span>
                      </a>
                  </li>
          <?php
            }
         
      if (isset($_GET['page'])) {

      ?>
                 <li class="sub-menu">
                      <a class="active" href="./">
                          <i class="fa fa-arrow-left"></i>
                          <span>Back To Dashboard</span>
                      </a>
                  </li>

          <?php
            }
         
      ?>

        <!-- <li class="sub-menu">
                      <a class="active" href="?page=jenis">
                          <i class="fa fa-dashboard"></i>
                          <span>Type of Culinary</span>
                      </a>
                  </li> -->
                    <!-- </div> -->


                  </section>
</aside>