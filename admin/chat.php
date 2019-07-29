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
$p='chat';


?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 mb-3 border-bottom">
            <h5 class="h4">Displaying all Message (chat) riders / Drivers</h5>

</div>
   
<div class="card adminchatbox">
    <h5 id="user_details" class="list-group-item list-group-item-action" style="font-size:.9rem;"></h5> 
</div>
<div id="user_modal_details"></div> 
