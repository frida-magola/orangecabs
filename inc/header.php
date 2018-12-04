<!-- navigation bar-->
<nav class="navbar" id="mainNav">

            <div class="toggle">
                <i class="fas fa-bars menu"></i>
            </div>
            <ul class="navbar__list">
                <li class="navbar__item">
                    <a class="navbar__link <?php if($p == 'home'){echo 'active';}?> " href="./">HOME</a>
                </li>
                <li class="navbar__item">
                    <a class="navbar__link <?php if($p == 'aboutus'){echo 'active';}?>"  href="?p=aboutus">ABOUT US</a>
                </li>
                <li class="navbar__item">
                    <a class="navbar__link <?php if($p == 'appbookings'){echo 'active';}?>"   href="?p=appbookings">APP BOOKINGS</a>
                </li>
                <li class="navbar__item">
                    <a class="navbar__link <?php if($p == 'onlinebookings'){echo 'active';}?>"   href="?p=onlinebookings">ONLINE BOOKINGS</a>
                </li>

                <li class="navbar__item">
                    <a class="navbar__link <?php if($p == 'rates'){echo 'active';}?>"  href="?p=rates">RATES</a>
                </li>

                <li class="navbar__item">
                    <a class="navbar__link <?php if($p == 'contactus'){echo 'active';}?>"   href="?p=contactus">CONTACT US</a>
                </li>

                <div class="navbar-right">
                    <li><span class="login-span">Already a rider? &nbsp;
                            <a href="#login" id="loginhere">Log in here</a>
                        </span>
                    </li>
                    <li class="login-register-middle-bar"></li>
                    <li>
                        <span class="register-span">New riders –&nbsp;
                            <a href="#signup" id="register" type="button" role="button">register here</a>
                        </span>
                    </li>
                </div>
            </ul>
        </nav>