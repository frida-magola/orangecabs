<?
    include('../func/connection.php');

    $user_id = $_POST['user_id'];

    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    
    $result = mysqli_query($link,$sql);
    
    if(!$result){
    
        echo "errors";
    }
    else{
    
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
        //encode this $row array in json data and to send it ajax
        echo json_encode($row);
    }

?>
 