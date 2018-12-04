<? 
session_start();

include('connection.php');
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

// $_SESSION['username'] = $username;
// $_SESSION['mobile'] = $mobile;
// $_SESSION['email'] = $email;
// $_SESSION['profile'] = $profile;
// $_SESSION['id_user'] = $id;

} 

}
$p='help';

?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h5 class="h4">Online Bookings / Help</h5>

                </div>
                <div id="help"  class="helpcontent">
                    <div>
                        <h6 class="help">Below is a list of helpful tips on how to use Orange Cabs</h6>
                        <hr>
                    </div>


                        <div>
                            <h6 class="help"><b><a href="http://localhost/orangecabs/func/bookings.php?p=booknow">- How to Add New Trip</a></b></h6>
                            <p class="help">This is where you create your Trip using you Current Location and your Destination.</p>
                                <li class="help"> Enter your Pick up Point and your Drop-Off Point Location.</li>
                                <li class="help"> Select Date and Time for Pick Up.</li>
                                <li class="help"> Enter the Number of Riders.</li>
                                <li class="help"> Enter a name of atleast one rider.</li>
                                <li class="help"> Click on <b>"Book and Go" </b> to add a trip.</li>
                        </div>
<!--                        
                        <div>
                            <br>
                            <h6 class="help"><b><a href="http://localhost/orangecabs/func/bookings.php?p=search">- Maps</a></b></h6>
                            <p class="help">This is where you search for a trip.</p>
                            <li class="help">A user must enter a Pick up Point and Drop-off Point and click on the search button to search for a trip.</li>
                            <li class="help">A message will be displayed, whether a trip is available on not.</li>                          
                            <li class="help">If the trip is not available: </li>
                            <li class="help">A message will be displayed "The are no trip matching. Please click here to book". </li>
                            <li class="help">A button will be displayed <b>"Book Now"</b> to give you an option to book a trip.</li>
                            <li class="help">The Book Now Option will take you to the Bookings page where you can Book the Trip.</li>
                        </div> -->

                        <div>
                        <br>
                        <h6 class="help"><b><a href="http://localhost/orangecabs/func/bookings.php?p=historytrip">- Trip History</a></b></h6>
                            <p class="help">This is where a list of your previous trips is displayed.</p>
                            <li class="help">An option to delete previous trip will be provided where you can delete your trips.</li>
                        </div>

                        <div>
                        <br>
                        <h6 class="help"><b><a href="http://localhost/orangecabs/func/bookings.php?p=payment">- Payment History</a></b></h6>
                        <p class="help">This is where you can view your Payment History.</p>
                        <li class="help">After every successful payment a list of your <b>Previous Payments</b> will be displayed.</li>
                        </div>
                        <div>
                        <br>
                        <h6 class="help"><b><a href="http://localhost/orangecabs/func/bookings.php?p=message">- Message</a></b></h6>
                        <p class="help">This is where the message between the Driver and the Rider.</p>
                        <li class="help"> Messages between the Driver and the Rider.</li>
                        </div>

                        <div>
                        <br>
                        <h6 class="help"><b><a href="http://localhost/orangecabs/func/bookings.php?p=profile">- Profile</a></b></h6>
                        <p class="help">This is where you can edit your profile.</p>
                        <li class="help">You can change your <b>Profile Picture, Username, Contact Number, Email Address, Password and Paymennt method.</b></li>
                        <li class="help">Click on the <b>Update</b> button to Update your details.</li>
                        </div>
                </div>
