<?php

session_start();
include("../func/notification_db.php");
// include("connection.php");
include("../func/functions.php");

$output = '';

$query = "SELECT * FROM users
WHERE user_id != '".$_SESSION['user_id']."' ORDER BY role DESC";



$statement = $link->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


$output = '
    <table class="table table-bordered table-striped">
        <tr>
            <td>Username</td>
            <td>Role</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
';

foreach($result as $row){

    $status = '';

    $current_timestamp = strtotime(date('Y-m-d H:i:s') . '-10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

    // $user_activity_status = fetch_user_last_activity_status($row['user_id'],$link);
    $user_last_activity = fetch_user_last_activity($row['user_id'],$link);

    if($row['is_connect'] == '1'){
        $status= '
            <span class="badge badge-success" style="font-size:.5rem;">
            <i class=""></i>online</span>          
        ';  
    }else{
        $status= '
            <span class="badge badge-danger" style="font-size:.5rem;">
            <i class="" ></i>offline</span>
        '; 
        
    }
    $output .= '
    
        <tr>
            <td>'.$row['username'].' '.count_unseen_message($row['user_id'],$_SESSION['user_id'],$link).' '.fetch_is_type_status($row['user_id'],$link).'</td>
            <td>'.$status.'</td>
            <td>'.$row['role'].'</td>
            <td>
               <a type="button" class="btn btn-info btn-xs start-chat"
               data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start chat</a>
            </td>
        </tr>
    ';

}

$output .='</table>';
echo $output

?>