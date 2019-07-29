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

$_SESSION['username'] = $username;
$_SESSION['mobile'] = $mobile;
$_SESSION['email'] = $email;
$_SESSION['profile'] = $profile;
// $_SESSION['id_user'] = $id;

} else {

echo "There was an error retrieving the username and email from the database!";

}

}
$p='message';
?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h5 class="h4">Online Bookings Support / Chat / Leave a Message </h5>
	</div>

	<!-- <div class="row"> -->
		<div class="col-md-12" style="margin-bottom:.2rem;">
			<!-- <h5 class="h5">Message Posted</h5>
			<div id="load-allmessage-stuff"></div> -->
			<!-- start chat -->
			<div id="user_details" class="" style="font-size:.9rem;"></div>
			<div id="user_modal_details" style="z-index:99999"></div>
		</div>

		<div class="col-md-12">
			<form  id="formnotify">
				<div id="notificationMessage"></div>
				<div class="form-group">
					<textarea class="form-control" id="description" rows="3" name="description" placeholder="Leave a message for complaints or compliments....."></textarea>
				</div>

				<div class="form-group">
					<input type="submit" id="submit"  class="btn btn-warning" value="SUBMIT">
				</div>
			</form> 
		</div>

	<!-- </div> -->