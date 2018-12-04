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

$p='viewtrip';
?>

<script language="JavaScript" type="text/javascript">

function click_f614bc6458f2c5ba0ef9d8317bbed0da( aform_reference ) {
            var aform = aform_reference;
            aform['amount'].value = Math.round( aform['amount'].value*Math.pow( 10,2 ) )/Math.pow( 10,2 );
            aform['custom_amount'].value = aform['custom_amount'].value.replace( /^\s+|\s+$/g,"" );
            if( !aform['custom_amount'].value || 0 === aform['custom_amount'].value.length || /^\s*$/.test( aform['custom_amount'].value ) ) {
                alert ( 'An amount is required' );
                return false;
            }
            aform['amount'].value = Math.round( aform['custom_amount'].value*Math.pow( 10,2 ) )/Math.pow( 10,2 );
}

</script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h5 class="h4">Online Bookings / Recent  Bookings</h5>
</div>
    
   <div class="container datatableContent">
   <table class="table-striped datatable" >
                    <thead>
                        <tr>
                        <th>Pick up point</th>
                        <th>Drop of point</th>
                        <th>Price/ Rand</th>
                        <th>Distance Duration</th>
                        <th>Amount of riders</th>
                        <th>Name of one rider</th>
                        <th>Date & time pickup</th>
                        <th>Status pay</th>
                        <th>Pay</th>
                        <th>Actions</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        //run a query to look for notes corresponding to user_id
                        $sql = "SELECT * FROM trips WHERE user_id ='$user_id' AND trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

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
                                      $user_id = $row['user_id'];
                                    
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

                               <form action="https://www.payfast.co.za/eng/process" name="form_f614bc6458f2c5ba0ef9d8317bbed0da" onsubmit="return click_f614bc6458f2c5ba0ef9d8317bbed0da( this );" method="post">
                                    <input type="hidden" name="cmd" value="_paynow">
                                    <input type="hidden" name="receiver" value="13334945">
                                    <input type="hidden" name="item_name" value="Pay Now And Make Your Trip / Orange cabs">
                                    <input type="hidden" name="amount" value="<?php echo $price?>">
                                    <input type="hidden" name="item_description" value="">
                                    <input type="hidden" name="return_url" value="https://orangecabs.joburg/func/success.php?trip_id=<?echo $trip_id;?>&user_id=<?echo $user_id;?>">
                                    <input type="hidden" name="cancel_url" value="https://orangecabs.joburg/func/cancel.php?trip_id=<?echo $trip_id;?>&user_id=<?echo $user_id;?>">

                                    <table>
                                    <!--<tr><td><font color="red">*</font>&nbsp;Price</td><td><input type="text" name="custom_amount" class="pricing" value="52.80"></td></tr>-->
                                    <tr><td colspan=2 align=center><input type="image" src="https://www.payfast.co.za/images/buttons/light-small-paynow.png" width="165" height="36" alt="Pay Now" title="Pay Now with PayFast"></td></tr></table>
                                    </form> 

                            </td> 

                            <td>

                             &nbsp; <i class="fas fa-pencil-alt editmode btn-outline-success" 
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




