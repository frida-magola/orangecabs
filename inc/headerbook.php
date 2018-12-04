
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 " href="#">Orange Cab </a>
      

    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Logged in as <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?> 
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="?p=profile">
                <?php 
                        if (!isset($_SESSION['profile'])) {

                            echo "<img src='profilepicture/useravater.png'  class='profile'>";

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
    <!-- data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
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

<!-- //navbar mobile -->
<!-- <nav class="col-md-2 d-none d-md-block bg-light sidebar" >-->
          <div class="sidebar-sticky" id="sidebarmobile"> 
            <ul class="nav flex-column" >
                <li class="nav-item <?php if($p == 'search'){echo 'active';}?>">
                  <a class="nav-link " href="?p=search"><i class="fas fa-map-marker-alt sidebaricon"></i>Maps</a>
                </li>

                <li class="nav-item <?php if($p == 'booknow'){echo 'active';}?>">
                  <a class="nav-link " href="?p=booknow"><i class="fas fa-plus-circle"></i>Add New Trip</a>
                </li>

                <li class="nav-item  <?php if($p == 'viewtrip'){echo 'active';}?>">
                  <a class="nav-link" href="?p=viewtrip"><i class="far fa-address-book"></i>View Trips</a>
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
       <!-- // // </nav> -->




   
  