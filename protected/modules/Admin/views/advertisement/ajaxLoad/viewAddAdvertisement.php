<?php
$form = $this->beginWidget('CActiveForm', array('id' => 'formAddAdvertisement',
    'stateful' => true,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        )));
?>
<div class="card ">
    <div class="card-content">
        <h5 class="grey-text text-darken-1">Add Advertisement</h5>

        <div class="row">
            <div class="col s12 m4">
                <div class="input-field">
                    <?php echo Chtml::dropDownList('ref_district_id', "", CHtml::listData(AdmDistrict::model()->findAll(), 'district_id', 'district_name'), array('empty' => 'Select District')); ?>           
                    <label>District</label>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="input-field">
                    <?php echo Chtml::dropDownList('ref_city_id', "", CHtml::listData(AdmCity::model()->findAll(), 'city_id', 'city_name'), array('empty' => 'Select City')); ?>           
                    <label>City</label>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="input-field">
                    <?php echo Chtml::dropDownList('ref_industry_id', "", CHtml::listData(AdmIndustry::model()->findAll(), 'ind_id', 'ind_name'), array('empty' => 'Select Industry')); ?>           
                    <label>Industry</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4">
                <div class="input-field">
                    <?php echo Chtml::dropDownList('ref_cat_id', "", CHtml::listData(AdmCategory::model()->findAll(), 'cat_id', 'cat_name'), array('empty' => 'Select Category', 'onChange' => 'loadSubCategories()')); ?>           
                    <label>Job Category</label>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="input-field">
                    <ul class="option-list"></ul>

                    <select class="type" name="subCategories" id="subCategories">
                    </select>
                    <label>Sub Category</label>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="input-field">
                    <?php echo Chtml::dropDownList('ref_designation_id', "", CHtml::listData(AdmDesignation::model()->findAll(), 'desig_id', 'desig_name'), array('empty' => 'Select Designation')); ?>           
                    <label>Designation</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4">  
                <div class="input-field">
                    <input id="experience" name="experience" type="text" class="salary-input" required>
                    <label>Expected Experience (Yrs)</label>
                </div>
            </div>
            <div class="col s12 m8">                
                <div class="col m4">
                    <div class="input-field">
                        <input id="salary" name="salary" type="text" class="salary-input">
                        <label>Salary</label>
                    </div>
                </div>
                <div class="col m4">
                    <div class="input-field">
                        <input id="isNegotiable" name="isNegotiable" class="filled-in" type="checkbox" id="negotiable"/>
                        <label for="isNegotiable">Negotiable</label>
                    </div>
                </div>
                <div class="col m4">
                    <div class="input-field">
                        <?php echo Chtml::dropDownList('ref_work_type_id', "", CHtml::listData(AdmWorkType::model()->findAll(), 'wt_id', 'wt_name'), array('empty' => 'Select Type')); ?>           
                        <label>Type</label>
                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col s12 m4">
                <div class="input-field">
                    <input id="title" name="title" type="text" class="designation">
                    <label>Advertisement title</label>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="input-field">
                    <input id="isDesigAsTitle" name="isDesigAsTitle" class="filled-in" type="checkbox" id="designation"/>
                    <label for="isDesigAsTitle">Use designation as title</label>
                </div>
            </div>

            <div class="col m4">
                <div class="input-field">
                    <input id="expireDate" name="expireDate" type="text" class="datepicker">
                    <label for="designation">Expire Date</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col m6">
                <p>
                    <input class="with-gap uploaderOrEditor" name="group1" type="radio" id="uploader"
                           value="1"/>
                    <label for="uploader">Upload Image</label>
                </p>
            </div>
            <div class="col m6">
                <p>
                    <input class="with-gap uploaderOrEditor" name="group1" type="radio" id="text-editor"
                           value="2"/>
                    <label for="text-editor">User Text Editor</label>
                </p>
            </div>

            <div class="col s12 uploader">
                <div class="col s12">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Upload</span>
                            <?php
                            echo CHtml::activeFileField($model, 'AdverImage');
                            echo $form->error($model, 'AdverImage');
                            ?>
                        </div>
                        <div class="file-path-wrapper">
                            <input id="imagePath" name="imagePath" class="file-path validate" type="text" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 editor hide-block">
                <div class="input-field col s12">
                    <textarea id="textarea1" name="advertisementText" class="materialize-textarea"></textarea>
                    <label for="textarea1">Textarea</label>
                </div>
            </div>
        </div>


    </div>
    <div class="card-action right-align">
        <button type="button"
                class=" btn_close btn waves-effect waves-light red lighten-1">Close
        </button>
        <button id="clearAddAdvertisement" type="button" class=" btn waves-effect waves-light red lighten-1">Clear</button>
        <button id="" type="submit" class="btn waves-effect waves-light blue lighten-1">Save</button>
    </div>
</div>
<?php $this->endWidget(); ?>

<!--Back End-->
<script>
    $('#formAddAdvertisement').submit(function (e) {
        $.ajax({
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Advertisement/SaveAdvertisement'; ?>",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (responce) {
                if (responce.code == 200) {
                    Message.success(responce.msg);
                    document.getElementById("formAddAdvertisement").reset();
                }
            }
        });
        e.preventDefault();
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
                    }, 200);

//                    loadDesignations();

                }
            }
        });
    }

    $('#clearAddAdvertisement').click(function (e) {
        $("#formAddAdvertisement")[0].reset();
    });

    $('#closeAddAdvertisement').click(function (e) {
        $("#formAddAdvertisement")[0].reset();
        $('.company-form').slideUp('fast', function () {
            $('.search-area,.company-cards').slideDown('slow');
            loadEmployerData();
        })
    });
</script>

<script>
    $(document).ready(function () {
        $('select').material_select();
    });

    //Uploader or Editor
    $('.uploaderOrEditor').on('change', function () {
        if ($(this).val() == 1) {
            $('.editor').slideUp('fast', function () {
                $('.uploader').slideDown('fast');
            });

        } else {
            $('.uploader').slideUp('fast', function () {
                $('.editor').slideDown('fast');
            });
        }
    });

    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false
    });

    $('#negotiable').on('change', function () {
        if ($(this).is(':checked')) {
            $('.salary-input').prop('disabled', true);
        } else {
            $('.salary-input').prop('disabled', false);
        }
    });

    $('#designation').on('change', function () {
        if ($(this).is(':checked')) {
            $('.designation').prop('disabled', true);
        } else {
            $('.designation').prop('disabled', false);
        }
    });
</script>

<!-- Include external JS libs. -->
<script type="text/javascript"
src="<?php echo $this->module->assetsUrl ?>/js/plugins/editor/codemirror.min.js"></script>
<script type="text/javascript"
src="<?php echo $this->module->assetsUrl ?>/js/plugins/editor/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript"
src="<?php echo $this->module->assetsUrl ?>/js/plugins/editor/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
    $(function () {
        $('textarea').froalaEditor({
            heightMin: 380
        })
    });

</script>