<?php 
    include('../func/connection.php');

    $missingdriver= '<p><strong>Please check a car!</strong></p>';

    $errors='';
        //check pick up point 
    if(empty($_POST['checkavailablecar'])){

        $errors .= $missingdriver;

    }else{

        $checkavailablecar = filter_var($_POST['checkavailablecar'], FILTER_SANITIZE_STRING);
    }

    //<!--    if there are any errors prints errors-->
    if ($errors) {

        $resultMessage = '<div class="alert alert-danger">' . $errors.  '</div>';
        echo $resultMessage;
    exit;

    } 

    $trip_id = $_POST['trip_id'];

    $checkavailablecar = mysqli_real_escape_string($link,$checkavailablecar);

     //run a query to look for notes corresponding to user_id
     $sql_status_pay_trip = "SELECT * FROM trips WHERE trip_id='$trip_id' AND status_pay='unpaid'";

     $result_status_trip = mysqli_query($link, $sql_status_pay_trip);
    
     if (!$result_status_trip) {
    
         echo '<div class="alert alert-danger">Error running the query!</div>';
    
         echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';
    
         exit;
     }
    
        $result_status_trips = mysqli_num_rows($result_status_trip);
        
        if ($result_status_trips) {

            echo '<div class="alert alert-danger">That action is not be execute. the trip is unpaid!</div>';
            exit;
        }

        $sqlupdate = "UPDATE trips SET car_id='$checkavailablecar' WHERE trip_id='$trip_id'";

        $resultupdate = mysqli_query($link, $sqlupdate);

        //update car_status
        $sqlcar_status = "UPDATE cars SET `status_car`='NA' WHERE vehicule_model='$checkavailablecar'";

        $result_status_car = mysqli_query($link, $sqlcar_status);

        if (!$resultupdate) {

            echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>';

            echo '<div class="alert alert-danger">"' . mysqli_error($link) . '"</div>';

            exit;

        }

        echo "<div class=\"alert alert-success\"> the car is succefull  successful! </div>";
  
?>