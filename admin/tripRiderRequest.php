<?php
include('../func/connection.php');
//run a query to look for trips corresponding to user_id
$sql = "SELECT * FROM trips WHERE  trips.date >= DATE(NOW()) AND is_delete='0' AND car_id=0 ORDER BY trip_id DESC";
$query = mysqli_query($link,$sql);

    // if(!$result){

    //     echo "errors";
    // }
    // else{

    //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //     //encode this $row array in json data and to send it ajax
    //     echo json_encode($row);
    // }

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
            $origine = $row['departure'];
            $destination = $row['destination'];
            $amountofriders = $row['amountofriders'];
            $nameofonerider = $row['nameofonerider'];
            $distance = $row['distance'];
            $duration = $row['duration'];
            $price = $row['price'];
            $status = $row['status_pay'];
            $date = date('D d M, Y h:i', strtotime($row['date']));
            $trip_id = $row['trip_id'];
            ?>

                <tr>
                            
                    <td><?php echo $origine ; ?></td>
                    <td><?php echo $destination; ?></td>
                    <td><?php echo "<strong>R</strong>".$price; ?></td>
                    <td><?php echo $distance .",", $duration ; ?></td>
                    <td><?php echo $date; ?></td>
                    <td>
                        <?php 
                        if($status == "unpaid") {
                            echo "
                                <span class=\"badge badge-warning\">Unpaid</span>
                            ";
                        }
                        else {
                            echo "<span class=\"badge badge-info\">Paid</span>";
                        }
                        
                        ?>
                    </td>

                    <td>

                        <i class="fas fa-car  editmode btn-outline-danger" 
                        data-toggle="modal" data-target="#checkcarsavalaibleModal" data-trip_id="<?php echo $trip_id ;?>"></i>
                        
                        <i class="fas fa-info-circle  editmode btn-outline-warning "  
                        data-toggle="modal" data-target="#inforequestbookings" id="moreinfo" 
                        data-trip_id="<?php echo $trip_id ;?>"> 
                </tr>

            <?php
        }

    }
?>