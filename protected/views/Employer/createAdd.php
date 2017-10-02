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

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/plugins/datepicker/datepicker.min.css', 'screen');
//--------------------------------------------
//Javascript
//--------------------------------------------
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/plugins/datepicker/datepicker.min.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/plugins/datepicker/i18n/datepicker.en.js', CClientScript::POS_HEAD);

?>


<div class="nav-bar-space"></div>


<section class="main-block top-space-block">
    <?php
    $form = $this->beginWidget('CActiveForm', array('id' => 'formAddAdvertisement',
        'stateful' => true,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        )));
    ?>
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
                                                <span>District</span>
                                            </div>
                                            <ul class="option-list"></ul>
                                            <?php echo Chtml::dropDownList('district_id', "", CHtml::listData(AdmDistrict::model()->findAll(), 'district_id', 'district_name'), array('empty' => 'Select District', 'options' => array($model->ref_district_id => array('selected' => true)), 'onChange' => 'loadCities()')); ?>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>City</span>
                                            </div>
                                            <ul class="option-list"></ul>

                                            <select id="city" name="city" class="city"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Industry</span>
                                            </div>
                                            <ul class="option-list"></ul>
                                            <?php echo Chtml::dropDownList('ref_industry_id', "", CHtml::listData(AdmIndustry::model()->findAll(), 'ind_id', 'ind_name'), array('empty' => 'Select Industry', 'options' => array($model->ref_industry_id => array('selected' => true)),)); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Job Category</span>
                                            </div>
                                            <ul class="option-list"></ul>
                                            <?php echo Chtml::dropDownList('ref_cat_id', "", CHtml::listData(AdmCategory::model()->findAll(), 'cat_id', 'cat_name'), array('empty' => 'Select Category', 'options' => array($model->ref_cat_id => array('selected' => true)), 'onChange' => 'loadSubCategories()')); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Sub Category</span>
                                            </div>
                                            <ul class="option-list"></ul>
                                            <select class="type" name="subCategories" id="subCategories"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="selector dark">
                                            <div class="selected-option">
                                                <span>Designation</span>
                                            </div>
                                            <ul class="option-list"></ul>
                                            <select class="type" name="designations" id="designations"></select>
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
                                            <?php echo Chtml::dropDownList('ref_work_type_id', "", CHtml::listData(AdmWorkType::model()->findAll(), 'wt_id', 'wt_name'), array('empty' => 'Select Type', 'options' => array($model->ref_work_type_id => array('selected' => true)))); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="experience" name="experience" type="text" class="salary-input"
                                                   value="<?php echo $model->ad_expected_experience ?>" required>
                                            <div class="float-text">Expected Experience (Yrs)</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="salary" name="salary" type="text" class="salary-input"
                                                   value="<?php echo $model->ad_salary; ?>" required>
                                            <div class="float-text">Salary</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="state-wrapper">
                                            <input id="isNegotiable" name="isNegotiable" class="filled-in"
                                                   type="checkbox" id="negotiable"
                                                   checked="<?php echo $model->ad_is_negotiable == 1 ? "on" : ""; ?>"/>
                                            <label for="isNegotiable">Negotiable</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="title" name="title" type="text" class="designation"
                                                   value="<?php echo $model->ad_title; ?>" required>
                                            <div class="float-text">Advertisement title</div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="col-md-6">
                                                                            <div class="state-wrapper">
                                                                                <input id="isNegotiable" name="isNegotiable" class="filled-in" type="checkbox" id="negotiable" checked="<?php echo $model->ad_is_negotiable == 1 ? "on" : ""; ?>"/>
                                                                                <input id="isDesigAsTitle" name="isDesigAsTitle" class="filled-in" type="checkbox" id="designation" checked="<?php echo $model->ad_is_use_desig_as_title == 1 ? "on" : ""; ?>"/>
                                                                                <label for="isNegotiable">Use designation as title</label>   
                                                                            </div>
                                                                        </div>-->
                                </div>

                                <div class="row mb-15">
                                    <div class="col-md-6">
                                        <div class="input-wrapper">
                                            <input id="expireDate" name="expireDate" type="text" class="datePicker"
                                                   value="<?php echo $model->ad_expire_date; ?>" required>
                                            <div class="float-text">Expire Date</div>
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
                                    <!--                                    <div class="col-md-6">
                                    
                                                                            <div class="state-wrapper">
                                                                                <input class="add_type_group upload" name="group1" type="radio" id="uploader" value="1" checked="checked">
                                                                                <label for="upload">Upload Image</label>
                                                                            </div>
                                    
                                                                        </div>
                                    
                                                                        <div class="col-md-6">
                                                                            <div class="state-wrapper">
                                                                                <input class="add_type_group editor" ame="group1" type="radio" id="text-editor" value="2">
                                                                                <label for="editor">Use Text Editor</label>
                                                                            </div>
                                                                        </div>-->

                                    <div class="col-md-6">
                                        <div class="state-wrapper">
                                            <input class="add_type_group upload" name="group1" checked="checked"
                                                   id="upload" type="radio">
                                            <label for="upload">Upload Image</label>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="state-wrapper">
                                            <input class="add_type_group editor" name="group1" id="editor"
                                                   type="radio">
                                            <label for="editor">Use Text Editor</label>
                                        </div>
                                    </div><!--

                                </div>-->

                                    <div class="row mt-15 mb-15">
                                        <div class="col-md-12 upload-area">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="pl-25 file-uploader">
                                                        <div class="button">Brows...</div>
                                                        <?php
                                                        $model = new EmpAdvertisement();
                                                        echo CHtml::activeFileField($model, 'AdverImage');
                                                        echo $form->error($model, 'AdverImage');
                                                        ?>
                                                    </div>
                                                    <p class="text-dark-blue text-light-3 f-12 ml-25 mt-7">File size
                                                        Should
                                                        be less than 2 MB and JPG/PNG fomat . Image width should not be
                                                        than
                                                        950 pixels.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 hide-block text-editor-area">
                                            <textarea name="advertisementText" id="advertisementText" cols="30"
                                                      rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12  mt-10">
                                    <div class="message cm-message"></div>
                                </div>
                                <div class="col-md-12 mt-20">
                                    <button type="submit"
                                            class="cm-btn large text-uppercase light-blue right">Save
                                    </button>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
