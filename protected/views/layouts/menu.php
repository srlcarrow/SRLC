<nav class="navbar light-blue nav-bottom-space">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="" href="<?php echo Yii::app()->baseUrl ?>">
                <img src="<?php echo Yii::app()->baseUrl ?>/images/system/logo/logo-1.svg" alt="Logo">
            </a>
        </div>
        <ul class="navbar-nav navbar-right hidden-xs">

            <li class="active"><a href="<?php // echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration';  ?>">Job
                    Seeker</a></li>
<<<<<<< HEAD
            <li><a href="<?php // echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Employer</a></li>
            <li><a href="<?php // echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration'; ?>">Contact Us</a>
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
>>>>>>> 8a10cfe44543a65dd03cdb9e5bd136c14edc5260
=======
            <li><a href="<?php // echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration';  ?>">Employer</a></li>
            <li><a href="<?php // echo Yii::app()->request->baseUrl . '/JobSeeker/ViewRegistration';  ?>">Contact Us</a></li>

>>>>>>> edd7e07d9ba3311d8f4fe292c88d4ab708822f5c

            <?php if (yii::app()->user->isGuest) { ?>
                <li class="sign-link"><a class="btn-sign-in" href="#">Sign in</a></li>
                <li class="register-link"><a class="cm-btn btn-registration" href="">Register</a></li>
                <?php
            } else {
<<<<<<< HEAD
                echo $logUserId = Yii::app()->user->id;
                //$logUserType = User::model()->findByAttributes(array('user_id' => $logUserId))->user_type;
                
//                if($logUserType==1){
//                    //$logUserType = User::model()->findByAttributes(array('user_id' => $userId))->user_type;
//                }
                
=======
                $logUserId = Yii::app()->user->id;
                $logUserDetails = User::model()->findByAttributes(array('user_id' => $logUserId));

                if ($logUserDetails->user_type == 1) {
                    $JsBasic = JsBasic::model()->findByAttributes(array('ref_jsbt_id' => $logUserDetails->ref_emp_or_js_id));
                    $firstName = substr($JsBasic->js_fname, 0, 10);                
                    $fullName = $JsBasic->js_fname .' '. $JsBasic->js_lname;                
                    $email = $JsBasic->js_email;                
                } else {
                    $EmpEmployers = EmpEmployers::model()->findByAttributes(array('ref_ind_id' => $logUserDetails->ref_emp_or_js_id));
                    $firstName = substr($EmpEmployers->employer_name, 0, 10);    
                    $fullName = $EmpEmployers->employer_name;  
                    $email = $EmpEmployers->employer_email; 
                }
>>>>>>> edd7e07d9ba3311d8f4fe292c88d4ab708822f5c
                ?>                
                <li class="profile-link">
                    <a class="" href="#">
                        <span class="text-hi">Hi,</span>
<<<<<<< HEAD
                        <span class="text-name">Lanka</span>
=======
                        <span class="text-name"><?php echo $firstName; ?></span>
>>>>>>> edd7e07d9ba3311d8f4fe292c88d4ab708822f5c
                        <span class="arrow-down"></span>
                    </a>
                    <div class="drop-box">
                        <div class="row">
<<<<<<< HEAD
                            <h5 class="col-md-12 text-black text-light-2">Darshaka Lanka</h5>
                            <h6 class="col-md-12 text-black text-light-3">darshaka4mail@hmail.com</h6>
=======
                            <h5 class="col-md-12 text-black text-light-2"><?php echo $fullName; ?></h5>
                            <h6 class="col-md-12 text-black text-light-3"><?php echo $email; ?></h6>
>>>>>>> edd7e07d9ba3311d8f4fe292c88d4ab708822f5c
                            <div class="col-md-12 mt-10">
                                <a href="<?php echo Yii::app()->request->baseUrl . '/Default/Logout'; ?>" class="logout">Logout</a>
                            </div>
                        </div>

                    </div>
                </li>
<<<<<<< HEAD
            <?php }
            ?>
=======
<?php }
?>
>>>>>>> edd7e07d9ba3311d8f4fe292c88d4ab708822f5c
        </ul>
    </div>
</nav>

