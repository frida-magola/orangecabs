<?
session_start();
include('notification_db.php');
include('functions.php');

if (isset($_SESSION['user_id'])) {

    $output = '';

    $query = "SELECT * FROM content_notification 
    INNER JOIN users 
    ON content_notification.user_id = users.user_id
    ORDER BY content_id DESC";

    $statement = $link->prepare($query);
    $statement->execute();

    $result = $statement->fetchAll();
    $total_rows = $statement->rowCount();

    if($total_rows > 0){

        foreach ($result as $row) {

            $date = date('D d M, Y h:i',strtotime($row['date_add']));

            $like_button = '';

            if(!is_user_already_like_content($link,$_SESSION['user_id'],$row['content_id'])){

                $like_button = '
                
                
                
                ';
            }

            $count_like = count_content_like($link,$row['content_id']);
            $output .= '
                <div class="card">
                <div class="card-header">
                    <h6 class="h6">

                        <img src="'.$row['profilepicture'].'" class="img-thumbnail" width="40" height="40" /> 
                        By '.$row['username'].'

                        

                    </h6>

                    

                </div>

                <div class="card-body text-left">
                    <p style="margin-top: -1rem;margin-bottom: -1rem;">
                    <span>'.$row['description'].'</span>&nbsp; ,
                    <span class="text-right">'.$date.'</span></p>
  
                </div>

                <div class="card-footer text-muted text-right">
                    '.$like_button.'
                </div>
            </div>
            <br>
            ';
        }

    }else {
       $output = 'No one share something yet';
    }

    echo $output;
}


?>
<!-- <button type="button" class="btn btn-primary btn-sm like-button" style="padding:0;" name="like-button" data-content_id="'.$row['content_id'].'">
                    <i class="far fa-thumbs-up"></i>
                </button> -->
<!-- <button type="button" style="padding:0;" class="btn btn-warning btn-sm" name="total-like" id="total-like">&nbsp;
                        '.$count_like.'&nbsp;<i class="far fa-thumbs-up"></i>
                        </button> -->