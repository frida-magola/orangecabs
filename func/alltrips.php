<?php
session_start();
include('connection.php');

//get the user_id
$user_id = $_SESSION['user_id'];

//run a query to look for notes corresponding to user_id
$sql = "SELECT * FROM trips WHERE user_id ='$user_id' AND is_delete='0' ORDER BY trip_id DESC";

//shows trips or alert message
if($result = mysqli_query($link, $sql)){

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $origine = $row['departure'];
            $destination = $row['destination'];
            $amountofriders = $row['amountofriders'];
            $nameofonerider = $row['nameofonerider'];
            $price = $row['price'];
            $date = date('D d M, Y h:i A', strtotime($row['date']));
            $time = $row['time'];
            // $time = date("F d, Y h:i A", $time);
            $trip_id = $row['trip_id'];

            echo "
                <div class='row loadtripbd'>

                    <div class='col'>
                        <div><span class='tripalldb departure'>Pick up point&nbsp;:&nbsp;&nbsp;</span> $origine.</div>
                        <div><span class='tripalldb departure'>Drop of point&nbsp;:&nbsp;&nbsp;</span> $destination.</div>
                        <div><span class='tripalldb date'>Date & time&nbsp;:&nbsp;&nbsp;</span>$date &nbsp;.</div>
                        </div> 

                    <div class='col'>
                        <div><span class='tripalldb price'>Price&nbsp;:&nbsp;&nbsp;R</span>$price.</div>
                        <div><span class='tripalldb amountofriders'>amount off riders&nbsp;:&nbsp;&nbsp;</span>$amountofriders.</div>
                        <div><span class='tripalldb nameofonerider'>Name of one rider&nbsp;:&nbsp;&nbsp;</span>$nameofonerider.</div>
                    </div>

                </div>

            ";
        }
    }else{
        echo '<div class="alert warning">You have not created any trips yet!</div>'. mysqli_error($link); exit;
    }
    
}else{  

    echo '<div class="alert warning">An error occured!</div>'; exit;

}

?>

