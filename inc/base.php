<?php 
    session_start();
    include('./func/connection.php');
    
    //logout
    include('./func/logout.php');
    
    //remember me
    include('./func/rememberme.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">

    <title>Orange cabs</title>
    
</head>

<body>
   

    <?= $content; ?>

    <!-- login -->
    <form action="#" class="form" id="loginform">
        <div class="modal" id="login">
        <div class="modal__content">
                <div class="book">
                    <div class="book__form">
                        <a href="./" class="modal__close">&times;</a>
                        
                            <div class="u-margin-bottom-medium">
                                <h2 class="heading-secondary">
                                    Welcome back rider!
                                </h2>

                                <i class="far fa-user-circle"></i>
                            </div>

                            <div class="u-margin-bottom-small" id="messagelogin"></div>
                            <div class="form__group">
                                <div class="form__input-icon">
                                    <label for="loginmobile" class="form__label">Mobile number</label>
                                    <input type="text" class="form__input" placeholder="xxx xxx xxxx" id="loginmobile" name="loginmobile">
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    
                                </div>
                            </div>

                            <div class="form__group u-margin-bottom-medium">
                                <div class="form__input-icon">
                                    <label for="loginpassword" class="form__label">Password</label>
                                    <input type="password" class="form__input" placeholder="Password" id="loginpassword"
                                        name="loginpassword">
                                    <i class="fas fa-lock"></i>
                                    
                                </div>
                            </div>

                            <div class="form__group u-margin-top-small">
                                <p class="paragraph u-margin-bottom-medium">
                                    Forgot your password? &nbsp; <a href="#passwordforgoted" id="password-reset">click here</a> &nbsp; / &nbsp; <a href="#signup">Sign
                                        up?</a> &nbsp;   
                                       
                                </p>
                                
                            </div>

                            <div class="form__group">
                                <button class="btn btn--orange" id="loginButton">Ready, steady, go!</button>
                                <a href="./" class="btn btn--default  modal__cancel" role="button" id="cancellogin">Cancel</a>
                            </div>
                    </div>
                </div>
        </div>
        </div>
    </form>

    <!-- signup -->
    <form  action="#"  class="form"  id="signupform">
        <div class="modal" id="signup">
        <div class="modal__content">
                <div class="book">
                    <div class="book__form">
                        <a href="./" class="modal__close">&times;</a>
                        
                            <div class="">
                            <h2 class="heading-secondary">
                                Welcome new rider! <br><small>Register with us:</small>
                                
                            </h2>

                            </div>
                            <div class="u-margin-bottom-small" id="messagesignup"></div>
                            <div class="form__group">
                                <div class="form__input-icon">
                                <label for="username" class="form__label">Username</label>
                                    <input type="text" class="form__input" placeholder="Username" id="username" name="username">
                                    
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                    
                                </div>
                            </div>

                            <div class="form__group">
                                <div class="form__input-icon">
                                    <label for="mobile" class="form__label">Contact number</label>
                                    <input type="text" class="form__input" placeholder="Contact number" id="mobile" name="mobile"
                                    >
                                    <i class="fas fa-phone"></i>
                                    
                                </div>
                            </div>

                            <div class="form__group">
                                <div class="form__input-icon">
                                    <label for="email" class="form__label">Your email address</label>
                                    <input type="text" class="form__input" placeholder="Email address" id="email" name="email"
                                    >
                                    <i class="fas fa-envelope"></i>
                                    
                                </div>
                            </div>

                            <div class="form__group">
                                <div class="form__input-icon">
                                     <label for="password" class="form__label">Password</label>
                                    <input type="password" class="form__input" placeholder="Password" id="password" name="password"
                                    >
                                    <i class="fas fa-lock"></i>
                                    
                                </div>
                            </div>

                             <div class="form__group u-margin-top-medium">
                                <p class="paragraph u-margin-bottom-small">
                                     Already register? &nbsp; <a href="#login" id="">Log In</a> 
                                 </p>
                                
                             </div>

                            <div class="form__group">
                                <input type="submit" class="btn btn--orange" id="signupButton" name="signupButton" value="Click to book your ride">
                                <a href="./" class="btn btn--default  modal__cancelsignup" role="button" id="cancelsignup">Cancel</a>
                            </div>
                       
                    </div>
                </div>
        </div>
        </div>
    </form>

    
    <!-- forgot password -->

    <form action="#" class="form"  id="forgotpasswordform">
        <div class="modal" id="passwordforgoted">
                    <div class="modal__content">
                                    <div class="book">
                                        <div class="book__form">
                                            <a href="./" class="modal__close">&times;</a>

                                <div class="u-margin-bottom-medium">
                                        <h2 class="heading-secondary">
                                            Forgot Password?!
                                        </h2>
        
                                        <i class="far fa-user-circle"></i>
                                </div>

                                <div class="u-margin-bottom-small" id="messageforgotpassword"></div>
            
                            
                                    <div class="form__group">
                                <div class="form__input-icon">
                                <label for="forgotpassword" class="form__label">Email Address</label>
                                    <input type="text" class="form__input" placeholder="Enter your email address" id="forgotpassword"
                                        name="forgotpassword">
                                    <i class="fas fa-envelope"></i>
                                    
                                </div>

                            <div class="form__group u-margin-top-medium">
                                    <p class="paragraph u-margin-bottom-medium">
                                        Log In? &nbsp; <a href="#login" id="">click here</a> &nbsp; / &nbsp; <a href="#signup">Sign
                                            up?</a>
                                    </p>
                                    
                                </div>
        
                            <div class="form__group">
                                <input type="submit" class="btn btn--orange" value="Submit" name="forgotemailsub" id="forgotemailsub">
                                <a href="./" class="btn btn--default  modal__cancelforgotpass" role="button" id="cancelforgot">Cancel</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- jquery scripts -->
    
    <script src="src/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="func/index.js"></script>


</body>

</html>