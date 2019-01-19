<?
include('../function/connection.php');


$sqlcars = "SELECT * FROM model_car 
            INNER JOIN cars
            ON  model_car.modelcar_id = cars.vehicule_model
            INNER JOIN users
            ON cars.driver_id = users.user_id
            ORDER BY car_id DESC";
                                            
            $result = mysqli_query($link, $sqlcars);
            
               if(mysqli_num_rows($result)>0){

                $delimiter = ",";
                $filename = "cars";

                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                }}
?>