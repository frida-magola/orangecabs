<?
// include('connection.php');
    function is_user_already_like_content($link,$user_id,$content_id){
        $query = "SELECT * FROM user_content_like 
        WHERE content_id = :content_id
        AND user_id = :user_id";

        $statement = $link->prepare($query);

        $statement->execute(
            array(
                ':content_id' => $content_id,
                ':user_id' => $user_id
            )
        );
        $total_rows = $statement->rowCount();
        if($total_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    function count_content_like($link,$content_id){
        $query = "SELECT * FROM user_content_like 
        WHERE content_id = :content_id";

        $statement = $link->prepare($query);
        $statement->execute(
            array(
                ':content_id' => $content_id
            )
        );
        $total_rows = $statement->rowCount();
        return $total_rows;
    }

    function fetch_user_last_activity($user_id,$connection){
        $query = "SELECT * FROM login_details WHERE user_id='$user_id' ORDER BY last_activity DESC LIMIT 1
        ";
        $statement = $connection->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        foreach($result as $row){
            return $row['last_activity'];
        }
    
    }

    function fetch_user_chat_history($from_user_id,$to_user_id,$connect){
        $query ="SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."')
        OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."') 
        ORDER BY timestamp DESC";

        $statement = $connect->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();
        $output = '';
        // $output = "<ul class='list-group list-group-flush'>";
        foreach($result as $row){
            $user_name = '';
            if($row["from_user_id"] !== $from_user_id){

                $user_name = '<b class="text-danger">'
                .get_user_name($row['from_user_id'],$connect).
                '</b>';
                $output .= '

                    <div class="chatbox chatboxme" style="background-color:#ffffe6;">
                        <div class="arrow">
                            <div class="outer"></div>
                            <div class="inner"></div>
                        </div>
                        <div class="message-body">
                            <p>
                            '.$user_name.' - '.$row['chat_message'].'
                                <div class="text-right">
                                    - <small><em>'.$row['timestamp'].'</em></small>
                                </div>
                            </p>
                            
                        </div>
                        <br>
                    </div>
                
            ';
            }
            else{
                $user_name = '<b class="text-success">You</b>';
                $output .= '

                    <div class="chatbox chatboxHe" style="background-color:#ffe6e6;">
                        <div class="arrow">
                            <div class="outer"></div>
                            <div class="inner"></div>
                        </div>
                        <div class="message-body">
                            <p>
                            '.$user_name.' - '.$row['chat_message'].'
                                <div class="text-right">
                                    - <small><em>'.$row['timestamp'].'</em></small>
                                </div>
                            </p>
                            
                        </div>
                        
                    </div>
                    <br>
                
            ';  

            }

        }
        // $output .= '</ul>';

        $query = "UPDATE chat_message SET status = '0'
        WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."'
        AND status = '1'";
        $statement = $connect->prepare($query);
        $statement->execute();

        return $output;
    } 

    function get_user_name($user_id,$connect){
       $query = "SELECT username FROM users WHERE user_id='$user_id'";
       $statement = $connect->prepare($query);
       $statement->execute();
       $result = $statement->fetchAll();

       foreach ($result as $row) {
           return $row['username'];
       }
    }

      //notification
    function count_unseen_message($from_user_id,$to_user_id,$connect){
        $query = "SELECT * FROM chat_message WHERE from_user_id = '$from_user_id'
        AND to_user_id = '$to_user_id' AND status = '1'";

        $statement = $connect->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        $output = '';
        if($count > 0){
            $output = '<span class="badge badge-warning">'.$count.'</span>';
        }
        return $output;
    }

    function  fetch_is_type_status($user_id,$connect){
        $query = "SELECT is_type FROM login_details WHERE user_id ='".$user_id."' ORDER BY last_activity DESC LIMIT 1";

        $statement = $connect->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();
        $output = '';
        foreach ($result as $row) {
            if($row["is_type"] == 'yes'){

                $output = ' - <small><em>
                <span class="text-muted">Typing...</span></em></small>';
            }
        }
        return $output;
    }
?>