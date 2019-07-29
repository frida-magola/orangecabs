<?php 
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
    $p = 'users';
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h4">Displaying all users registed</h5>

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
                        <th>Connect</th>
                        <th>Action</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                        $sql = "SELECT * FROM `users` WHERE role='rider' ORDER BY user_id DESC";

                        if($result = mysqli_query($link, $sql)){

                            if(mysqli_num_rows($result)>0){

                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $mobile = $row['mobile'];
                                    $email = $row['email'];
                                    $is_connect= $row['is_connect'];
                                    $verify = $row['verify'];
                                    $profile = $row['profilepicture'];
                                    
                        ?>
                        <tr>
                            <td>
                                <? 
                                    if($profile !==''){
                                        echo "<img src=\"$profile\" alt=\"profile user\" class=\"carpicturetable\">";
                                    }else{
                                        echo "<img src=\"profilepicture/useravater.png\" alt=\"profile user\" class=\"carpicturetable\">";
                                    }
                                
                                ?>
                            </td>
                            <td><?php echo $username ; ?></td>
                            <td><?php echo $mobile; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>
                                <?php 
                                if($verify == "0") {
                                    echo "
                                         <a class=\"badge badge-warning\">Pending</a>
                                    ";
                                }
                                else {
                                    echo "<a class=\"badge badge-success\">active</a>";
                                }
                                
                                ?>
                            </td>

                            <td>
                                <? if($is_connect == 1){
                                    echo  "<span class='badge badge-success'>online</span>";
                                    }
                                    else{
                                        echo "<span class='badge badge-danger'>offline</span>";
                                    }
                                ?>
                            </td>

                            <td>
                                
                                <?
                                    if($verify == '0'){
                                        echo "
                                            <i class='far fa-trash-alt  editmode btn-outline-danger'
                                            data-toggle='modal' data-target='#deleteuserModal' data-user_id='$user_id'></i>
                                        ";
                                    }elseif($verify == '1'){
                                        echo "
                                            <i class='far fa-trash-alt  editmode btn-outline-danger' disabled
                                            data-toggle='modal' data-target='#deleteuserModal' data-user_id='$user_id'></i>
                                        ";
                                    }
                                ?>
                                
                                <i class="fas fa-info-circle  editmode btn-outline-warning "  
                                data-toggle="modal" data-target="#infouser" id="moreinfo" data-user_id="<?php echo $user_id ;?>"></i>

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

 


