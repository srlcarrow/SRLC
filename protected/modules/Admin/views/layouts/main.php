<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!--========================================================
            Stylesheet
        =========================================================-->
        <!--CSS | Materialize-->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/materialize.min.css">
        <!--CSS | Materialize Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--CSS | Common-->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/custom/common.css">
        <!--CSS | Sweet Alert-->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/plugins/sweetalert.css">
        <!--CSS | Admin-->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/admin/main.css">

        <!--========================================================
            Javascript
        =========================================================-->
        <!--JS | Jquery Lib-->
        <script src="<?php echo Yii::app()->baseUrl . '/js/lib/jquery-3.2.1.min.js'; ?>"></script>
        <!--JS | Materialize-->
        <script src="<?php echo $this->module->assetsUrl . '/js/materialize.min.js'; ?>"></script>
        <!--JS | Lodash-->
        <script src="<?php echo Yii::app()->baseUrl . '/js/lib/lodash-4.17.4.min.js'; ?>"></script>
        <!--JS | Sweet Alert-->
        <script src="<?php echo $this->module->assetsUrl . '/js/plugins/sweetalert/sweetalert.min.js'; ?>"></script>
        <!--JS | Admin Common-->
        <script src="<?php echo $this->module->assetsUrl . '/js/admin/common.js'; ?>"></script>
        <!--JS | Admin Validation-->
        <script src="<?php echo $this->module->assetsUrl . '/js/admin/jquery.validate.js'; ?>"></script>


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <!-- ======================================================
                Header Container
        =========================================================-->
        <header>
            <?php $this->beginContent('/layouts/menu'); ?>
            <?php echo $content; ?>
            <?php $this->endContent(); ?>            
        </header>


        <!-- ======================================================
               Main Container
        =========================================================-->
        <div class="container" id="page">

            <!--Message area-->
            <div class="card-panel adm-alert" role="alert"></div>

            <?php echo $content; ?>

        </div>

        <!-- ======================================================
               Footer Container
        =========================================================-->

    </body>
</html>
