<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="../assets/img/fr-10.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Hi, <?php echo $_SESSION['username']; ?>&nbsp!</h5>
                  
                <li class="sub-menu">
                      <a class="active" href="../">
                        <i class="fa fa-dashboard"></i>
                        <span>User Access</span>
                      </a>
                </li>

				        <!-- <li class="sub-menu">
                      <a href="./>
                          <i class="fa fa-tasks"></i>
                          <span>Dashboard</span>
                      </a>
                  </li> -->
                  <li class="sub-menu">
                      <a href="?page=homeadmin">
                      <i class="fa fa-list"></i>
                          <span>Manage Mosque</span>
                      </a>
                  </li>   
					<li class="sub-menu">
                      <a href="?page=listkeg">
                          <i class="fa fa-list"></i>
                          <span>Manage Event</span>
                      </a>
                  </li>				  
                  <li class="sub-menu">
                      <a href="?page=fasilitas">
                          <i class="fa fa-list"></i>
                          <span>Manage Facility</span>
                      </a>
                  </li>
				   <li class="sub-menu">
                      <a href="?page=listustad">
                          <i class="fa fa-list"></i>
                          <span>Manage Ustad</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="?page=listpengurus">
                          <i class="fa fa-cog"></i>
                          <span>Manage User</span>
                      </a>
                  </li>

              </ul>