<?php 
    session_start();
    // require '../vendor/autoload.php';
    
    // $options = array(
    //     'cluster' => 'ap2',
    //     'useTLS' => true
    //   );
    //   $pusher = new Pusher\Pusher(
    //     'e1e80d38733737333bbb',
    //     '493b0ba94c72df780682',
    //     '650569',
    //     $options
    //   );
    
    //   $data['message'] = 'hello world';
    //   $pusher->trigger('my-channel', 'my-event', $data);
    
    
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
    $p = 'drivers';
?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h4">Displaying all drivers registed</h5>
  </div> 
            <div class="table-responsive">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                        $sql = "SELECT * FROM users WHERE role='driver' OR role='2' ORDER BY user_id DESC";

                        if($result = mysqli_query($link, $sql)){

                            if(mysqli_num_rows($result)>0){

                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $mobile = $row['mobile'];
                                    $email = $row['email'];
                                    $role = $row['role'];
                                    $verify = $row['verify'];
                                    $profile = $row['profilepicture'];
                                    
                        ?>
                        <tr>
                            <td>
                                <a href="#updateDriverPictureModal" data-toggle="modal" data-user_id="<?php echo $user_id ;?>">
                                    <img src="<?php echo $profile ; ?>" alt="profile driver" class="carpicturetable">
                                </a>
                            </td>
                            <td><?php echo $username ; ?></td>
                            <td><?php echo $mobile; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>
                                <?php 
                                if($verify == "0") {
                                    echo "
                                         <a class=\"badge badge-warning btn-small\">Pending</a>
                                    ";
                                }
                                else {
                                    echo "<a class=\"badge badge-success btn-small\">active</a>";
                                }
                                
                            ?>
                            </td>

                            <td>
                                <i class="fas fa-pencil-alt editmode btn-outline-success" 
                                data-toggle="modal" data-target="#editdriverModal" id="edit" data-user_id="<?php echo $user_id ;?>"></i>

                                <i class="far fa-trash-alt  editmode btn-outline-danger" 
                                data-toggle="modal" data-target="#deletedriverModal" id="delete" data-user_id="<?php echo $user_id ;?>"></i>
                                
                                <i class="fas fa-info-circle  editmode btn-outline-warning " 
                                data-toggle="modal" data-target="#infodriver" id="moreinfo" data-user_id="<?php echo $user_id ;?>">
                                
                            </i>


                            </td>  
                        </tr>
                        <?
                        }
                        }
                        }
                    ?>                                                
                        
                    </tbody>
                </table>
            </div>


