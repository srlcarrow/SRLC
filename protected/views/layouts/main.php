<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!--========================================================
        Stylesheet
    =========================================================-->

    <!--CSS | Bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    <!--CSS | Common-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom/common.css">
    <!--CSS | Admin-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css">

    <!--========================================================
        Javascript
    =========================================================-->
    <!--JS | Jquery Lib-->
    <script src="<?php echo Yii::app()->baseUrl . '/js/lib/jquery-3.2.1.min.js'; ?>"></script>
    <!--JS | Bootstrap-->
    <script src="<?php echo Yii::app()->baseUrl . '/js/bootstrap.min.js'; ?>"></script>
    <!--JS | Lodash-->
    <script src="<?php echo Yii::app()->baseUrl . '/js/lib/lodash-4.17.4.min.js'; ?>"></script>
    <!--JS | Admin Common-->
    <script src="<?php echo Yii::app()->baseUrl . '/js/admin/common.js'; ?>"></script>


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!-- ======================================================
        Header Container
=========================================================-->
<header>
    <?php $this->beginContent('//layouts/menu'); ?>
    <?php echo $content; ?>
    <?php $this->endContent(); ?>
</header>

<!-- ======================================================
       Main Container
=========================================================-->
<div class="container" id="page">

    <!--Message area-->
    <div class="alert alert-info adm-alert" role="alert"></div>

    <?php echo $content; ?>

</div>

<!-- ======================================================
       Footer Container
=========================================================-->
<div class="container-fluid"></div>

</body>
</html>
