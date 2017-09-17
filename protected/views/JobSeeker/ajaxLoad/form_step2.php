<?php $form = $this->beginWidget('CActiveForm', array('id' => 'formStepTwo')); ?>
<div class="col-md-12 ">

    <div class="row mb-15">

        <div class="col-md-6">
            <div class="selector dark">
                <div class="selected-option">
                    <span>Industry</span>
                </div>

                <ul class="option-list"></ul>
                <?php echo Chtml::dropDownList('ind_id', "", CHtml::listData(AdmIndustry::model()->findAll(), 'ind_id', 'ind_name'), array('empty' => 'Select Type')); ?>

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

                <?php echo Chtml::dropDownList('cat_id', "", CHtml::listData(AdmCategory::model()->findAll(array('order' => 'cat_order')), 'cat_id', 'cat_name'), array('empty' => 'Select District', 'options' => array($jsEmploymentData->ref_category_id => array('selected' => true)), 'onChange' => 'loadSubCategories()')); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="selector dark">
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
            <div class="selector dark">
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
                        Select.init();
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
                        Select.init();
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
            data: $('#formStepTwo').serialize() + '&jsBasicKey=<?php echo $jsBasicKey; ?>',
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    goToStepThree(responce.data.jsBasicKey);
                }
            }
        });
    }


    function goToStepThree(jsBasicKey) {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/FormStepThree'; ?>",
            data: {jsBasicKey: jsBasicKey},
            success: function (responce) {
                $("#step").html(responce);
            }
        });
    }

    function goToStepOne() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/FormStepOne'; ?>",
            data: {jsBasicKey: '<?php echo $jsBasicKey; ?>'},
            success: function (responce) {
                $("#step").html(responce);
            }
        });
    }

</script>