</section>


<script>

    var nowDate = new Date();
    var expDate = nowDate.setDate(nowDate.getDate() + 14);

    $('.datePicker').datepicker({
        language: 'en',
        minDate: new Date(),
        maxDate: new Date(expDate),
        autoClose: true
    });


    $(document).ready(function () {
        Select.init();
        loadCities();
        loadSubCategories('<?php echo $model->ref_subcat_id; ?>')
    });


    $('#formAddAdvertisement').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo Yii::app()->baseUrl . '/Employer/SaveAdvertisement'; ?>",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (responce) {
                if (responce.code == 200) {
                    $('.message').Success(responce.msg);
                    document.getElementById("formAddAdvertisement").reset();
                    setTimeout(function () {
                        window.location.href = '<?php echo Yii::app()->baseUrl . '/Employer/ProfileDetails'; ?>';
                    }, 800)

                } else {
                    $('.message').Error(responce.msg);
                }
            }
        });

    });


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

    function loadSubCategories(id) {
        $("#subCategories").empty();

        var id = $('#ref_cat_id').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/GetSubCategories'; ?>",
            data: {id: id},
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    var subCats = responce.data.subCategoryData;
                    for (var i = 0, max = subCats.length; i < max; i++) {
                        $('#subCategories').append(
                            $("<option>" + subCats[i]['scat_name'] + "</option>")
                                .attr("value", subCats[i]['scat_id'])
                                .text(subCats[i]['scat_name'])
                        );
                    }

                    setTimeout(function () {
                        Select.init();
                        $("#subCategories > [value=" + '<?php echo $model->ref_subcat_id; ?>' + "]").attr("selected", "true");
                    }, 200);

                    loadDesignations();

                }
            }
        });
    }

    function loadDesignations() {
        $("#designations").empty();

        var id = $('#ref_cat_id').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/GetDesignationsByCat'; ?>",
            data: {id: id},
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    var designations = responce.data.designationData;
                    for (var i = 0, max = designations.length; i < max; i++) {
                        $('#designations').append(
                            $("<option>" + designations[i]['desig_name'] + "</option>")
                                .attr("value", designations[i]['desig_id'])
                                .text(designations[i]['desig_name'])
                        );
                    }

                    setTimeout(function () {
                        Select.init();
                        $("#designations > [value=" + '<?php echo $model->ref_designation_id; ?>' + "]").attr("selected", "true");
                    }, 200);
                }
            }
        });
    }

    function loadCities() {
        $("#city").empty();
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
                        $('#city').append(
                            $("<option>" + cities[i]['city_name'] + "</option>")
                                .attr("value", cities[i]['city_id'])
                                .text(cities[i]['city_name'])
                        );
                    }

                    setTimeout(function () {
                        Select.init();
                        $("#city > [value=" + '<?php echo $model->ref_city_id; ?>' + "]").attr("selected", "true");
                    }, 200)
                }
            }
        });
    }

</script>