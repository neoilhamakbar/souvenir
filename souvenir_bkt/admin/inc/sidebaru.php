<aside class="main-sidebar">
<section class="sidebar">

      <?php
      if (isset($_GET['page'])) {
        $page=$_GET['page'];
      } else {
        $page="home";        
      }


      ?>


<p class="centered"><a href="./"><img src="../assets/img/jam.jpg" class="img-circle" width="150" height="120"></a></p>
<h5 class="centered">Hi, <?php echo $_SESSION['username']; ?>&nbsp!</h5> 

                  <li class="sub-menu">
                      <a class="active" href="../">
                          <i class="fa fa-dashboard"></i>
                          <span>User Access</span>
                      </a>
                  </li>


                  <!-- <li class="sub-menu">
                    <a href="?page=souvenir">
                    <i class="fa fa-list"></i>
                    <span>Manage Souvenir</span>
                    </a>
                    </li> -->

                  <li class="sub-menu">
                    <a href="?page=homeu">
                    <i class="fa fa-list"></i>
                    <span>Owned Souvenir List</span>
                    </a>
                    </li>


                  <li class="sub-menu">
                    <a href="?page=ubahpw">
                    <i class="fa fa-cog"></i>
                    <span>Change Password</span>
                    </a>
                    </li> 


                   <?php

                    if (isset($_GET['page'])) {

      ?>
                     <!-- <li class="sub-menu">
                      <a class="active" href="./">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li> -->
                   <?php
            }
         
      ?>
                  <!-- <div style="display:none;" id="tampilik"> -->
         
                  <!-- <div style="display:none;" id="tampilkul"> -->
              <!-- <h6 class="centered" style="color: #f7d976;">Culinary</h6>
                 <li class="sub-menu">
                      <a class="active" href="?page=culinary">
                          <i class="fa fa-dashboard"></i>
                          <span>Data of Place's Culinary</span>
                      </a>
                  </li> -->
              <!--     <li class="sub-menu">
                      <a class="active" href="?page=detailculinary1111">
                          <i class="fa fa-dashboard"></i>
                          <span>Detail Culinary</span>
                      </a>
                  </li> -->

                <!--   <li class="sub-menu">
                      <a class="active" href="?page=jenisculinary">
                          <i class="fa fa-dashboard"></i>
                          <span>Culinary</span>
                      </a>
                  </li> -->

                <!--   <li class="sub-menu">
                      <a class="active" href="?page=fasculinary">
                          <i class="fa fa-dashboard"></i>
                          <span>Facility</span>
                      </a>
                  </li> -->

                  </section>
</aside>