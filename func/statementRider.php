<!-- <?php
// session_start();
// include('connection.php');

// //get the user_id
// $user_id = $_SESSION['user_id'];

?>
    
    
    <table class="table-striped" id="datatable">
                    <thead>
                        <tr>
                        <th>Pick up point</th>
                        <th>Drop of point</th>
                        <th>Price/ Rand</th>
                        <th>Date & time pickup</th>
                        <th>Invoice Mail</th>
                        <th>Actions</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                        //run a query to look for notes corresponding to user_id
                        // $sql = "SELECT * FROM payement 
                        //         INNER JOIN trips 
                        //         ON payment.id = trips.payment
                        //         WHERE user_id ='$user_id' AND  status_pay='paid' AND  is_delete='0' ORDER BY trip_id DESC";
                        // $sql = "SELECT * FROM  trips WHERE user_id ='$user_id' AND  status_pay='unpaid' AND  is_delete='1' ORDER BY trip_id DESC";

                        //   //shows trips or alert message
                        //   if($result = mysqli_query($link, $sql)){

                        //       if(mysqli_num_rows($result)>0){

                        //           while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        //               $origine = $row['departure'];
                        //               $destination = $row['destination'];
                        //               $pay_information = $row['pay_information'];
                        //               $nameofonerider = $row['nameofonerider'];
                        //               $distance = $row['distance'];
                        //               $duration = $row['duration'];
                        //               $price = $row['price'];
                        //               $status = $row['status_pay'];
                        //               $date = date('D d M, Y h:i', strtotime($row['date_payement']));
                        //               $trip_id = $row['trip_id'];
                                    
                        ?>
                        <tr>
                        
                            <td><?php //echo $origine ; ?></td>
                            <td><?php //echo $destination; ?></td>
                            <td><?php //echo "<strong>R</strong>".$price; ?></td>
                            <td><?php //echo $date; ?></td>
                            <td>
                                <?php 
                                // if($status == "paid") {
                                //     echo "
                                //          <span class=\"alert alert-success\">paid</span>
                                //     ";
                                // }
                                // else {
                                //     echo "<span class=\"alert alert-secondary\">Cancelled</span>";
                                // }
                                
                            ?>
                            </td>

                            <td>
                              <div class="btn-group" role="group" aria-label="Third group">
                                  <button type="button" class="btn btn-danger" data-toggle='modal' data-target='#edittripModal' data-trip_id='<?php echo $trip_id?>'>Delete</button>
                              </div>
                            </td>  
                        </tr>
                        <?
                        //       }
                        //     }else{
                        //         echo '<div class="alert alert-warning">You have not payment avalaible yet!</div>'. mysqli_error($link); exit;
                        //     }
                            
                        // }else{  
                        
                        //     echo '<div class="alert alert-warning">An error occured!</div>'; exit;
                        
                        // }
                    ?>                                                
                        
                    </tbody>
      </table>
 -->

 