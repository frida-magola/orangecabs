<?php 
    // session_start();

    session_start();

    include('../func/connection.php');
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
    
    $_SESSION['username'] = $username;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['email'] = $email;
    $_SESSION['profile'] = $profile;
    
    } else {
    
    echo "There was an error retrieving the username and email from the database!";
    
    }
    
    }

    $p = 'madmin';

//count users registed
    $sql = "SELECT COUNT(*) FROM users";
    $resultuser = mysqli_query($link,$sql);
    $rows_users = mysqli_fetch_row($resultuser);
    // return $rows[0];
    $number_of_users = $rows_users[0];

    //count bookings
    $sqluser = "SELECT COUNT(*) FROM trips";
    $result = mysqli_query($link,$sqluser);
    $rows = mysqli_fetch_row($result);
    // return $rows[0];
    $number_of_bookings = $rows[0];

    //count chat
    $sqlchat = "SELECT COUNT(*) FROM chat_message";
    $result = mysqli_query($link,$sqlchat);
    $rows = mysqli_fetch_row($result);
    // return $rows[0];
    $number_of_chat = $rows[0];

    $sqlhistory = "SELECT COUNT(*) FROM history_book";
    $result = mysqli_query($link,$sqlhistory);
    $rows = mysqli_fetch_row($result);
    // return $rows[0];
    $number_of_history = $rows[0];
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h4">Maps</h5>
          </div>
                <div class="row adminbox">
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body bookmonthly">
                          <i class="far fa-grin"></i>
                          <h5>Graph Book</h5>
                          <h3 class="count"><?=$number_of_history;?></h3>
                          <a href="?p=graphbook" class="btn btn-warning">View</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body ridersbook">
                          <i class="fas fa-user-edit"></i>
                          <h5>Book Riders</h5>
                          <h3 class="count"><?=$number_of_bookings;?></h3>
                          <a href="?p=riders" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body users">
                          <i class="fas fa-users"></i>
                          <h5>Users</h5>
                          <h3 class="count"><?=$number_of_users;?></h3>
                          <a href="?p=users" class="btn btn-warning">View</a>
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body chat">
                            <i class="far fa-comments"></i>
                            <h5>Chat</h5>
                            <h3 class="count"><?=$number_of_chat;?></h3>
                            <a href="?p=chat" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>

                </div>

                  
                <div class="row" style="">
                    <div id="map" style="width:100%;height:400px;"></div>
                </div>
