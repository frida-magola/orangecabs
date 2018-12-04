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

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
        <h5 class="h4">File Manager</h5>

</div>

            <div class="row adminbox">
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body bookmonthly">
                        <i class="fas fa-users"></i>
                          <h5>Add Drivers</h5>
                          <a stype="submit" href="#addmodelcarModal2" data-toggle="modal" class="btn btn-warning btn-lg">Add new drivers</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body ridersbook">
                            <i class="fas fa-car"></i>
                            <h5>Add Cars</h5>
                          <a href="#addcarsModal" data-toggle="modal" class="btn btn-primary btn-lg">Add new cars</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body users">
                        <i class="fas fa-code-branch"></i>
                          <h5>Add car model</h5>
                          <a href="#addmodelcarModal" data-toggle="modal" class="btn btn-warning btn-lg">Add new car model</a>
                        </div>
                      </div>
                    </div>

            </div>

            <div class="row adminbox">
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body ridersbook">
                        <i class="fas fa-map-marked-alt"></i>
                          <h5>Add Trip</h5>
                          <a stype="submit" href="#addtripadminModal" data-toggle="modal" class="btn btn-primary btn-lg">Add trip</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body users">
                        <i class="fas fa-history"></i>
                          <h5>History Online Bookings</h5>
                          <a stype="submit" href="?p=history" class="btn btn-warning btn-lg">View</a>
                        </div>
                      </div>
                    </div>
            </div>
            