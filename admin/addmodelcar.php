<?php
session_start();
include('../func/connection.php');

// <!--check user inputs-->
//<!--    define error messages-->
$missingmodelcar = '<p><strong>Please enter a new model car!</strong></p>';
$missingcolor = '<p><strong>Model car color missing!</strong></p>';
$imissingbrandcar = '<p><strong>model Brand car missing!</strong></p>';


$errors ='';


//get missingmodelcar
if (empty($_POST["model_car"])) {

    $errors .= $missingmodelcar;
//    var_dump($errors);

} else {

    $model_car = filter_var($_POST["model_car"], FILTER_SANITIZE_STRING);
}


//get color
if (empty($_POST["color"])) {

    $errors .= $missingcolor;
//    var_dump($errors);

}  else {

    $color = filter_var($_POST["color"], FILTER_SANITIZE_STRING);

}

//get brand_car
if (empty($_POST["brand_car"])) {

    $errors .= $imissingbrandcar;
//    var_dump($errors);

}  else {

    $brand_car = filter_var($_POST["brand_car"], FILTER_SANITIZE_STRING);

}


//<!--    if there are any errors prints errors-->
if ($errors) {

    $resultMessage = '<div class="alert alert-danger">' . $errors.  '</div>';
    echo $resultMessage;
   exit;

} 

//<!--no errors-->   
//<!--    prepare variables for the queries--> 
   $model_car = mysqli_real_escape_string($link, $model_car);

   $brand_car = mysqli_real_escape_string($link, $brand_car);

   $color = mysqli_real_escape_string($link, $color);
   
  $date = date('Y-m-d H:i:s', time());
   //insert user details and activation code in the users table
   $sql = "INSERT INTO model_car(`model_type`,`color`,`brand_car`,`date`) 
    VALUES('$model_car','$brand_car','$color','$date')";

   $result = mysqli_query($link, $sql);

   if (!$result) {

       echo '<div class="alert alert-danger">There was an error inserting the model type car details in the database!</div>';

       echo '<div class="alert alert-dander">"' . mysqli_error($link) . '"</div>';

       exit;

   }

    echo "<div class='alert alert-success'>New model type car added successful! </div>";





?>