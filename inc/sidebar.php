<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <!-- <li class="nav-item <?php //if($p == 'search'){echo 'active';}?>">
                  <a class="nav-link " href="?p=search"><i class="fas fa-map-marker-alt sidebaricon"></i>Maps</a>
                </li> -->

                <li class="nav-item <?php if($p == 'booknow'){echo 'active';}?>">
                  <a class="nav-link " href="?p=booknow"><i class="fas fa-plus-circle"></i>Add New Trip</a>
                </li>

                <li class="nav-item  <?php if($p == 'viewtrip'){echo 'active';}?>">
                  <a class="nav-link" href="?p=viewtrip"><i class="far fa-address-book"></i>View Trips</a>
                </li>
                
                <li class="nav-item  <?php if($p == 'mytrip'){echo 'active';}?>">
                  <a class="nav-link" href="?p=mytrip"><i class="far fa-address-card"></i>My Trips</a>
                </li>

                <li class="nav-item <?php if($p == 'historytrip'){echo 'active';}?>">
                  <a class="nav-link" href="?p=historytrip"><i class="far fa-bookmark"></i>Trip History</a>
                </li>

                <li class="nav-item <?php if($p == 'payment'){echo 'active';}?>">
                  <a class="nav-link " href="?p=payment"><i class="fas fa-history"></i>Payments</a>
                </li>

                <li class="nav-item  <?php if($p == 'message'){echo 'active';}?>">
                  <a class="nav-link" href="?p=message"><i class="far fa-comment-alt"></i> Message</a>
                </li>

                <li class="nav-item <?php if($p == 'profile'){echo 'active';}?>">
                  <a class="nav-link"  href="?p=profile"><i class="far fa-user"></i>Profile</a>
                </li>

                <li class="nav-item <?php if($p == 'help'){echo 'active';}?>">
                  <a class="nav-link"  href="?p=help"><i class="far fa-question-circle"></i>Help</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " href="../index.php?logout=1"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>

                <!-- <div class="btn-group notifydesktop">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i class="fa fa-bell notificationicon"></i></span>
                    </button>
                
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#">Notification Details</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                        <a class="dropdown-item" href="#">Notification1 </a>
                    </div>
               </div> -->

              </ul>

          </div>
        </nav>