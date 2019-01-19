<?
    session_start();
    // include('notification_db.php');
    include('connection.php');
    $user_id = $_SESSION['user_id'];
    // var_dump(link);
    $missingDescription = "<p><strong>Please type something!</strong></p>";
    $error = '';

    if(empty($_POST['description'])){

        $error .= $missingDescription;

    }else{
        $description = filter_var($_POST['description'],FILTER_SANITIZE_STRING); 
    }

    if($error){
        $resulMessage = "<div class='alert alert-danger'>$error</div>";
        exit;
    }

    // $description = $_POST['description'];
    $description = mysqli_real_escape_string($link,$_POST['description']);
   

    $date = date('Y-m-d H:i:s', time());
    $sql = "INSERT INTO content_notification(`user_id`,`description`,`date_add`) 
    VALUES('$user_id','$description','$date')";

    $statement = mysqli_query($link,$sql);
    // $statement->excute();

    // $result = $statement->fetchAll();

    if(!$statement){
        echo "<div class='alert alert-danger'>Your message can't be sent try later!</div>";
        
    }
    echo "<div class='alert alert-info'>Your message have been sent!</div>";


?>