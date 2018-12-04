<?
if(isset($_POST['view'])){
 
    include('connection.php');
     
    if($_POST["view"] != '')
     
    {
       $update_query = "UPDATE notification SET comment_status = 1 WHERE comment_status=0";
       mysqli_query($link, $update_query);
    }
     
    $query = "SELECT * FROM notification ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($link, $query);
    $output = '';
     
    if(mysqli_num_rows($result) > 0)
    {
     
    while($row = mysqli_fetch_array($result))
     
    {
     
      $output .= '
      <li>
      <a href="#">
      <strong>'.$row["subject"].'</strong><br />
      <small><em>'.$row["comment"].'</em></small>
      </a>
      </li>
     
      ';
    }
    }
     
    else{
        $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
    }
     
    $status_query = "SELECT * FROM notification WHERE comment_status=0";
    $result_query = mysqli_query($link, $status_query);
    $count = mysqli_num_rows($result_query);
     
    $data = array(
       'notification' => $output,
       'unseen_notification'  => $count
    );
     
    echo json_encode($data);
    }


?>