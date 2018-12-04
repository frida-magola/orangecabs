<?php

session_start();
include("notification_db.php");
// include("connection.php");
include("functions.php");

$output = '';

$query = "SELECT * FROM users
WHERE user_id != '".$_SESSION['user_id']."' AND role ='admin'";

$statement = $link->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

// $output = '
//     <table class="table table-bordered table-striped" style="">
//         <tr>
//             <td>Username</td>
//             <td>Status</td>
//             <td>Action</td>
//         </tr>
// ';



foreach($result as $row){

    $status = '';

    $current_timestamp = strtotime(date('Y-m-d H:i:s') . '-10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

    // $user_activity_status = fetch_user_last_activity_status($row['user_id'],$link);
    $user_last_activity = fetch_user_last_activity($row['user_id'],$link);

    if($row['is_connect'] == 1){
        $status = '
            <span class="badge badge-success" style="font-size:.5rem;">
            <i class=""></i>online</span>          
        ';  
    }else{
        $status = '
            <span class="badge badge-danger" style="font-size:.5rem;">
            <i class=""></i>offline</span>
        '; 
        
    }
    $output .= '
        <div class="card-header">
            <p> Online Support Orange cabs '.count_unseen_message($row['user_id'],$_SESSION['user_id'],$link).' '.fetch_is_type_status($row['user_id'],$link).' <span>'.$status.'&nbsp;&nbsp;</span><i class="fas fa-times" id="close-chat"></i></p>
    
        </div>
            <div class="card-body text-center">
                <p>
                <a type="button" class="btn btn-info btn-lg start-chat"
                data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start chat</a>
                </p>
            </div>

    ';

}

$output .='</table>';
echo $output;

?>