<?
include('../func/connection.php');

    $trip_id = $_POST['trip_id'];
    $sqlrequestbookings = "SELECT * FROM trips WHERE  trips.date >= DATE(NOW()) AND is_delete='0' 
    AND trip_id='$trip_id'";

    $result = mysqli_query($link,$sqlrequestbookings);

    if(!$result){

        echo "errors";
    }
    else{

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        //encode this $row array in json data and to send it ajax
        echo json_encode($row);
    }
?>