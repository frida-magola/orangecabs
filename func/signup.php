<?php

//<!--start session-->
session_start();

//<!--connect to the database-->
include('connection.php');

//Load Composer's autoloader
require '../PHPMailerAutoload.php';
require '../credential.php';

//
//<!--check user inputs-->
//<!--    define error messages-->
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
$missingmobile = '<p><strong>Please enter your mobile number!</strong></p>';
$invalidemobile = '<p><strong>Invalid number, your number should have 10 numbers no letters!</strong></p>';
$missingPassword = '<p><strong>Please enter a password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password!</strong></p>';

$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalideEmail = '<p><strong>Please enter a valid email address!</strong></p>';


$errors = '';
$password = '';
$password2 = '';

//<!--    get username,mobile,password,password2-->
//<!--    store errors in errors variables-->


//get username
if (empty($_POST["username"])) {

    $errors .= $missingUsername;
//    var_dump($errors);

} else {

    $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}


//get number
if (empty($_POST["mobile"])) {

    $errors .= $missingmobile;
//    var_dump($errors);

} elseif (!preg_match('#^[0-9]{10}#', $_POST["mobile"])) {
    $errors .= $invalidemobile;

} else {

    $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);

}

//get email
if (empty($_POST["email"])) {

    $errors .= $missingEmail;
//    var_dump($errors);

} else {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors .= $invalideEmail; 
//        var_dump($errors);

    }
}

//get passwords
if (empty($_POST["password"])) {

    $errors .= $missingPassword;

} elseif (!(strlen($_POST["password"]) >= 6 and preg_match('/[A-Z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"]))) {

    $errors .= $invalidPassword;

} else {

    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
}

// if(empty($_POST["password2"])){
        
//         $errors .=$missingPassword2;

// }else{
        
//     $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
    
//     if($password !== $password2){
            
//     $errors .= $differentPassword;

// }
              
// }

//<!--    if there are any errors prints errors-->
if ($errors) {

     $resultMessage = '<div class="alert danger">' . $errors . '</div>';
     echo $resultMessage;
    exit;

} 

//<!--no errors-->   
 //<!--    prepare variables for the queries--> 
    $user = mysqli_real_escape_string($link, $user);

    $mobile = mysqli_real_escape_string($link, $mobile);

    $email = mysqli_real_escape_string($link, $email);

    $password = mysqli_real_escape_string($link, $password);
     
 //128 bits ->32 characters
 //$password = md5($password);
     
 ////256 bits ->64 characters
    $password = hash('sha256', $password);
 
     
     // if username exists in the users table print error

    $sql = "SELECT * FROM users WHERE username = '$user'";


    $result = mysqli_query($link, $sql);
    
    if (!$result) {

        echo '<div class="alert danger"> Error running the query!</div>';

        echo '<div class="alert danger"> "' . mysqli_error($link) . '"</div>';

        exit;

    }
    $results = mysqli_num_rows($result);

    if ($results) {

        echo '<div class="alert info">That username is already registed.Do you want to log in? </div>';
        exit;
    }
     
 //<!--    if mobile number exists in the users table print error-->    
    $sql = "SELECT * FROM users WHERE mobile = '$mobile'";

    $result = mysqli_query($link, $sql);

    if (!$result) {

        echo '<div class="alert danger"> Error running the query!</div>';

        echo '<div class="alert danger"> "' . mysqli_error($link) . '"</div>';

        exit;
    }
    $results = mysqli_num_rows($result);

    if ($results) {

        echo '<div class="alert info">That mobile number is already registed.Do you want to log in? </div>';
        exit;
    }
        
  //<!--        if email exists in the users tables print error-->
    $sql_email = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($link, $sql_email);

    if (!$result) {

        echo '<div class="alert danger">Error running the query!</div>';

        echo '<div class="alert danger"> "' . mysqli_error($link) . '"</div>';

        exit;
    }

    $results = mysqli_num_rows($result);

    if ($results) {

        echo '<div class="alert info">That Email address is already registed. Do you want to log in?</div>';
        exit;
    }
 //create a unique activation code
    $rand_opt = substr(str_shuffle("0123456789"), 0, 5);

    $opt_store = password_hash($rand_opt, PASSWORD_DEFAULT);
     
    //insert user details and activation code in the users table
    $sql = "INSERT INTO users(`username`,`mobile`,`email`,`opt_hash`,`password`) VALUES('$user','$mobile','$email','$opt_store','$password')";

    $result = mysqli_query($link, $sql);

    if (!$result) {

        echo '<div class="alert warning">There was an error inserting the users details in the database!</div>';

        echo '<div class="alert warning">"' . mysqli_error($link) . '"</div>';

        exit;

    }
    $message = 'Confirm registration';

    $mail = new PHPMailer;
 
 // $mail->SMTPDebug = 2;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom(EMAIL, 'Orange cabs');
    $mail->addAddress($email);     // Add a recipient

    $mail->addReplyTo(EMAIL);
 // $mail->addCC('cc@example.com');
 // $mail->addBCC('bcc@example.com');
 
 // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Confirm your Registration';
    $mail->Body = "<div class='alert success'>
 
    Thanks for signing up with orangecabs, your one time password is. <b>$rand_opt </b> Enter this OPT to activate your account <br>
    or <p>Click on the link Below:</>
    http://localhost/orangecabs/func/activate.php?email=" . urlencode($email) . "&key=$opt_store" . "&mobile=$mobile
                
 </div>";
    $mail->AltBody = $message;

    if (!$mail->send()) {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;

    } else {

        echo "<div class='alert success'>Thank you for your registring! A confirmation OPT has been sent to $email. Please Click on <a href=\"http://localhost/orangecabs/func/activate.php?mobile=" . urlencode($mobile) . "&key=$opt_store\" class=\"activate-link\">Activate your account.</a>to  Please Enter on the activation OPT to activate your account.</div>";
    }

?>