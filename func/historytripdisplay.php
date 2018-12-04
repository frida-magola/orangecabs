<?php
session_start();

include('connection.php');
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
// $id = $row['user_id'];

$_SESSION['username'] = $username;
$_SESSION['mobile'] = $mobile;
$_SESSION['email'] = $email;
$_SESSION['profile'] = $profile;
// $_SESSION['id_user'] = $id;

} else {

echo "There was an error retrieving the username and email from the database!";

}

}
$p='historytrip';
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Online Bookings / history  Bookings</h4>
    </div>
    
    
    <div class="container datatableContent">
   <table class="table-striped datatable" >
                    <thead>
                        <tr>
                        <th>Pick up point</th>
                        <th>Drop of point</th>
                        <th>Price/ Rand</th>
                        <th>Distance Duration</th>
                        <!-- <th></th> -->
                        <th>Amount of riders</th>
                        <th>Name of one rider</th>
                        <th>Date & time pickup</th>
                        <th>Status pay</th>
                        <th>Actions</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                        //run a query to look for notes corresponding to user_id
                          $sql = "SELECT * FROM trips WHERE user_id ={$_SESSION['user_id']} AND trips.date < DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

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
                            <td><?php echo $distance ."<br>".$duration; ?></td>
                            <td><?php echo $amountofriders; ?></td>
                            <td><?php echo $nameofonerider; ?></td>
                            <td><?php echo $date; ?></td>
                            <td>
                                <?php 
                                if($status == "unpaid") {
                                    echo "
                                         <span class=\"badge badge-danger\">Unpaid</span>
                                    ";
                                }
                                else {
                                    echo "<span class=\"badge badge-success\">Paid</span>";
                                }
                                
                            ?>
                            </td>

                            <td>
                              <i class="far fa-trash-alt editmode btn-outline-danger" 
                                        data-toggle="modal" data-target="#edittripModal" data-trip_id="<?php echo $trip_id ;?>"></i>
                            </td>  
                        </tr>
                        <?
                        }
                        }
                        }
                        ?>                                                
                        
           </tbody>
    </table>
   
   </div>
