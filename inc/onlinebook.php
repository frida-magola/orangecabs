<?php $p = 'onlinebookings'; include('header.php');?>
        <main id="main-content">
                        <!-- Online Bookings -->
                        <section class="section-pg" id="onlinebookings">
                        
                            <div class="banner">
                                <img src="./src/images/online-booking.jpg" alt="aboutus">
                            </div>
                        <form action="#" class="form" id="loginform">       
                            <div class="row">
                                <div class="col-2-of-3">
                                    
                                <div class="u-margin-bottom-medium">
                                <h2 class="heading-secondary">
                                    Welcome back rider!
                                </h2>

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
                                        up?</a> 
                                </p>
                                
                            </div>

                            <div class="form__group">
                                <button class="btn btn--orange" >Ready, steady, go!</button>

                            </div>
                                </div>
                            </form>


                                <div class="col-1-of-3">
                                    <div class="composition">
                                        <img src="./src/images/logo-horizontal.jpg" alt="logo">
                                    </div>
                                    <div class="composition">
                                        <div class="widgets">
                                            <div class=" widget widgets__logo">
                                                <a href="#">
                                                    <img src="./src/images/logoapp.jpg" class="img-logo-right" width="80" height="80"
                                                        alt="orange cabs">
                                                </a>
                                            </div>
            
                                            <div class=" widget widgets__apples">
            
                                                <a href="#">
                                                    <img src="./src/images/app.png" / width="140" height="35" alt="apple" style="margin-bottom:2px;"
                                                        class="widgets__apples--p1">
                                                </a>
            
                                                <a href="#">
                                                    <img src="./src/images/google.png" / width="140" height="35" alt="google" class=" widget widgets__apples--p2">
                                                </a>
            
                                            </div>
            
                                            <div class=" widget widgets__paypal">
                                                <a href="#">
                                                    <img src="./src/images/paypal.png" / width="119" alt="payement">
                                                </a>
                                            </div>
            
                                        </div>
                                    </div>
            
                                    <div class="composition">
                                        <div class="awesomefonts-icons">
                                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                                            <a href="#"><i class="fab fa-google-plus-square"></i></a>
                                            <a href="#"><i class="fab fa-pinterest-square"></i></a>
                                        </div>
            
                                    </div>
            
                                </div>
                            </div>
                        </section>
        </main>
<?php include('footer.php');?>
