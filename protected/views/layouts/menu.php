<nav class="navbar light-blue nav-bottom-space">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="" href="<?php echo Yii::app()->baseUrl ?>">
                <img src="<?php echo Yii::app()->baseUrl ?>/images/system/logo/logo-1.svg" alt="Logo">
            </a>
        </div>
        <ul class="navbar-nav navbar-right hidden-xs">
            <li class="active"><a href="<?php echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Job
                    Seeker</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Employer</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Contact Us</a>
            </li>
            <li class="profile-link">
                <a class="" href="#">
                    <span class="text-hi">Hi,</span>
                    <span class="text-name">Lanka</span>
                    <span class="arrow-down"></span>
                </a>
                <div class="drop-box">
                    <div class="row">
                        <h5 class="col-md-12 text-black text-light-2">Darshaka Lanka</h5>
                        <h6 class="col-md-12 text-black text-light-3">darshaka4mail@hmail.com</h6>
                        <div class="col-md-12 mt-10">
                            <a href="" class="logout">Logout</a>
                        </div>
                    </div>

                </div>
            </li>
            <?php if (yii::app()->user->isGuest) { ?>
                <li class="sign-link"><a class="btn-sign-in" href="#">Sign in</a></li>
                <li class="register-link"><a class="cm-btn btn-registration" href="">Register</a></li>
            <?php } else { ?>
                <li><a href="<?php echo Yii::app()->request->baseUrl . '/Default/Logout'; ?>">Sign Out</a></li>
            <?php }
            ?>
        </ul>
    </div>
</nav>

