<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
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
        <!--JS | Admin Validation-->
        <script src="<?php echo Yii::app()->baseUrl . '/js/validate/jquery.validate.js'; ?>"></script>

        <title>4You</title>
    </head>

    <body>
        <div class="popup-container">
            <div class="popup">
                <span class="close"></span>
                <div class="content">

                </div>
            </div>
        </div>

        <!-- Header Container -->
        <header>
            <?php $this->beginContent('//layouts/menu'); ?>
            <?php echo $content; ?>
            <?php $this->endContent(); ?>
        </header>

        <!-- Main Container -->
        <?php echo $content; ?>

        <!--             ========================================================
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

    <!------------------------------------
    Footer Section
    ------------------------------------->
    <!--<footer>
    <script src="<?php echo Yii::app()->baseUrl . '/js/custom/common.server.js'; ?>"></script>
    </footer>-->
</html>
