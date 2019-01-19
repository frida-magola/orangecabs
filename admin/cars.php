<?php 

session_start();
// require '../vendor/autoload.php';

// $options = array(
//     'cluster' => 'ap2',
//     'useTLS' => true
//   );
//   $pusher = new Pusher\Pusher(
//     'e1e80d38733737333bbb',
//     '493b0ba94c72df780682',
//     '650569',
//     $options
//   );

//   $data['message'] = 'hello world';
//   $pusher->trigger('my-channel', 'my-event', $data);


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

    $p = 'cars';

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h4">Displaying all cars Assigned to the  Driver</h5>

</div>
<div class="table-responsive">
<table class="table table-striped" id="datatable">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Car Model</th>
                <th>Car Brand</th>
                <!-- <th>Registration Num.</th>
                <th>Licence Num.</th> -->
                <th>Seat Available</th>                                   
                <!-- <th>Color</th> -->
                <th>Rate/Km</th>
                <th>Driver</th>
                <th>Status Car</th>
                <!-- <th>Date</th> -->
                <th>Action</th>
                                    
            </tr>
        </thead>
        <tbody class="loadcars">
                                    
        <?php
                                        
            $sqlcars = "SELECT * FROM model_car 
            INNER JOIN cars
            ON  model_car.modelcar_id = cars.vehicule_model
            INNER JOIN users
            ON cars.driver_id = users.user_id
            ORDER BY car_id DESC";
                                            
            if($result = mysqli_query($link, $sqlcars)){

                if(mysqli_num_rows($result)>0){

                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        // echo '<pre>'.$row['0'].'</pre>';
                        // var_dump($row);
                        $car_id = $row['car_id'];
                        $modelcar = $row['model_type'];
                        $brand_car = $row['brand_car'];
                        $vehiculeRegistration = $row['vehicule_registration'];
                        $vehiculeLicenceN = $row['vehicule_licenceN'];
                        $seatavailable = $row['seatavailable'];
                        $vehiculeColor = $row['color'];
                        $rateperkm = $row['rate_per_km'];
                        $driver = $row['username'];
                        $statusCar = $row['status_car'];
                        $date = $row['date_add'];
                        $profile = $row['picture'];          
                ?>
            <tr>
                                        <td class="sorting_car"><img src="<?php echo $profile;?>" alt="picture car" class="carpicturetable"></td>
                                        <td><?php echo  $modelcar; ?></td>
                                        <td><?php echo $brand_car;?></td>
                                        <!-- <td><?php //echo $vehiculeRegistration; ?></td> -->
                                        <!-- <td><?php //echo $vehiculeLicenceN; ?></td> -->
                                        <td><?php echo $seatavailable; ?></td>
                                        <!-- <td><?php //echo $vehiculeColor; ?></td> -->
                                        <td><?php echo $rateperkm;?></td>
                                        <td><?php echo $driver;?></td>
                                        <td>
                                            <?php 
                                                if($statusCar == 'A'){
                                                    echo "<span class=\"badge badge-primary\">Available</span>";
                                                }else{
                                                    echo "<span class=\"badge badge-secondary\">Not Available</span>";
                                                }
                                            ?>
                                            
                                        </td>
                                        <!-- <td><?php //echo $date;?></td> -->
                                        <td>

                                            <i class="fas fa-pencil-alt editmode btn-outline-success" 
                                            data-toggle="modal" data-target="#updatecarsModal" data-car_id="<?php echo $car_id ;?>"></i>

                                            <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                            data-toggle="modal" data-target="#deletecarsModal" data-car_id="<?php echo $car_id ;?>"></i>

                                            <i class="fas fa-info-circle  editmode btn-outline-warning" 
                                            data-toggle="modal" data-target="#infocars" data-car_id="<?php echo $car_id ;?>"></i>
                                       
                                        </td>
                                        
                                    </tr>
                                    <?php
                                    }
                                    }
                                    }
                                    ?>                                
                                    
                                </tbody>
                </table>
</div>
                
