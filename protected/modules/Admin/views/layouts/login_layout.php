<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8"/>
        <title>Admin Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

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

        <script type="text/javascript" >
            var http_path = "<?php echo Yii::app()->getBaseUrl(true); ?>/";
        </script>

    </head>
    <body class="login">
        <!--Login form-->
        <div class="content">
            <?php echo $content; ?>
        </div>
    </body>

</html>

