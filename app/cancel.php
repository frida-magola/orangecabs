<?php 

include('../func/connection.php');

  if(isset($_GET['trip_id']) && isset($_GET['user_id'])){
      
      $trip_id = $_GET['trip_id'];
      $userId = $_GET['user_id'];
      $date = date('Y-m-d h:i:s', time());
    $sql = "UPDATE trips SET status_pay='cancel',cancel_date='$date' WHERE trip_id='$trip_id' AND user_id='$userId' ";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo json_encode('error');   
    }
    echo json_encode('ok');
        
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cancel Payment Orange cabs</title>
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
        
       <h5 class="h4">Your payment has been cancelled</h5>

    </div>

    <div class="container" >
                <div class="row text-center">

                    <div class="col-md-12">
                        <p>You have successfully cancelled the payment on your order.</p>
                    <p>Thanks for visiting us!</p><br>
                   <!--<a href="https://orangecabs.joburg/func/bookings.php?p=payment" type="button" class="btn btn-outline-warning btn-lg"> <i class="fas fa-arrow-circle-left"></i>Back</a>-->
                    </div>
                </div>

    </div>

</body>

</html>

