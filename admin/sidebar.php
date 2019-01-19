<?php //session_start();?>

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
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

            <!-- <li class="nav-item <?php //if($p == 'chat'){echo 'active';}?>">
              <a class="nav-link " href="?p=chat"><i class="far fa-comment-alt"></i>Chats</a>
            </li> -->

            <li class="nav-item <?php if($p == 'profile'){echo 'active';}?>">
              <a class="nav-link " href="?p=profile"><i class="fas fa-user-circle"></i>Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="../index.php?logout=1"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
        </ul>

      </div>
  </nav>
