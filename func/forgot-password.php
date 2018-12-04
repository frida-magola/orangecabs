<?php 

session_start();

include('connection.php');

//Load Composer's autoloader
require '../PHPMailerAutoload.php';
require '../credential.php';

$missingEmail ='<p><strong>Please enter your email address!</strong></p>';
$invalideEmail ='<p><strong>Please enter a valid email address!</strong></p>';

$errors='';

//get email
if(empty($_POST["forgotpassword"])){
    
    $errors .= $missingEmail;
//    var_dump($errors);

}else{
    
    $email = filter_var($_POST["forgotpassword"], FILTER_SANITIZE_EMAIL);
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        
       $errors .= $invalideEmail; 
//        var_dump($errors);

    }
}

//<!--    if there are any errors prints errors-->
if($errors){
    
    echo $resultMessage = '<div class="alert danger">'.$errors.'</div>';
    
    exit;
    
}

//<!--no errors-->   
 //<!--    prepare variables for the queries-->
$email = mysqli_real_escape_string($link, $email);

 //<!--        if email exists in the users tables print error-->
$sql_email = "SELECT * FROM users WHERE email='$email'";
    
$result = mysqli_query($link,$sql_email);

if(!$result){
    
    echo '<div class="alert danger">Error running the query!</div>';
    
    echo '<div class="alert danger"> "'.mysqli_error($link).'"</div>';
    
    exit;
}

$count = mysqli_num_rows($result);

//if the email does not exist 
    //print error message
if($count != 1){
    
    echo '<div class="alert info">That Email address does not exist on our database!</div>';
    exit;
}

//else
    //get the user_id
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$user_id = $row['user_id'];

//create a unique activation code
 $rand_opt = substr(str_shuffle("0123456789"), 0, 5);
    
$key = password_hash($rand_opt, PASSWORD_DEFAULT);

//Insert user details and activation code in the forgotpassword table
$time = time();
$status = 'pending';
$sql = "INSERT INTO forgotpassword(`user_id`,`activation_key`,`time`,`status`) VALUES('$user_id', '$key', '$time', '$status')";

$result = mysqli_query($link,$sql);
if(!$result){
    
    echo '<div class="alert danger">There was an error inserting the users details in the database!</div>';
    echo '<div class="alert danger">"'.mysqli_error($link).'"</div>';
    exit;
}

//send email with link to resetpassword.php with user id and activation code
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

    $mail->Subject = 'Reset your password';
    $mail->Body = "<div style='alert success'>
 
Your one time password is. $rand_opt, Enter this OPT to activate your account <br>
 http://localhost/orangecabs/func/resetpassword.php?user_id=$user_id.&key=$key
                
 </div>";

    $mail->AltBody = $message;

    if (!$mail->send()) {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;

    } else {

        echo "<div class='alert success'>An Email has been sent to $email. Please Click on the link to <a href=\"http://localhost/orangecabs/func/resetpassword.php?mobile=". urlencode($user_id)."&key=$key\" class=\"activate-link\">reset your password</a>.</div>";
    }


?>