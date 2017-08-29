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
                                    <input id="searchText" name="searchText" type="text" placeholder="Or Type Job Title / Keyword">
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
                                        <?php echo Chtml::dropDownList('wt_id', "", CHtml::listData(AdmWorkType::model()->findAll(), 'wt_id', 'wt_name'), array('empty' => 'Select Type', 'onchange' => 'loadAdvertisementData(1)')); ?>
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
                                        <ul id="citiesList" class="option-list"></ul>
                                        <select id="cities" name="cities" onchange="loadAdvertisementData(1)"></select>

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
        <div id="ajaxLoadAdvertisements"></div>

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
            $(document).ready(function (e) {
                loadAdvertisementData(1);
            });

            $('#searchText').keyup(function () {
                loadAdvertisementData(1);
            });

            var currentRequest = null;
            function loadAdvertisementData(page) {
                var catId = null;
                var subCatId = null;

                catId = MAIN_ID.split("_")[1];
                subCatId = SUB_ID.split("_")[1];

                currentRequest = jQuery.ajax({
                    type: 'POST',
                    url: "<?php echo Yii::app()->baseUrl . '/Advertisement/ViewAdvertisementsData'; ?>",
                    data: $('#frmSearch').serialize() + "&catId=" + catId + "&subCatId=" + subCatId + "&page=" + page,
                    beforeSend: function () {
                        if (currentRequest != null) {
                            currentRequest.abort();
                        }
                    },
                    success: function (responce) {
                        $("#ajaxLoadAdvertisements").html(responce);
                    }
                });
            }


            $('#district_id').on('change', function () {
                $('#cities').parents('.selector').find('.selected-option span').html('City')
            });

            function loadCities() {
                $("#cities").empty();

                var id = $('#district_id').val();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo Yii::app()->baseUrl . '/Site/GetCitiesByDistrictID'; ?>",
                    data: {id: id},
                    dataType: 'json',
                    success: function (responce) {
                        if (responce.code == 200) {
                            var cities = responce.data.cityData;
                            for (var i = 0, max = cities.length; i < max; i++) {
                                $('#cities').append(
                                        $("<option>aaaa</option>")
                                        .attr("value", cities[i]['city_id'])
                                        .text(cities[i]['city_name'])
                                        );
                            }

                            setTimeout(function () {
                                Select.init();
                            }, 200)

                            loadAdvertisementData(1);
                        }
                    }
                });
            }

            function test() {
                alert('rrrr');
            }
</script>