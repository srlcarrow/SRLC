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
                <li class="sign-link"><a href="#">Sign in</a></li>
                <li class="register-link"><a class="cm-btn btn-registration" href="#">Register</a></li>
            </ul>
        </div>
    </nav>
</header>

<div class="nav-bar-space"></div>

<section class="main-block add-block">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12 mb-25">
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/company/logo/wso2.logo.png" alt="">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-dark-blue mb-25">Visual Designer</h2>

                                <p class="text-dark-blue">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="side-panel">
                            <div class="side-panel-row">
                                <h6 class="title">Type</h6>
                                <h6 class="info">Full Time</h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Experience</h6>
                                <h6 class="info">3+ Years</h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Address</h6>
                                <h6 class="info">182/1, Darmapala Mawatha, Colombo 2</h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Salary</h6>
                                <h6 class="info">Negotiable</h6>
                            </div>

                            <div class="side-panel-row">
                                <button type="button" class="cm-btn large light-blue-4 up-case">Apply</button>
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
<!--JS | Main js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/advertisement.js'; ?>"></script>
<!--JS | Common Server js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/common.server.js'; ?>"></script>
<!--JS | Server js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/advertisement.server.js'; ?>"></script>

</body>
</html>