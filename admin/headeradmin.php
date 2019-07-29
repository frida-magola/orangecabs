
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">OrangeMadmin</a>
      <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Logged in as <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?> 
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="?p=profile">
                    <?php 
                                    if (!isset($_SESSION['profile'])) {

                                        echo "<img src='profilepicture/carprofile.png'  class='profile'>";

                                    } else {

                                        echo "<img src='".$_SESSION['profile']."' class='profile'>";


                                    }
                                ?>
                </a>
                <a class="dropdown-item" href="?p=profile">Change profile</a>
            
                <div class="dropdown-divider"></div>
                <!-- <a class="dropdown-item" href="#">Separated link</a> -->
                <a class="dropdown-item" href="../index.php?logout=1">LOGOUT</a>
            </div>

        </div>
        <!-- <i class="fas fa-bars" id="menus-toggle"></i>
        <div class="btn-group px-3 dropleft notifydesktop">

          <div class="btn-group">
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            >
            <span><i class="fa fa-bell notificationicon" data-toggle="tooltip" data-placement="left" title="Enable Notification"></i></span>

            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Notification Details</a>
                <div class="dropdown-divider"></div>
            </div>

          </div>

        </div> -->

        <i class="fas fa-bars" id="menus-toggle"></i>
        <div class="btn-group px-3 dropleft notifydesktop">

             <div class="btn-group">
                <!-- <button type="button" class="btn btn-warning dropdown-toggle">
                    
                </button> -->
                <span class="badge badge-danger count" style="border-radius:10px"></span>
                <span><i class="fa fa-bell notificationicon" data-toggle="tooltip" data-placement="left" title="Enable Notification"></i></span>
                <ul class="dropdown-menu" id="notificationicon-list"></ul>

        </div>
    </nav>


    <!-- <nav class="col-md-2 d-none d-md-block bg-light sidebar"> -->
    <div class="sidebar-sticky" id="sidebarmobile">
          <ul class="nav flex-column">
            
            <li class="nav-item <?php if($p == 'madmin'){echo 'active';}?>">
              <a class="nav-link " href="?p=madmin"><i class="fas fa-map-marker-alt sidebaricon"></i>Maps</a>
            </li>

            <li class="nav-item <?php if($p == 'users'){echo 'active';}?>">
              <a class="nav-link " href="?p=users"><i class="fas fa-users"></i>Users</a>
            </li>

            <li class="nav-item <?php if($p == 'drivers'){echo 'active';}?>">
              <a class="nav-link " href="?p=drivers"> <i class="fas fa-screwdriver"></i> Drivers</a>
            </li>

            <li class="nav-item <?php if($p == 'cars'){echo 'active';}?>">
              <a class="nav-link " href="?p=cars"><i class="fas fa-taxi"></i>Cars Assignement</a>
            </li>

            <li class="nav-item <?php if($p == 'riders'){echo 'active';}?>">
              <a class="nav-link " href="?p=riders"><i class="fas fa-book-reader"></i>Request Bookings </a>
            </li>

            <li class="nav-item <?php if($p == 'driver'){echo 'active';}?>">
              <a class="nav-link " href="?p=driver"><i class="fas fa-plane-arrival"></i>Riders Bookings</a>
            </li>

             <li class="nav-item <?php if($p == 'filemanager'){echo 'active';}?>">
              <a class="nav-link" href="?p=filemanager">
              <i class="far fa-folder-open"></i>File Manager
              </a> 
            </li>

            <li class="nav-item <?php if($p == 'history'){echo 'active';}?>">
              <a class="nav-link " href="?p=history"><i class="fas fa-history"></i>History</a>
            </li>

            <li class="nav-item <?php if($p == 'payment'){echo 'active';}?>">
              <a class="nav-link " href="?p=payment"><i class="fas fa-credit-card"></i>Payments</a>
            </li>

            <li class="nav-item <?php if($p == 'chat'){echo 'active';}?>">
              <a class="nav-link " href="?p=chat"><i class="far fa-comment-alt"></i>Chats</a>
            </li>

            <li class="nav-item <?php if($p == 'profile'){echo 'active';}?>">
              <a class="nav-link " href="?p=profile"><i class="fas fa-user-circle"></i>Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="../index.php?logout=1"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>

            <div class="btn-group notifybutton">
                    <button type="button" class="btn btn-warning dropdown-toggle notifymobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i class="fa fa-bell notificationicon"></i></span>
                    </button>
                
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#">Notification Details</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                        <a class="dropdown-item" href="#">Notification1 </a>
                    </div>
               </div>
        </ul>

      </div>
  <!-- </nav> -->




   
  