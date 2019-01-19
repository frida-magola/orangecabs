<?php 

session_start();

include('../func/connection.php');
if (isset($_SESSION['user_id'])) {

$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";

$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if ($count == 1) {

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$username = $row['username'];
$mobile = $row['mobile'];
$email = $row['email'];
$profile = $row['profilepicture'];

$_SESSION['username'] = $username;
$_SESSION['mobile'] = $mobile;
$_SESSION['email'] = $email;
$_SESSION['profile'] = $profile;

} else {

echo "There was an error retrieving the username and email from the database!";

}

}

    $p = 'history';

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h4">Displaying Online Bookings History</h5>
</div>

   <div class="accordion" id="accordionExample">

   <!-- BOOKINGS UNPAID -->
    <div class="card">
        <div class="card-header" id="headingOne">
        <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            BOOKINGS UNPAID
            </button>
        </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">  
                    <table class="table table-striped" id="datatable">
                                <thead>
                                        <tr>
                                        <th>Pick up point</th>
                                        <th>Drop of point</th>
                                        <th>Price/ Rand</th>
                                        <th>Distance Duration</th>
                                        <th>Date & time pickup</th>
                                        <th>Status pay</th>
                                        <th>Actions</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        
                                        //run a query to look for notes corresponding to user_id
                                        $sql = "SELECT * FROM trips WHERE trips.date < DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

                                        //shows trips or alert message
                                        if($result = mysqli_query($link, $sql)){

                                            if(mysqli_num_rows($result)>0){

                                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
                                            <!-- <td><?php //echo ?></td> -->
                                            <!-- <td><?php //echo $amountofriders; ?></td> -->
                                            <!-- <td><?php //echo $nameofonerider; ?></td> -->
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

                                                <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                                data-toggle="modal" data-target="#deletedeleteModal" id="delete" 
                                                data-trip_id="<?php echo $trip_id ;?>"></i>
                                                
                                                <!-- <i class="fas fa-info-circle  editmode btn-outline-warning "  
                                                data-toggle="modal" data-target="#infouser" id="moreinfo" 
                                                data-trip_id="<?php //echo $trip_id ;?>">  -->
                                        </tr>
                                        <?
                                        }
                                    }else{
                                    }
                                    
                                }else{  
                                
                                    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
                                
                                }
                                    ?>                                                
                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!--  BOOKINGS PAID -->
    <div class="card">
        <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                BOOKINGS PAID
            </button>
        </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">  
                    <table class="table table-striped" id="datatable">
                                <thead>
                                        <tr>
                                        <th>Pick up point</th>
                                        <th>Drop of point</th>
                                        <th>Price/ Rand</th>
                                        <th>Distance Duration</th>
                                        <!-- <th></th> -->
                                        <!-- <th>Amount of riders</th> -->
                                        <!-- <th>Name of one rider</th> -->
                                        <th>Date & time pickup</th>
                                        <th>Status pay</th>
                                        <th>Actions</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        
                                        //run a query to look for notes corresponding to user_id
                                        $sql = "SELECT * FROM trips WHERE trips.date < DATE(NOW()) AND is_delete='0' AND status_pay='paid' ORDER BY trip_id DESC";

                                        //shows trips or alert message
                                        if($result = mysqli_query($link, $sql)){

                                            if(mysqli_num_rows($result)>0){

                                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
                                            <!-- <td><?php //echo ?></td> -->
                                            <!-- <td><?php //echo $amountofriders; ?></td> -->
                                            <!-- <td><?php //echo $nameofonerider; ?></td> -->
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

                                                <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                                data-toggle="modal" data-target="#deletedeleteModal" id="delete" 
                                                data-trip_id="<?php echo $trip_id ;?>"></i>
                                                
                                                <!-- <i class="fas fa-info-circle  editmode btn-outline-warning "  
                                                data-toggle="modal" data-target="#infouser" id="moreinfo" 
                                                data-trip_id="<?php //echo $trip_id ;?>">  -->
                                        </tr>
                                        <?
                                        }
                                    }else{
                                    }
                                    
                                }else{  
                                
                                    echo '<div class="alert alert-warning">An error occured!</div>';
                                
                                }
                                    ?>                                                
                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- TRIP SUCCESSFULY COMPLETE -->
    <div class="card">
        <div class="card-header" id="headingThree">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                TRIP SUCCESSFULY COMPLETE
            </button>
        </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">  
                    <table class="table table-striped" id="datatable">
                                <thead>
                                        <tr>
                                        <th>Pick up point</th>
                                        <th>Drop of point</th>
                                        <th>Price/ Rand</th>
                                        <th>Distance Duration</th>
                                        <!-- <th></th> -->
                                        <!-- <th>Amount of riders</th> -->
                                        <!-- <th>Name of one rider</th> -->
                                        <th>Date & time pickup</th>
                                        <th>Status pay</th>
                                        <th>Actions</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        
                                        //run a query to look for notes corresponding to user_id
                                        $sql = "SELECT * FROM trips WHERE  trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

                                        //shows trips or alert message
                                        if($result = mysqli_query($link, $sql)){

                                            if(mysqli_num_rows($result)>0){

                                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
                                            <!-- <td><?php //echo ?></td> -->
                                            <!-- <td><?php //echo $amountofriders; ?></td> -->
                                            <!-- <td><?php //echo $nameofonerider; ?></td> -->
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

                                                <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                                data-toggle="modal" data-target="#deletedeleteModal" id="delete" 
                                                data-trip_id="<?php echo $trip_id ;?>"></i>
                                                
                                                <i class="fas fa-info-circle  editmode btn-outline-warning "  
                                                data-toggle="modal" data-target="#infouser" id="moreinfo" 
                                                data-trip_id="<?php echo $trip_id ;?>"> 
                                        </tr>
                                        <?
                                        }
                                    }else{
                                    }
                                    
                                }else{  
                                
                                    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
                                
                                }
                                    ?>                                                
                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- CHAT HISTORY -->
    <!-- <div class="card">
        <div class="card-header" id="headingFour">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                CHAT HISTORY
            </button>
        </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">  
                    <table class="table table-striped" id="datatable">
                                <thead>
                                        <tr>
                                        <th>Pick up point</th>
                                        <th>Drop of point</th>
                                        <th>Price/ Rand</th>
                                        <th>Distance Duration</th>
                                        <th></th> -->
                                        <!-- <th>Amount of riders</th> -->
                                        <!-- <th>Name of one rider</th> -->
                                        <!-- <th>Date & time pickup</th>
                                        <th>Status pay</th>
                                        <th>Actions</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody> -->
                                        <?php
                                        
                                        //run a query to look for notes corresponding to user_id
                                        //$sql = "SELECT * FROM trips WHERE trips.date < DATE(NOW()) AND is_delete='0' AND status_pay='paid' ORDER BY trip_id DESC";
                                        // $sql = "SELECT * FROM trips WHERE  trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

                                        //shows trips or alert message
                                        // if($result = mysqli_query($link, $sql)){

                                        //     if(mysqli_num_rows($result)>0){

                                        //         while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        //             $origine = $row['departure'];
                                        //             $destination = $row['destination'];
                                        //             $amountofriders = $row['amountofriders'];
                                        //             $nameofonerider = $row['nameofonerider'];
                                        //             $distance = $row['distance'];
                                        //             $duration = $row['duration'];
                                        //             $price = $row['price'];
                                        //             $status = $row['status_pay'];
                                        //             $date = date('D d M, Y h:i', strtotime($row['date']));
                                        //             $trip_id = $row['trip_id'];
                                                    
                                        ?>
                                        <tr>
                                        
                                            <td><?php //echo $origine ; ?></td>
                                            <td><?php //echo $destination; ?></td>
                                            <td><?php //echo "<strong>R</strong>".$price; ?></td>
                                            <td><?php //echo $distance .",", $duration ; ?></td>
                                            <!-- <td><?php //echo ?></td> -->
                                            <!-- <td><?php //echo $amountofriders; ?></td> -->
                                            <!-- <td><?php //echo $nameofonerider; ?></td> -->
                                            <td><?php //echo $date; ?></td>
                                            <td>
                                                <?php 
                                                // if($status == "unpaid") {
                                                //     echo "
                                                //         <span class=\"badge badge-warning\">Unpaid</span>
                                                //     ";
                                                // }
                                                // else {
                                                //     echo "<span class=\"badge badge-info\">Paid</span>";
                                                // }
                                                
                                                ?>
                                            </td>

                                            <td>

                                                <!-- <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                                data-toggle="modal" data-target="#deletedeleteModal" id="delete" 
                                                data-trip_id="<?php //echo $trip_id ;?>"></i>
                                                
                                                <i class="fas fa-info-circle  editmode btn-outline-warning "  
                                                data-toggle="modal" data-target="#infouser" id="moreinfo" 
                                                data-trip_id="<?php //echo $trip_id ;?>">  -->
                                        </tr>
                                        <?
                                //         }
                                //     }else{
                                //     }
                                    
                                // }else{  
                                
                                    //echo '<div class="alert alert-warning">An error occured!</div>';
                                
                                //}//
                                    ?>                                                
