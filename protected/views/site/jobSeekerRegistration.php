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

<section class="main-block jobSeeker-block">
    <div class="container">
        <div class="row mb-30">

            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-12 mb-50">
                                <ul class="step-list job-seeker-list">
                                    <li class="active">
                                        <a href="#set1" data-step="0">
                                            <span class="number">1.</span>
                                            <span class="text">
                                                Personal<br>Information
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#set2" data-step="1">
                                            <span class="number">2.</span>
                                            <span class="text">
                                                Current<br>Position
                                            </span>
                                        </a>
                                    </li>
                                    <li class="width-200 text-right">
                                        <a href="#set3" data-step="2">
                                            <span class="number">3.</span>
                                            <span class="text">
                                                Expected<br>Position
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-12 ">
                                <div class="row loadStep">

                                </div>
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
<!--JS | Job Seeker js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/job-seeker.js'; ?>"></script>
<!--JS | Common Server js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/common.server.js'; ?>"></script>
<!--JS | Server js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/job_seeker.server.js'; ?>"></script>

</body>
</html>