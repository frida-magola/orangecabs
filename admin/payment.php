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
$p='payment';


?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h4">Displaying all invoice mail for riders</h5>

</div>
    
<!-- <div class="container datatableContent"> -->
   <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>Pick up point</th>
                    <th>Drop of point</th>
                    <th>Status Payment</th>
                    <th>Date & time payment</th>
                    <th>Rider name</th>
                </tr>
            </thead>

            <tbody>
                        <?php
                        
                        //run a query to look for notes corresponding to user_id
                        //   $sql = "SELECT * FROM trips WHERE  is_delete='0' AND status_pay='paid' ORDER BY trip_id DESC";
                        //run a query to look for notes corresponding to user_id
                        $sql = "SELECT * FROM cars
                        INNER JOIN model_car
                        ON cars.vehicule_model = model_car.modelcar_id 
                        INNER JOIN users
                        ON cars.driver_id = users.user_id
                        INNER JOIN trips
                        ON cars.vehicule_model = trips.car_id
                        WHERE status_pay='paid' ORDER BY trip_id DESC";
                          //shows trips or alert message
                          if($result = mysqli_query($link, $sql)){

                              if(mysqli_num_rows($result)>0){

                                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                      $origine = $row['departure'];
                                      $destination = $row['destination'];
                                      $amountofriders = $row['amountofriders'];
                                      $nameofonerider = $row['nameofonerider'];
                                      $distance = $row['distance'];
                                      $duration = $row['duration'];
                                      $price = $row['price'];
                                      $payment = $row['payment'];
                                      $status = $row['status_pay'];
                                      $date = date('D d M, Y h:i', strtotime($row['date_payement']));
                                      $trip_id = $row['trip_id'];
                                    
                        ?>
                        <tr>
                                        <td><?php echo $origine ; ?></td>
                                        <td><?php echo $origine ; ?></td>
                                        <td><span class="badge badge-success"><?php echo $status; ?></span></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $nameofonerider; ?></td>
                        </tr>
                        <?
                        }
                        }
                        }
                        ?>                                                
                        
            </tbody>
    </table>
   
   <!-- </div> -->
         
