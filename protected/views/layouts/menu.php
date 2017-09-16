<nav class="navbar light-blue nav-bottom-space">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="" href="<?php echo Yii::app()->baseUrl?>">
                <img src="<?php echo Yii::app()->baseUrl?>/images/system/logo/logo-1.svg" alt="Logo">
            </a>
        </div>
        <ul class="navbar-nav navbar-right hidden-xs">
            <li class="active"><a href="<?php echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Job Seeker</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Employer</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Contact Us</a></li>
            <li class="sign-link"><a class="btn-sign-in" href="#">Sign in</a></li>
            <li class="register-link"><a class="cm-btn btn-registration" href="">Register</a></li>
        </ul>
    </div>
</nav>

