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
$p='riders';


?>
  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h4">Displaying all request bookings riders</h5>
    </div>

    <div class="table-responsive">  
        <table class="table table-striped table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>Pick up point</th>
                            <th>Drop of point</th>
                            <th>Price/ Rand</th>
                            <th>Distance Duration</th>
                            <th>Date & time pickup</th>
                            <th>Status pay</th>
                            <th>Actions</th>
                        
                        </tr>
                    </thead>
                    <tbody id="response">

                    </tbody>
        </table>
    </div>

    <!-- <div id="carsavailablecontainer">
        ajax call file php -->
    <!-- </div>  -->