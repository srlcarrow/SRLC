<?php
$form = $this->beginWidget('CActiveForm', array('id' => 'editEmployer', 'htmlOptions' => array(
        'novalidate' => 'novalidate',
        )));
?>
<div class="col-md-12 pl-30 pr-0">
    <div class="input-wrapper">
        <input type="text" class="" name="comName" value="<?php echo $empEmployers->employer_name; ?>" required>
        <div class="float-text">Company Name</div>
    </div>
    <div class="input-wrapper">
        <input type="text" class="" name="address" value="<?php echo $empEmployers->employer_address; ?>" required>
        <div class="float-text">Address</div>
    </div>
    <div class="input-wrapper">
        <input type="text" class="" name="contactNo" value="<?php echo $empEmployers->employer_tel; ?>" required>
        <div class="float-text">Contact No</div>
    </div>
    <div class="input-wrapper">
        <input type="text" class="" name="contactNoOp" value="<?php echo $empEmployers->employer_mobi; ?>">
        <div class="float-text">Contact No(Optional)</div>
    </div>
    <div class="input-wrapper">
        <input type="text" class="" name="contactPer" value="<?php echo $empEmployers->employer_contact_person; ?>" required>
        <div class="float-text">Name of Contact Person</div>
    </div>
    <div class="selector dark industrySelect mb-15">
        <div class="selected-option">
            <span>Industry</span>
        </div>
        <ul class="option-list"></ul>
        <?php echo Chtml::dropDownList('ind_id', "", CHtml::listData(AdmIndustry::model()->findAll(), 'ind_id', 'ind_name'), array('empty' => 'Select Industry', 'options' => array($empEmployers->ref_ind_id => array('selected' => true)), 'required' => 'required')); ?>
    </div>
    <div class="selector dark districtSelect mb-15">
        <div class="selected-option">
            <span>District</span>
        </div>
        <ul class="option-list"></ul>
        <?php echo Chtml::dropDownList('district_id', "", CHtml::listData(AdmDistrict::model()->findAll(), 'district_id', 'district_name'), array('empty' => 'Select District', 'options' => array($empEmployers->ref_district_id => array('selected' => true)), 'onChange' => 'loadCities()')); ?>
    </div>
    <div class="selector dark citySelect mb-15">
        <div class="selected-option">
            <span>District</span>
        </div>
        <ul class="option-list"></ul>
        <select id="city" name="city" class="city"></select>
    </div>

</div>

<div class="col-md-12  mt-10">
    <div class="message cm-message"></div> 
</div>

<div class="col-md-12 mt-15 pr-0">
    <button type="submit" class="cm-btn large text-uppercase light-blue right">Save</button>
</div>
<?php $this->endWidget(); ?>
<script>
    Input.init();
    Select.init('.industrySelect');
    Select.init('.districtSelect');
    Select.init('.citySelect');

    $('#editEmployer').submit(function (e) {
        e.preventDefault();

        var $form = $(this);

        if (!$form.valid())
            return;

        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Employer/EditEmployer'; ?>",
            data: $('#editEmployer').serialize(),
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {

                }
            }
        });
    });

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
                        Select.init('.citySelect');
                        $("#city > [value=" + '<?php echo $empEmployers->ref_city_id; ?>' + "]").attr("selected", "true");
                    }, 200)
                }
            }
        });
    }
</script>