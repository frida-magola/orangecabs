<?php
    include('../func/connection.php');

    $car_id = $_POST['car_id'];

    $sqlcars = "SELECT * FROM model_car 
    INNER JOIN cars
    ON  model_car.modelcar_id = cars.vehicule_model
    INNER JOIN users
    ON cars.driver_id = users.user_id
    WHERE cars.car_id='$car_id'";

    $result = mysqli_query($link,$sqlcars);

    if(!$result){

        echo "errors";
    }
    else{

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        //encode this $row array in json data and to send it ajax
        echo json_encode($row);
    }
?>                                      
                                       