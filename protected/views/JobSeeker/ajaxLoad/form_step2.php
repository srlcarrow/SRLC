<?php
$form = $this->beginWidget('CActiveForm', array('id' => 'formStepTwo', 'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'novalidate' => 'novalidate',
        )));
?>
<div class="col-md-12 ">

    <div class="row mb-15">

        <div class="col-md-6">
            <div class="selector dark">
                <div class="selected-option">
                    <span>Industry</span>
                </div>

                <ul class="option-list"></ul>
                <?php echo Chtml::dropDownList('ind_id', "", CHtml::listData(AdmIndustry::model()->findAll(), 'ind_id', 'ind_name'), array('empty' => 'Select Industry', 'options' => array($jsEmploymentData->ref_industry_id => array('selected' => true)))); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="state-wrapper">
                <input type="checkbox" id="s" name="isFresher">
                <label for="s">Still I am a Fresher</label>
            </div>
        </div>

    </div>

    <div class="row mb-15">

        <div class="col-md-6">
            <div class="selector dark">
                <div class="selected-option">
                    <span>Category (Field)</span>
                </div>
                <ul class="option-list"></ul>
                <?php echo Chtml::dropDownList('cat_id', "", CHtml::listData(AdmCategory::model()->findAll(array('order' => 'cat_order')), 'cat_id', 'cat_name'), array('empty' => 'Select Category', 'options' => array($jsEmploymentData->ref_category_id => array('selected' => true)), 'required' => 'required', 'onChange' => 'loadSubCategories()')); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="selector dark subCategories-select">
                <div class="selected-option">
                    <span>Sub Category</span>
                </div>
                <ul class="option-list"></ul>

                <select class="type" name="subCategories" id="subCategories">
                </select>
            </div>
        </div>

    </div>


    <div class="row mb-15">

        <div class="col-md-6">
            <div class="selector dark designations-select">
                <div class="selected-option">
                    <span>Current Job title</span>
                </div>
                <ul class="option-list"></ul>

                <select class="type" name="designations" id="designations">
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="designationOther" name="designationOther" type="text">
                <div class="float-text">If Others Enter your Job title</div>
            </div>
        </div>

    </div>

</div>

<div class="col-md-12 mt-20">
    <button type="submit" class="cm-btn large text-uppercase light-blue right btn-next">Next</button>
    <button type="button" class="cm-btn large text-uppercase light-blue right" onclick="goToStepOne()">Back</button>
    <button type="button" onclick="skip()" class="cm-btn large text-uppercase light-blue right">Skip</button>
</div>
<?php $this->endWidget(); ?>


<script>
    Input.init();
    Select.init();

    function loadSubCategories() {
        $("#subCategories").empty();

        var id = $('#cat_id').val();
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
                        $("#subCategories > [value=" + '<?php echo $jsEmploymentData->ref_sub_category_id; ?>' + "]").attr("selected", "true");
                        Select.init('.subSelector');
                    }, 200);

                    loadDesignations();

                }
            }
        });
    }

    function loadDesignations() {
        $("#designations").empty();

        var id = $('#cat_id').val();
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
                        Select.init(".designations-select");
                    }, 200);
                }
            }
        });
    }

    $("#formStepTwo").validate({
        submitHandler: function () {
            saveStepTwo();
        }
    });

    function saveStepTwo() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/SaveStepTwo'; ?>",
            data: $('#formStepTwo').serialize() + '&accessId=<?php echo $accessId; ?>',
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    isStepTwoCompleted = 1;
                    goToStepThree(responce.data.accessId);
                }
            }
        });
    }


    function goToStepThree(accessId) {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/FormStepThree'; ?>",
            data: {accessId: accessId},
            success: function (responce) {
                $("#step").html(responce);
            }
        });
    }

    function goToStepOne() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/FormStepOne'; ?>",
            data: {accessId: '<?php echo $accessId; ?>'},
            success: function (responce) {
                $("#step").html(responce);
            }
        });
    }

    function skip() {
        isStepTwoCompleted = 0;
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/IsSecondStepFinished'; ?>",
            data: {accessId: '<?php echo $accessId; ?>'},
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    if (responce.data.status == 1) {
                        isStepTwoCompleted = 1;
                    }
                }
            }
        });

        goToStepThree('<?php echo $accessId; ?>');
    }

</script>