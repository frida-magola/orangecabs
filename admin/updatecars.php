<?php
session_start();
include('../func/connection.php');

//<!--    define error messages-->
$vehiculeModel= '<p><strong>Please Select vehicule model!</strong></p>';
// $vehiculeColor= '<p><strong>Please Select vehicule color!</strong></p>';
$vehiculeRegistration= '<p><strong>Please enter vehicule Registration Number!</strong></p>';
$vehiculelicenceN= '<p><strong>Please enter vehicule Licence Number!</strong></p>';
$ratePerKm= '<p><strong>Please enter vehicule rate per Km!</strong></p>';
$missingdriver= '<p><strong>Please Select driver!</strong></p>';

$missingseatavailable = '<p><strong>Seat available is missing!</strong></p>';

$missingpicturecar = '<p>Please upload a picture !.</p>';
// $missingduration = '<p><strong>Duration is missing!</strong></p>';
// $missingPrice = '<p><strong>Price is missing!</strong></p>';
// $missingDate = '<p><strong>Please select a date for your rider!</strong></p>';
// $missingtime = '<p><strong>Please select a time for your rider!</strong></p>';

$errors ='';

$car_id = $_POST['car_id'];


//check pick up point 
if(empty($_POST['vehiculemodelupdate'])){

    $errors .= $vehiculeModel;

}else{

    $vehiculemodel = filter_var($_POST['vehiculemodelupdate'], FILTER_SANITIZE_STRING);
}

//ckeck registration number 
if(empty($_POST['vehiculeRegistrationNupdate'])){

    $errors .= $vehiculeRegistration;

}else{

    $vehiculeRegistrationN = filter_var($_POST['vehiculeRegistrationNupdate'], FILTER_SANITIZE_STRING);
}

//ckeck licence number 
if(empty($_POST['LicenceNumupdate'])){

    $errors .= $vehiculeRegistration;

}else{

    $LicenceNum = filter_var($_POST['LicenceNumupdate'], FILTER_SANITIZE_STRING);
}

//check seat available
if(empty($_POST['seatavailableupdate'])){

    $errors .= $missingseatavailable;

}else{

    $seatavailable = filter_var($_POST['seatavailableupdate'], FILTER_SANITIZE_STRING);  
}

//check rate per km
if(empty($_POST['rateperkmupdate'])){

    $errors .= $ratePerKm;

}else{

    $rateperkm = filter_var($_POST['rateperkmupdate'], FILTER_SANITIZE_STRING);  
}

//check driver
if(empty($_POST['driverupdate'])){

    $errors .= $missingdriver;

}else{

    $driver = filter_var($_POST['driverupdate'], FILTER_SANITIZE_STRING);  
}

//check if there are errors and print errors
if($errors){

    $resultMessage = "<div class='alert alert-danger'>$errors</div>";

    echo $resultMessage;
    exit;

}


    //no error prepare variables for the query
    $vehiculemodel = mysqli_real_escape_string($link,$vehiculemodel);
    // $vehiculebrand = mysqli_real_escape_string($link,$vehiculebrand);
    // $vehiculecolor = mysqli_real_escape_string($link,$vehiculecolor);
    $vehiculeRegistrationN = mysqli_real_escape_string($link,$vehiculeRegistrationN);
    $LicenceNum = mysqli_real_escape_string($link,$LicenceNum);
    $driver = mysqli_real_escape_string($link,$driver);
    $rateperkm = mysqli_real_escape_string($link,$rateperkm);
    $seatavailable = mysqli_real_escape_string($link,$seatavailable);
    // $textarea = mysqli_real_escape_string($link,$textarea);

    //define a table name
    $tableName = 'cars';

            //query for a regional trip
            $date = date('Y-m-d H:i:s', time());
            $sql = "UPDATE $tableName SET `vehicule_model`='$vehiculemodel',`seatavailable`='$seatavailable',`driver_id`='$driver',
            `vehicule_registration`='$vehiculeRegistrationN',`vehicule_licenceN`='$LicenceNum',`rate_per_km`='$rateperkm',`date_add`='$date'
            WHERE car_id='$car_id'";

                //run the query and and store in $results

                $result = mysqli_query($link,$sql);

                //check if the query is successfull
                if(!$result){

                    echo "<div class=\"alert alert-danger\">There was error! the car could not be added to the da
                    tabase! </div>". mysqli_error($link);

                }else{
                    echo "<div class=\"alert alert-success\">Car is successful updated! </div>";
                }
    
    
?>