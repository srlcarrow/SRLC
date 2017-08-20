<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!--========================================================
         Stylesheet
     =========================================================-->

    <!--CSS | bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    <!--CSS | Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <!--CSS | Main-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">

    <!--========================================================
       Javascript
    =========================================================-->

    <script>
        var BASE_URL = "<?php echo Yii::app()->baseUrl; ?>";
    </script>

    <!--JS | Jquery Lib-->
    <script src="<?php echo Yii::app()->baseUrl . '/js/lib/jquery-3.2.1.min.js'; ?>"></script>
    <!--JS | Scroll magic-->
    <script src="<?php echo Yii::app()->baseUrl . '/js/plugins/scrollmagic/minified/ScrollMagic.min.js'; ?>"></script>

    <title>Site</title>
</head>
<body>

<!------------------------------------
    Header Section
------------------------------------->
<div class="popup-container">
    <div class="popup">
        <span class="close"></span>
        <div class="content">

        </div>
    </div>
</div>
<!------------------------------------
    Header Section
------------------------------------->
<header>
    <nav class="navbar light-blue nav-bottom-space">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="" href="#"></a>
            </div>

            <ul class="navbar-nav navbar-right hidden-xs">
                <li class="active"><a href="#">Job Seeker</a></li>
                <li><a href="#">Employer</a></li>
                <li><a href="#">Contact Us</a></li>
                <li class="sign-link"><a class="btn-sign-in" href="#">Sign in</a></li>
                <li class="register-link"><a class="cm-btn btn-registration" href="#">Register</a></li>
            </ul>
        </div>
    </nav>
</header>

<div class="nav-bar-space"></div>

<section class="main-block top-space-block">
    <div class="container">
        <div class="row mb-30">

            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="row">

                            <!--                            <h2 class="col-md-12 f-light mb-50"></h2>-->

                            <div class="col-md-12">

                                <div class="row mb-15">
                                    <div class="col-md-12">
                                        <div class="company-logo-wrp">
                                            <img src="" alt="">
                                        </div>
                                        <button type="button"
                                                class="cm-btn large cmp_logo_upload">Upload Company Logo
                                        </button>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-12">
                                        <div class="input-wrapper">
                                            <input id="" name="" type="text">
                                            <div class="float-text">Address</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>District</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">District</option>
                                                <option value="2">Lorem ipsum</option>
                                                <option value="4">Lorem ipsum</option>
                                                <option value="3">Lorem ipsum</option>
                                                <option value="5">Lorem ipsum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>City</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">City</option>
                                                <option value="2">Lorem ipsum</option>
                                                <option value="4">Lorem ipsum</option>
                                                <option value="3">Lorem ipsum</option>
                                                <option value="5">Lorem ipsum</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="" name="" type="text">
                                            <div class="float-text">Contact ( Optional )</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="" name="" type="text">
                                            <div class="float-text">Name of Contact Person</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Industry</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">Industry</option>
                                                <option value="2">Lorem ipsum</option>
                                                <option value="4">Lorem ipsum</option>
                                                <option value="3">Lorem ipsum</option>
                                                <option value="5">Lorem ipsum</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 mt-20">
                                <button id="Register" type="button"
                                        class="cm-btn large text-uppercase light-blue right">Finish</button>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>


<!------------------------------------
    Footer Section
------------------------------------->
<footer>

</footer>


<!--========================================================
     Javascript
=========================================================-->
<!--JS | Common js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/common.js'; ?>"></script>
<!--JS | Common Server js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/common.server.js'; ?>"></script>

</body>
</html>