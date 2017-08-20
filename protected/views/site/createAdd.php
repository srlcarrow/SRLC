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

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins/editor/codemirror.css">

    <!-- Include Editor style. -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins/editor/froala_editor.pkgd.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins/editor/froala_style.min.css" rel="stylesheet"
          type="text/css"/>

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

                            <h2 class="col-md-12 f-light mb-50">Create Advertisement</h2>

                            <div class="col-md-12 mt-10">

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Job Category</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">Job Category</option>
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
                                                <span>Sub Category</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">Sub Category</option>
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
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Designation</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">Designation</option>
                                                <option value="2">Lorem ipsum</option>
                                                <option value="4">Lorem ipsum</option>
                                                <option value="3">Lorem ipsum</option>
                                                <option value="5">Lorem ipsum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="" name="" type="text">
                                            <div class="float-text">If Other Enter Designation</div>
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
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Type</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">Type</option>
                                                <option value="2">Lorem ipsum</option>
                                                <option value="4">Lorem ipsum</option>
                                                <option value="3">Lorem ipsum</option>
                                                <option value="5">Lorem ipsum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="state-wrapper">
                                            <input id="intern" type="checkbox">
                                            <label for="intern">Intern Opportunity</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Experience</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select class="type" name="" id="">
                                                <option value="" disabled="disabled">Experience</option>
                                                <option value="2">Lorem ipsum</option>
                                                <option value="4">Lorem ipsum</option>
                                                <option value="3">Lorem ipsum</option>
                                                <option value="5">Lorem ipsum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="" name="" type="text">
                                            <div class="float-text">Salary ( Optional )</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">

                                        <div class="state-wrapper">
                                            <input class="add_type_group upload" name="add_type_group" checked="checked"
                                                   id="upload" type="radio">
                                            <label for="upload">Upload Image</label>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="state-wrapper">
                                            <input class="add_type_group editor" name="add_type_group" id="editor"
                                                   type="radio">
                                            <label for="editor">Use Text Editor</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-15 mb-15">
                                    <div class="col-md-12 upload-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="pl-25 file-uploader">
                                                    <div class="button">Brows...</div>
                                                    <input type="file">
                                                </div>
                                                <p class="text-dark-blue text-light-3 f-12 ml-25 mt-7">File size Should
                                                    be less than 2 MB and JPG/PNG fomat . Image width should not be than
                                                    950 pixels.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 hide-block text-editor-area">
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-20">
                                <button id="Register" type="button"
                                        class="cm-btn large text-uppercase light-blue right">Confirm
                                </button>
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
<!--JS | Advertisement js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/create_advertisement.js'; ?>"></script>
<!--JS | Common Server js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/common.server.js'; ?>"></script>
<!--JS | Server js-->
<script src="<?php echo Yii::app()->baseUrl . '/js/custom/create_advertisement.server.js'; ?>"></script>

<!-- Include external JS libs. -->
<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/editor/codemirror.min.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/editor/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/editor/froala_editor.pkgd.min.js"></script>
<script>

    $(function () {

        $('.add_type_group').on('change', function () {

            var $this = $(this);
            if ($this.hasClass('upload')) {
                $('.text-editor-area').slideUp('fast', function () {
                    $('.upload-area').slideDown('fast');
                });
            } else {
                $('.upload-area').slideUp('fast', function () {
                    $('.text-editor-area').slideDown('fast');
                });
            }

        });

    });

    $(function () {
        $('textarea').froalaEditor({
            heightMin: 380
        })
    });
</script>
</body>
</html>