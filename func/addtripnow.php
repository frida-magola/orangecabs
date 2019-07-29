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

} 

}

$p='booknow';
?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h5 class="h4">Online Bookings / Book now </h5>
                </div>
                <form action="" id="addTripform">

                    <div class="modal-body">

                        <!-- <div id="map"></div>
                        <div id="infowindow-content">
                            <img src="" width="16" height="16" id="place-icon">
                            <span id="place-name"  class="title"></span><br>
                            <span id="place-address"></span>
                        </div> -->
                        <div id="addtripmessage"></div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pickuppoint" class="label-form">PICK UP POINT:</label>
                                <input type="text" class="form-control text-lowercase" id="pickuppoint"  name="pickuppoint" placeholder="PICK UP POINT:">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dropofpoint" class="label-form">DROP-OFF POINT:</label>
                                <input type="text" class="form-control text-lowercase" id="dropofpoint" placeholder="DROP-OFF POINT:" name="dropofpoint">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                    <label for="distance" class="label-form">DISTANCE:</label>
                                    <input type="text" class="form-control text-lowercase" id="distance"  readonly="readonly" name="distance" placeholder="DISTANCE:">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="duration" class="label-form">DURATION:</label>
                                    <input type="text" class="form-control text-lowercase" id="duration" readonly="readonly" placeholder="DURATION:" name="duration">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price" class="label-form">PRICE &nbsp;/ Rand:</label>
                                    <input type="text" class="form-control text-lowercase" id="price" readonly="readonly" placeholder="Price:" name="price">
                                </div>
                        </div>

                        <div class="form-row">

                            <!-- <div class="col-sm-4"> -->
                                <div class="form-group col-md-4">
                                <label for="date" class="text-uppercase label-form">Select Date & Time Pick up:</label>
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="date"/>
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            <!-- <div class="form-group col-md-4">
                            <label for="date" class="text-uppercase label-form">Select Date & Time Pick up:</label>
                                <div id="picker"> </div>
                                <input class="form-control " type="hidden" id="result" value="" name="date" id="date"/>
                            </div> -->
                            <div class="form-group col-md-4">
                                <label for="amountofriders" class="text-uppercase label-form">Amount of riders:</label>
                                <input type="number" class="form-control text-lowercase" id="amountofriders" name="amountofriders" placeholder="Amount off riders:">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nameofonerider" class="text-uppercase label-form">Name of one rider:</label>
                                <input type="text" class="form-control text-lowercase" id="nameofonerider" placeholder="Name of one rider:" name="nameofonerider">
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="addtrip" value="Book and Go">
                    </div>
                </form>        
            