<!--                                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->

    <!-- NOTIFICATION -->
    <!-- <div class="card">
        <div class="card-header" id="headingFive">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                NOTIFICATION
            </button>
        </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">  
                    <table class="table table-striped" id="datatable">
                                <thead>
                                        <tr>
                                        <th>Pick up point</th>
                                        <th>Drop of point</th>
                                        <th>Price/ Rand</th>
                                        <th>Distance Duration</th>
                                        <th></th> -->
                                        <!-- <th>Amount of riders</th> -->
                                        <!-- <th>Name of one rider</th> -->
                                        <!-- <th>Date & time pickup</th>
                                        <th>Status pay</th>
                                        <th>Actions</th> -->
                                        
                                        </tr>
                                    <!-- </thead>

                                    <tbody> -->
                                        <?php
                                        
                                        //run a query to look for notes corresponding to user_id
                                        //$sql = "SELECT * FROM trips WHERE  trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

                                        //shows trips or alert message
                                        // if($result = mysqli_query($link, $sql)){

                                        //     if(mysqli_num_rows($result)>0){

                                        //         while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        //             $origine = $row['departure'];
                                        //             $destination = $row['destination'];
                                        //             $amountofriders = $row['amountofriders'];
                                        //             $nameofonerider = $row['nameofonerider'];
                                        //             $distance = $row['distance'];
                                        //             $duration = $row['duration'];
                                        //             $price = $row['price'];
                                        //             $status = $row['status_pay'];
                                        //             $date = date('D d M, Y h:i', strtotime($row['date']));
                                        //             $trip_id = $row['trip_id'];
                                                    
                                        ?>
                                        <tr>
                                        
                                            <td><?php //echo $origine ; ?></td>
                                            <td><?php //echo $destination; ?></td>
                                            <td><?php //echo "<strong>R</strong>".$price; ?></td>
                                            <td><?php //echo $distance .",", $duration ; ?></td>
                                            <!-- <td><?php //echo ?></td> -->
                                            <!-- <td><?php //echo $amountofriders; ?></td> -->
                                            <!-- <td><?php //echo $nameofonerider; ?></td> -->
                                            <td><?php //echo $date; ?></td>
                                            <td>
                                                <?php 
                                //                 if($status == "unpaid") {
                                //                     echo "
                                //                         <span class=\"badge badge-warning\">Unpaid</span>
                                //                     ";
                                //                 }
                                //                 else {
                                //                     echo "<span class=\"badge badge-info\">Paid</span>";
                                //                 }
                                                
                                //                 ?>
                                <!-- //             </td>

                                //             <td> -->

                                <!-- //                 <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                //                 data-toggle="modal" data-target="#deletedeleteModal" id="delete" 
                                //                 data-trip_id="<?php //echo $trip_id ;?>"></i>
                                                
                                //                 <i class="fas fa-info-circle  editmode btn-outline-warning "  
                                //                 data-toggle="modal" data-target="#infouser" id="moreinfo" 
                                //                 data-trip_id="<?php //echo $trip_id ;?>">  -->
                                <!-- //         </tr> -->
                                        <?
                                //         }
                                //     }else{
                                //     }
                                    
                                // }else{  
                                
                                //     echo '<div class="alert alert-warning">An error occured!</div>'; exit;
                                
                                // }
                                    ?>                                                
                                        
                        <!-- </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

</div>  -->