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
// $invalidPickuppoint = '<p><strong>Please enter a valid pick up point!</strong></p>';
// $VehiculeBrand = '<p><strong>Please Select vehicule brand!</strong></p>';
// $invalidDropofpoint = '<p><strong>Please enter a valid drop of point!</strong></p>';
// $amoutofriders = '<p><strong>Please enter amount of rider!</strong></p>';
// $invalidAmountofriders= '<p><strong>This input should contain number not character!</strong></p>';
// $missingnameofonerider = '<p><strong>Please enter name of one rider!</strong></p>';
$missingseatavailable = '<p><strong>Seat available is missing!</strong></p>';

$missingpicturecar = '<p>Please upload a picture !.</p>';
// $missingduration = '<p><strong>Duration is missing!</strong></p>';
// $missingPrice = '<p><strong>Price is missing!</strong></p>';
// $missingDate = '<p><strong>Please select a date for your rider!</strong></p>';
// $missingtime = '<p><strong>Please select a time for your rider!</strong></p>';

$errors ='';


//check pick up point 
if(empty($_POST['vehiculemodel'])){

    $errors .= $vehiculeModel;

}else{

    $vehiculemodel = filter_var($_POST['vehiculemodel'], FILTER_SANITIZE_STRING);
}

//ckeck registration number 
if(empty($_POST['vehiculeRegistrationN'])){

    $errors .= $vehiculeRegistration;

}else{

    $vehiculeRegistrationN = filter_var($_POST['vehiculeRegistrationN'], FILTER_SANITIZE_STRING);
}

//ckeck licence number 
if(empty($_POST['LicenceNum'])){

    $errors .= $vehiculeRegistration;

}else{

    $LicenceNum = filter_var($_POST['LicenceNum'], FILTER_SANITIZE_STRING);
}

//check seat available
if(empty($_POST['seatavailable'])){

    $errors .= $missingseatavailable;

}else{

    $seatavailable = filter_var($_POST['seatavailable'], FILTER_SANITIZE_STRING);  
}

//check rate per km
if(empty($_POST['rateperkm'])){

    $errors .= $ratePerKm;

}else{

    $rateperkm = filter_var($_POST['rateperkm'], FILTER_SANITIZE_STRING);  
}

//check driver
if(empty($_POST['driver'])){

    $errors .= $missingdriver;

}else{

    $driver = filter_var($_POST['driver'], FILTER_SANITIZE_STRING);  
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

    //retrieve user from the session
    // $user_id = $_SESSION['user_id'];
    // $mydate = $_POST['date'];
    // $mydate = date('Y-m-d h:i', strtotime($mydate));


    //get the name of the file
    $name = $_FILES["picturecar"]["name"];
    $extension = pathinfo($name, PATHINFO_EXTENSION);

    $fileError = $_FILES["picturecar"]["error"];

    //tempory location
    $tmp_name = $_FILES["picturecar"]["tmp_name"];

    $permanentDestionation = 'profilepicture/'. md5(time()) . ".$extension";

    //<!--        if vehicule registration exists in the cars tables print error-->
    $sql_vehiculeRegistrationN = "SELECT * FROM $tableName WHERE vehicule_registration='$vehiculeRegistrationN'";

    $result = mysqli_query($link, $sql_vehiculeRegistrationN);

    if (!$result) {

        echo '<div class="alert alert-danger">Error running the query!</div>';

        echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';

        exit;
    }

    $results = mysqli_num_rows($result);

    if ($results) {

        echo '<div class="alert alert-danger">That vehicule Registration number address is already exist</div>';
        exit;
    }


    //<!--        if vehicule licence number exists in the cars tables print error-->
    $sql_LicenceNum = "SELECT * FROM $tableName WHERE vehicule_licenceN='$LicenceNum'";

    $result = mysqli_query($link, $sql_LicenceNum);

    if (!$result) {

        echo '<div class="alert alert-danger">Error running the query!</div>';

        echo '<div class="alert alert-danger"> "' . mysqli_error($link) . '"</div>';

        exit;
    }

    $results = mysqli_num_rows($result);

    if ($results) {

        echo '<div class="alert alert-danger">That vehicule Licence number address is already exist</div>';
        exit;
    }
    
    //move file
    if(move_uploaded_file($tmp_name, $permanentDestionation)){
            //query for a regional trip
            $date = date('Y-m-d H:i:s', time());
            $sql = "INSERT INTO $tableName (`vehicule_model`,`seatavailable`,`driver_id`,`picture`,
                `vehicule_registration`,`vehicule_licenceN`,`rate_per_km`,`date_add`) 
            VALUES ('$vehiculemodel','$seatavailable','$driver','$permanentDestionation','$vehiculeRegistrationN','$LicenceNum','$rateperkm','$date')";

                //run the query and and store in $results

                $result = mysqli_query($link,$sql);

                //check if the query is successfull
                if(!$result){

                    echo "<div class=\"alert alert-danger\">There was error! the car could not be added to the da
                    tabase! </div>". mysqli_error($link);

                }else{
                    echo "<div class=\"alert alert-success\">Car is successful created! </div>";
                }
    }
    
?>