<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<?php
//--------------------------------------------
//Style
//--------------------------------------------
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/plugins/editor/codemirror.css', 'screen');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/plugins/editor/froala_editor.pkgd.min.css', 'screen');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/plugins/editor/froala_style.min.css', 'screen');

//--------------------------------------------
//Javascript
//--------------------------------------------
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/custom/advertisement.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/custom/advertisement.server.js', CClientScript::POS_HEAD);

//Include external JS libs.
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/plugins/editor/codemirror.min.js', CClientScript::POS_HEAD);
//Include Editor JS files.
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/plugins/editor/xml.min.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/plugins/editor/froala_editor.pkgd.min.js', CClientScript::POS_HEAD);
?>


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
