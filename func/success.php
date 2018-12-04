<?php 

session_start();

include('notification_db.php');

// if (isset($_SESSION['user_id'])) {

// $user_id = $_SESSION['user_id'];

// //get username and email
// $sql = "SELECT * FROM users WHERE user_id='$user_id'";

// $result = mysqli_query($link, $sql);

// $count = mysqli_num_rows($result);

// if ($count == 1) {

// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

// $username = $row['username'];
// $mobile = $row['mobile'];
// $email = $row['email'];
// $profile = $row['profilepicture'];
// // $id = $row['user_id'];

// } 

// }
// $output = '';

  if(isset($_GET['trip_id']) && isset($_GET['user_id'])){
                        
                        $_SESSION['trip_id'] = $_GET['trip_id'];
                        $_SESSION['user_id'] = $_GET['user_id'];
                        
                        // var_dump($_SESSION['user_id']);
                        
                        // $date = date('Y-m-d h:i:s', time());
                        $query = "UPDATE trips SET status_pay='paid',payment='1',pay_information='successfully processed' WHERE trip_id='".$_SESSION['trip_id']."' AND user_id='".$_SESSION['user_id']."'";
                        
                        // $query = "INSERT INTO payement(`trip_id`,`payment_status`,`user_id`,`timestamp`) VALUES('".$_SESSION['trip_id']."','1','".$_SESSION['user_id']."','$date')";
                        
                        $result = $link->prepare($query);
                        $result->execute();
                        
                        // $output = '
                        
                    }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Success Payment Orange cabs</title>
    <meta charset="utf-8">

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>
    [type=reset], [type=submit], button, html [type=button] {
     -webkit-appearance: none; 
}
</style>

</head>

<style>

    @font-face {
    font-family: 'pt sans';
    font-style: normal;
    font-weight: normal;
    src: local('PT Sans'), local('PTSans-Regular'),
      url('pt_sans/PT_Sans-Web-Regular.ttf');  }

    h1, p { font-family:'pt sans';
           font-size:15px;  }

</style>

<body>

    <div class="jumbotron text-center">
        
       <h5 class="h4">Online Bookings / Your payment has been cancelled</h5>

    </div>

    <div class="container" >
    
                <div class="row text-center">
                    <?
                      
                    
                    ?>
                    <p>Your payment trip have been  placed!</p>
                    <p>Your payment for the trip have been successfully procesed!</p>
                    <p>You can view your order history by going to <a href="https://orangecabs.joburg/func/bookings.php?p=payment"class="text-danger"><b>payments<b></p>
                    <p>Thank you for travelling with us, good journey!</p>
                    <a href="https://orangecabs.joburg/func/bookings.php?p=mytrip" type="button" class="btn btn-outline-warning btn-lg"> <i class="fas fa-arrow-circle-left"></i>Back</a>
                </div>

    </div>

</body>

</html>

                



        