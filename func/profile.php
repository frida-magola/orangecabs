<?php 

session_start();

include('connection.php');
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
// $id = $row['user_id'];

// $_SESSION['username'] = $username;
// $_SESSION['mobile'] = $mobile;
// $_SESSION['email'] = $email;
// $_SESSION['profile'] = $profile;
// $_SESSION['id_user'] = $id;

} 

}
$p='profile';
?>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h5 class="h4">Online Bookings / Profile Settings</h5>
                </div>
                <div class="row">
                 <div class="col-md-6">
                    <!-- upload picture -->
                    <h6 class="heading-secondary">Change your profile picture</h6>
                    <form action="#" class="form" id="profilepictureform" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col profile">

                                <?php 
                                    if(!isset($profile)){

                                        echo "<img src='profilepicture/useravater.png' alt='Photo user' class='popup__img'>";
                                    
                                    }else{

                                        echo "<img src='$profile' class='popup__img' id='imagePreview'>";
                                    }
                                ?>
                            </div>

                            <div class="col">

                                <!-- message alert -->
                                <div id="updatepicturemessage"></div> 
                                
                                <div class="form-group">
                                    
                                    <label class="form-label" for="picture">Select a picture</label>
                                    <input type="file" class="" id="picture" placeholder="upload new picture" name="picture">
                                    <!-- <i class="fas fa-cloud-upload-alt icon-uploadpicture"></i> -->
                                </div>
                                

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="upload" value="Upload">
                                </div>
                            </div>
                        </div>
                        

                        
                    </form>     
                </div>

                <div class="col-md-6" id="profilemargin">

                    <div class="profile-content">
                        <div class="popup__right">
                            <h4 class="heading-secondary u-margin-bottom-small"></h4>
                            <h3 class="heading-tertiary u-margin-bottom-small"></h3>
                            <div class="popup__text">
                                <table class="table table-striped">
                                    <tr>
                                        <td>Username&nbsp; &nbsp;</td>
                                        <td id="usernamereload">
                                            <?php echo $username;?>
                                        </td>
                                        <td>
                                        &nbsp; &nbsp;<i class="fas fa-pencil-alt editmode btn-outline-success" 
                                            data-toggle="modal" data-target="#updateusernameModal" id="edit" data-user_id="<?php echo $user_id ;?>"></i>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Contact Number&nbsp;&nbsp;</td>
                                        <td>
                                            <?php echo $mobile;?>
                                        </td>
                                        <td>
                                        &nbsp;&nbsp;<i class="fas fa-pencil-alt editmode btn-outline-success" 
                                            data-toggle="modal" data-target="#updatecontactnumberModal" id="edit" data-user_id="<?php echo $user_id ;?>"></i>
                                            
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Address Mail&nbsp;&nbsp;</td>
                                        <td>
                                            <?php echo $email;?>
                                        </td>
                                        <td>
                                        &nbsp;&nbsp;<i class="fas fa-pencil-alt editmode btn-outline-success" 
                                            data-toggle="modal" data-target="#updateemailModal" id="edit" data-user_id="<?php echo $user_id ;?>"></i>
                                            
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td>Password&nbsp; &nbsp;</td> 
                                        <td type="password">
                                           Hidden
                                        </td>
                                        <td>
                                        &nbsp;&nbsp;<i class="fas fa-pencil-alt editmode btn-outline-success" 
                                            data-toggle="modal" data-target="#updatepasswordModal" id="edit" data-user_id="<?php echo $user_id ;?>"></i>
                                    </tr>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        