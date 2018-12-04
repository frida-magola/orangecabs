<?
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
// $id = $row['user_id'];

$_SESSION['username'] = $username;
$_SESSION['mobile'] = $mobile;
$_SESSION['email'] = $email;
$_SESSION['profile'] = $profile;
// $_SESSION['id_user'] = $id;

} else {

echo "There was an error retrieving the username and email from the database!";

}

}
$p='search';
?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h5 class="h4">Online Bookings / Search  Trip</h5>
                </div>

                <div class="" id="searchmargin">
                        <form id="searchform">
                            <div class="form-row form-search">
                                <div class="col-5">
                                    <label class="sr-only" for="pickuppoint">PICK UP POINT:</label>
                                    <input type="text" class="form-control" id="pickuppoint" placeholder="PICK UP POINT:" name="pickuppoint">
                                </div>
                                <div class="col-5">
                                    <label class="sr-only" for="dropofpoint">DROP-OFF POINT:</label>
                                    <input type="text" class="form-control" id="dropofpoint" placeholder="DROP-OFF POINT:" name="dropofpoint">
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>


                        <!-- trips -->
                        <div id="searchResults"></div>
                        
                        <!-- maps -->
                        <div id="map"></div>
                        <div id="infowindow-content">
                            <img src="" width="16" height="16" id="place-icon">
                            <span id="place-name"  class="title"></span><br>
                            <span id="place-address"></span>
                        </div>
                </div>

