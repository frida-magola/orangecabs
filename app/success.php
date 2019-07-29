<?php 

include('../func/notification_db.php');

  if(isset($_GET['trip_id']) && isset($_GET['user_id'])){
                        
        $tripId = $_GET['trip_id'];
        $userId = $_GET['user_id'];
                        
        $query = "UPDATE trips SET status_pay='paid',payment='1',pay_information='successfully processed' WHERE trip_id='".$tripId."' AND user_id='".$userId."'";
                        
        // $query = "INSERT INTO payement(`trip_id`,`payment_status`,`user_id`,`timestamp`) VALUES('".$_SESSION['trip_id']."','1','".$_SESSION['user_id']."','$date')";
                        
        $result = $link->prepare($query);
        $result->execute();

   }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Success Payment Orange cabs</title>
    <meta charset="utf-8">

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>
    [type=reset], [type=submit], button, html [type=button] {
     -webkit-appearance: none; 
}
</style>

</head>

<style>

    @font-face {
    font-family: 'pt sans';
    font-style: normal;
    font-weight: normal;
    src: local('PT Sans'), local('PTSans-Regular'),
      url('pt_sans/PT_Sans-Web-Regular.ttf');  }

    h1, p { font-family:'pt sans';
           font-size:15px;  }

</style>

<body>

    <div class="container">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h5 class="h4">Online Bookings / Driver Profile </h5>
            </div>

          
                    <?php
                    $profilepicture = '';
                            //run a query to look for notes corresponding to user_id
                            $sql = "SELECT * FROM cars
                            INNER JOIN model_car
                            ON cars.vehicule_model = model_car.modelcar_id 
                            INNER JOIN users
                            ON cars.driver_id = users.user_id
                            INNER JOIN trips
                            ON cars.vehicule_model = trips.car_id
                            WHERE trips.user_id='".$userId."' ORDER BY trip_id DESC";

                            
                            //shows trips or alert message
                            $result = $link->prepare($sql);
                            $result->execute();
                            if($result->rowCount() > 0){

                                foreach($result as $row){

                                    // var_dump($row); die();

                                        $origine = $row['departure'];
                                        $destination = $row['destination'];
                                        $distance = $row['distance'];
                                        $duration = $row['duration'];
                                        $drivername = $row['username'];
                                        $email = $row['email'];
                                        $drivermobile = $row['mobile'];
                                        $profile = $row['profilepicture'];
                                        $car = $row['car_id'];
                                        $status = $row['status_pay'];
                                        $driver = $row['driver_id'];
                                        $date = date('D d M, Y h:i', strtotime($row['date']));
                                        $trip_id = $row['trip_id'];
                                        $model_type = $row['model_type'];
                                        $brand_car = $row['brand_car'];
                                        $color_car = $row['color'];
                                        // $picturecar = $row['picture'];
                                        $registration = $row['vehicule_registration'];



                                        // if(!isset($profile)){

                                        //     $profilepicture .= "<img src='profilepicture/useravater.png' alt='Photo user' class='popup-driver'>";
                                        
                                        // }else{
    
                                        //     $profilepicture .= "<img src='$profile' class='popup__img' id='imagePreview'>";
                                        // }

                                        //echo $drivername;

                                        echo "
                                            <div class=\"row\">
                
                                            <div class=\"col-md-4 imgdriver\">
                                                <!-- upload picture -->
                                            <h6 class=\"heading-secondary\">Change your profile picture</h6>
                                                <div class=\"row\">
                                                    <div class=\"col profile\" style=\"width:4rem;\">
                                                        <div>
                                                            <img src='profilepicture/useravater.png' class='popup__img' alt='Profile picture'>
                                                        </div>
                                                        <ul class='driver-info'>  
                                                            <li><span class='badge badge-secondary driver-list'>Driver name:&nbsp;</span>$drivername</li>
                                                            <li><span class='badge badge-secondary driver-list'>Driver email:&nbsp;</span>$email</li>
                                                            <li><span class='badge badge-secondary driver-list'>Driver cell:&nbsp;</span>$drivermobile</li>
                                                        </ul>
                                                    </div>
                                                </div> 
                                                </div>

                                            <div class=\"col-md-8\" id=\"profilemargin\">
                                            <h6 class=\"heading-secondary\">Information about the car for your trip</h6>
                                            <div class=\"profile-content\">
                                                <div class=\"popup__right\">
                                                    <div class=\"popup__text\">
                                                        <table class=\"table table-striped\">
                                                            <tr>
                                                                <td>Pick up point&nbsp; &nbsp;</td>
                                                                <td id=\"usernamereload\">
                                                                    $origine
                                                                </td>
                                                            </tr>
                        
                                                            <tr>
                                                                <td>Drop of point&nbsp;&nbsp;</td>
                                                                <td>
                                                                    $destination
                                                                </td>
                                                            </tr>
                        
                                                            <tr>
                                                                <td>Duration&nbsp;&nbsp;</td>
                                                                <td>
                                                                    $duration
                                                                </td>                                                                
                                                            </tr>

                                                            <tr>
                                                                <td>Type an registration taxi &nbsp;&nbsp;</td>
                                                                <td>
                                                                    $model_type, &nbsp; $registration
                                                                </td>                                                                
                                                            </tr>
                                                            <tr>
                                                            <td>Brand and color taxi&nbsp;&nbsp;</td>
                                                            <td>
                                                                $brand_car, &nbsp; $color_car
                                                            </td>                                                                
                                                        </tr>
                        
                                                            <tr>
                                                                <td>Driver coming&nbsp; &nbsp;</td> 
                                                                <td type=\"password\">
                                                                   Timer
                                                                </td>
                                                        </table>
                                                    </div>
                        
                                                </div>
                                            </div>
                                        </div>
                                        ";

                                }

                                

                            }
                                
                    
                            ?>
                          
                </div>


                                
</div>

    
                <div class="row successmessage" style="">
                    <div class="card" style="    margin: 0 auto;
    padding: 1rem; margin-bottom:4rem;">
                    <?
                      
                    
                      ?>
                      <p><strong>N.B:</strong>Your payment trip have been  placed!</p>
                      <p>Your payment for the trip have been successfully procesed!</p>
                      <p>You can view your order history by going to <a href="https://orangecabs.joburg/func/bookings.php?p=payment"class="text-danger"><b>payments<b></p>
                      <p>Thank you for travelling with us, good journey!</p>
                      <a href="https://orangecabs.joburg/func/bookings.php?p=mytrip" type="button" class="btn btn-outline-warning"> <i class="fas fa-arrow-circle-left" style="font-size:1.2rem;"></i>Back</a>

                    </div>
                </div>

</body>

</html>

                



        



