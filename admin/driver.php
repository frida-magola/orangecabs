<?php
session_start();
// require '../vendor/autoload.php';


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
$p='driver';
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
                <h5 class="h4">Displaying all Activity rides</h5>
    </div>
    <div class="table-responsive">  
        <table class="table table-striped" id="datatable">
                    <thead>
                            <tr>
                            <th>Pick up point</th>
                            <th>Drop of point</th>
                            <th>Distance </th>
                            <th>Duration</th>
                            <th>Driver name</th>
                            <th>Driver mobile</th>
                            <th>Status</th>
                            <th>Actions</th>
                            <th>Status trip</th>
                            
                            </tr>
                        </thead>

                        <tbody>
                            <?php
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
                                        $distance = $row['distance'];
                                        $duration = $row['duration'];
                                        $drivername = $row['username'];
                                        $drivermobile = $row['mobile'];
                                        $car = $row['car_id'];
                                        $status = $row['status_pay'];
                                        $driver = $row['driver_id'];
                                        $date = date('D d M, Y h:i', strtotime($row['date']));
                                        $trip_id = $row['trip_id'];
                                        
                            ?>
                            <tr>
                            
                                <td><?php echo $origine ; ?></td>
                                <td><?php echo $destination; ?></td>
                                <td><?php echo $distance; ?></td>
                                <td><?php echo $duration ; ?></td>
                                <td><?php echo $drivername; ?></td>
                                <td><?php echo $drivermobile; ?></td>
                                <td><span class="badge badge-success"><?php echo $status; ?></span></td>
                                

                                <td>
                                    <i class="far fa-clock editmode btn-outline-success" 
                                    data-toggle="modal" data-target="#chronometerstartcount" id="chronometerstart" data-trip_id="<?php echo $trip_id ;?>"></i>

                                    <!-- <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                    data-toggle="modal" data-target="#deletedeleteModal" id="delete" data-trip_id="<?php //echo $trip_id ;?>"></i>
                                    
                                    <i class="fas fa-info-circle  editmode btn-outline-warning " 
                                    data-toggle="modal" data-target="#infouser" id="moreinfo" data-trip_id="<?php //echo $trip_id ;?>">  -->
                                </td>
                                <td><span class="badge badge-secondary">No trafic</span></td>
                            </tr>
                            <?
                            }
                        }else{
                        }
                        
                    }else{  
                    
                        echo '<div class="alert alert-warning">Not record available yet!</div>';
                    
                    }
                        ?>                                                
                            
            </tbody>
        </table>
    </div>