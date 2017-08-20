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

        <title>4You</title>
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
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="" href="#"></a>
                    </div>

            </nav>
        </header>

        <!------------------------------------
        Search Section
    ------------------------------------->
        <section class="main-block search-section gradient full-height">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 main-title">
                        <h1>Hi ... Find a job fit to your life style</h1>
                        <h3>Simply dummy text of the printing and typesetting industry</h3>
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

                <!------------------------------------
                Search Section
            ------------------------------------->
                <?php $form = $this->beginWidget('CActiveForm', array('id' => 'frmSearch')); ?>
                <section class="main-block search-section gradient full-height">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 main-title">
                                <h1>Find a job fit to your life style</h1>
                                <h3>Simply dummy text of the printing and typesetting industry</h3>
                            </div>

                            <div class="col-sm-12 col-md-10 col-md-offset-1 search-area">

                                <div class="col-sm-12 search-box">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 job-drop-down show-category">
                                            <div class="selected-item">
                                                <span>Job Category</span>
                                                <i class="icon icon-20 icon-arrow-down right"></i>
                                            </div>
                                            <div class="list"></div>
                                        </div>
                                        <div class="col-md-8 col-sm-6 job-input">
                                            <input type="text" placeholder="Or Type Job Title / Keyword">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 col-md-offset-1 col-xs-12 filters">
                                    <div class="row">
                                        <div class="selector-wrap col-xs-12 col-sm-4 col-md-3">
                                            <div class="selector">
                                                <div class="selected-option">
                                                    <span>Type</span>
                                                </div>
                                                <ul class="option-list"></ul>
                                                <?php echo Chtml::dropDownList('wt_id', "", CHtml::listData(AdmWorkType::model()->findAll(), 'wt_id', 'wt_name'), array('empty' => 'Select Type')); ?>
                                            </div>
                                        </div>


                                        <div class="selector-wrap col-xs-12 col-sm-4 col-md-4 lg-ml-20">
                                            <div class="selector">
                                                <div class="selected-option">
                                                    <span>District</span>
                                                </div>
                                                <ul class="option-list"></ul>
                                                <?php echo Chtml::dropDownList('district_id', "", CHtml::listData(AdmDistrict::model()->findAll(), 'district_id', 'district_name'), array('empty' => 'Select District', 'onChange' => 'loadCities()')); ?>
                                            </div>
                                        </div>

                                        <div class="selector-wrap col-xs-12 col-sm-4 col-md-3 lg-ml-20">
                                            <div class="selector">
                                                <div class="selected-option">
                                                    <span>City</span>
                                                </div>
                                                <ul class="option-list"></ul>

                                                <select class="city" name="" id="">
                                                    <option value="" disabled="disabled">City</option>
                                                    <option value="778">Colombo</option>
                                                </select>
                                                <?php echo Chtml::dropDownList('district_id', "", CHtml::listData(AdmDistrict::model()->findAll(), 'district_id', 'district_name'), array('empty' => 'Select District')); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <?php $this->endWidget(); ?>
                <!------------------------------------
                Search Result Section
            ------------------------------------->
                <section class="main-block" id="searchContent">

                    <div class="container">
                        <div class="row">

                            <div class="col-md-10 col-md-offset-1 col-xs-12">

                                <div class="row">

                                    <div class="total-jobs col-xs-12">
                                        <h4>10<span>of</span>124</h4>
                                    </div>


                                    <div class="job-list-wrap col-xs-12">

                                        <ul class="float-block job-list">
                                            <li>
                                                <h3>Project Manager</h3>
                                                <h6>
                                                    <span>Sysco Labs (Pvt) Ltd</span>
                                                    <span class="time-left">Yesterday</span>
                                                </h6>
                                                <ul class="more-details-list">
                                                    <li>
                                                        <i class="dot"></i>
                                                        Intern
                                                    </li>
                                                    <li>
                                                        <i class="dot"></i>
                                                        3+ Yrs
                                                    </li>
                                                    <li>
                                                        <i class="dot"></i>
                                                        Colobmo 03
                                                    </li>
                                                    <li>
                                                        <i class="dot"></i>
                                                        75k - 100k
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <h3>Project Manager</h3>
                                                <h6>
                                                    <span>VirtusaPolaris Pvt. Ltd.</span>
                                                    <span class="time-left">1 hour</span>
                                                </h6>
                                                <ul class="more-details-list">
                                                    <li>
                                                        <i class="dot"></i>
                                                        Full Time
                                                    </li>
                                                    <li title="">
                                                        <i class="dot"></i>
                                                        3+ Yrs
                                                    </li>
                                                    <li title="City">
                                                        <i class="dot"></i>
                                                        Negambo
                                                    </li>
                                                    <li title="Salary">
                                                        <i class="dot"></i>
                                                        75k - 100k
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <h3>Project Manager</h3>
                                                <h6>
                                                    <span>Sysco Labs (Pvt) Ltd</span>
                                                    <span class="time-left">Yesterday</span>
                                                </h6>
                                                <ul class="more-details-list">
                                                    <li>
                                                        <i class="dot"></i>
                                                        Intern
                                                    </li>
                                                    <li>
                                                        <i class="dot"></i>
                                                        3+ Yrs
                                                    </li>
                                                    <li>
                                                        <i class="dot"></i>
                                                        Colobmo 03
                                                    </li>
                                                    <li>
                                                        <i class="dot"></i>
                                                        75k - 100k
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>

                                    </div>


                                </div>

                            </div>

                            <div class="col-xs-12 site-pagination">
                                <ul>
                                    <li class="active">
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <a href="#">2</a>
                                    </li>
                                    <li>
                                        <a href="#">3</a>
                                    </li>
                                </ul>
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
                <script src="<?php echo Yii::app()->baseUrl . '/js/custom/index.js'; ?>"></script>

                <!--JS | Common Server js-->
                <script src="<?php echo Yii::app()->baseUrl . '/js/custom/common.server.js'; ?>"></script>
                <!--JS | Server js-->
                <script src="<?php echo Yii::app()->baseUrl . '/js/custom/index.server.js'; ?>"></script>

                </body>
                </html>

                <script>
                            function loadCities() {
                                alert('rrr');
                            }
                </script>