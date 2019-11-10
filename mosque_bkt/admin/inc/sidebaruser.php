 
 <?php
require 'act/viewdatamas.php';
  ?>
<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="../assets/img/fr-10.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Hi, <?php echo $_SESSION['username']; ?>&nbsp!</h5>
                    
				<li class="mt">
                      <a href="../")">
                          <i class="fa fa-book"></i>
                          <span>User Access</span>
                      </a>
                  </li> 
                  <li class="sub-menu">
                      <a href="?page=content">
                          <i class="fa fa-dashboard"></i>
                          <span>Information</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="?page=updatemesjid&id=<?php echo $id ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Edit Information</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a href="?page=formfasupd&id=<?php echo $id ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Edit Facility</span>
                      </a>
                  </li>
				   <li class="sub-menu">
                      <a href="?page=listevent">
                          <i class="fa fa-cogs"></i>
                          <span>List Event</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="?page=ubahpw">
                          <i class="fa fa-cogs"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
             </ul>