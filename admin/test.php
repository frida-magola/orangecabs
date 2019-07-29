    
    <div class="table-responsive">  
    <table class="table table-striped" id="datatable">
<thead>
                        <tr>
                        <th>Pick up point</th>
                        <th>Drop of point</th>
                        <th>Price/ Rand</th>
                        <th>Distance</th>
                        <th>Duration</th>
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
                            <td><?php echo $distance; ?></td>
                            <td><?php echo $duration. "'"; ?></td>
                            <td><?php echo $amountofriders; ?></td>
                            <td><?php echo $nameofonerider; ?></td>
                            <td><?php echo $date; ?></td>
                            <td>
                                <?php 
                                if($status == "unpaid") {
                                    echo "
                                         <span class=\"alert alert-warning\">Unpaid</span>
                                    ";
                                }
                                else {
                                    echo "<span class=\"alert alert-success\">Paid</span>";
                                }
                                
                            ?>
                            </td>

                            <td>
                              <div class="btn-group" role="group" aria-label="Third group">
                                  <button type="button" class="btn btn-success" data-toggle='modal' data-target='#edittripModal' data-trip_id='<?php echo $trip_id?>'>Edit</button>
                              </div>

                              <!-- <div class="btn-group" role="group" aria-label="Third group"> -->
                                  <div type="button"  data-trip_id='$trip_id'  id='paypal-button' data-user_id="<?php echo $user_id?>">Pay</div>
                              <!-- </div> -->
                            </td>  
                        </tr>
                        <?
                        }
                      }else{
                          echo '<div class="alert alert-warning">You have not history avalaible yet!</div>'. mysqli_error($link); exit;
                      }
                      
                  }else{  
                  
                      echo '<div class="alert alert-warning">An error occured!</div>'; exit;
                  
                  }
                    ?>                                                
                        
           </tbody>
    </table>
                </div>


                <tbody>
                            <?php
                            
                            //run a query to look for trips corresponding to user_id
                            $sql = "SELECT * FROM trips WHERE  trips.date >= DATE(NOW()) AND is_delete='0' AND car_id=0 ORDER BY trip_id DESC";

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
                            <?
                            }
                        }else{
                        }
                        
                    }else{  
                    
                        echo '<div class="alert alert-warning">An error occured!</div>'; exit;
                    
                    }
                        ?>                                                
                            
            </tbody>