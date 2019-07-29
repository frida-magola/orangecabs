<?php 
session_start();
include('../func/connection.php');
if (isset($_SESSION['user_id'])) {

$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";

$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if ($count == 1) {

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$username = $row['username'];
$mobile = $row['mobile'];
$email = $row['email'];
$profile = $row['profilepicture'];

$_SESSION['username'] = $username;
$_SESSION['mobile'] = $mobile;
$_SESSION['email'] = $email;
$_SESSION['profile'] = $profile;

} else {

echo "There was an error retrieving the username and email from the database!";

}

}
$p = 'filemanager';

//count users registed
$sql = "SELECT COUNT(*) FROM users";
$resultuser = mysqli_query($link,$sql);
$rows_users = mysqli_fetch_row($resultuser);
// return $rows[0];
$number_of_users = $rows_users[0];

//count bookings
$sqluser = "SELECT COUNT(*) FROM trips WHERE trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid'";
$result = mysqli_query($link,$sqluser);
$rows = mysqli_fetch_row($result);
// return $rows[0];
$number_of_bookings = $rows[0];

//count users connected
$sqluserconnect = "SELECT COUNT(*) FROM users WHERE is_connect='1'";
$result_userconnect = mysqli_query($link,$sqluserconnect);
$rows_userconnect = mysqli_fetch_row($result_userconnect);
// return $rows[0];
$number_of_result_userconnect = $rows_userconnect[0];

//count chat
$sqlchat = "SELECT COUNT(*) FROM chat_message";
$result = mysqli_query($link,$sqlchat);
$rows = mysqli_fetch_row($result);
// return $rows[0];
$number_of_chat = $rows[0];

$sqlhistory = "SELECT COUNT(*) FROM history_book";
$result = mysqli_query($link,$sqlhistory);
$rows = mysqli_fetch_row($result);
// return $rows[0];
$number_of_history = $rows[0];

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
        <h6 class="h4">File Manager</h6>

</div>
            <div class="row adminbox">
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body ridersbook">
                        <i class="fas fa-users"></i>
                          <h6>Add Drivers</h6>
                          <a stype="submit" href="#addmodelcarModal2" data-toggle="modal" class="btn btn-primary">Add new drivers</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body ridersbook">
                            <i class="fas fa-car"></i>
                            <h6>Add Cars</h6>
                          <a href="#addcarsModal" data-toggle="modal" class="btn btn-primary">Add new cars</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body ridersbook">
                        <i class="fas fa-code-branch"></i>
                          <h6>Add car model</h6>
                          <a href="#addmodelcarModal" data-toggle="modal" class="btn btn-primary">Add new car model</a>
                        </div>
                      </div>
                    </div> 

                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body ridersbook">
                          <i class="fas fa-user-edit"></i>
                          <h6>Today's Bookings <span style="background-color: #FCB134;
                            border: 1px solid #ffffff;
                            border-radius: 50%;
                            width: 10rem; color:#ffffff;padding:.5rem"><?=$number_of_bookings;?></span></h6>
                          <a href="?p=riders" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>
            </div>

            <div class="row adminbox">
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body chat">
                          <i class="far fa-grin"></i>
                          <h6>Users Connected <span style="background-color: #FCB134;
                            border: 1px solid #ffffff;
                            border-radius: 50%;
                            width: 10rem; color:#ffffff;padding:.5rem">
                            <?=$number_of_result_userconnect;?></span></h6>
                          <a href="?p=users" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body ridersbook">
                          <!-- <i class="fas fa-users"></i> -->
                          <i class="fas fa-users-cog"></i>
                          <h6>Users Registed <span style="background-color: #FCB134;
                            border: 1px solid #ffffff;
                            border-radius: 50%;
                            width: 10rem; color:#ffffff;padding:.5rem"><?=$number_of_users;?></span></h6>
                          <a href="?p=users" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body chat">
                            <i class="far fa-comments"></i>
                            <h6>Message Riders <span style="background-color: #FCB134;
                            border: 1px solid #ffffff;
                            border-radius: 50%;
                            width: 10rem; color:#ffffff;padding:.5rem"><?=$number_of_chat;?></span></h6>
                            <a href="?p=chat" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body ridersbook">
                        <i class="fas fa-history"></i>
                          <h6>History Bookings</h6>
                          <a stype="submit" href="?p=history" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div> 
                    <!-- <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body ridersbook">
                        <i class="fas fa-map-marked-alt"></i>
                          <h6>Add Trip</h6>
                          <a stype="submit" href="#addtripadminModal" data-toggle="modal" class="btn btn-primary btn-lg">Add trip</a>
                        </div>
                      </div>
                    </div> -->    
            </div>

            