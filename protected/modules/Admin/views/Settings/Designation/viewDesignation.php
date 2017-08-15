<?php
$form = $this->beginWidget('CActiveForm', array('id' => 'formAddDesignation'));
?>
<div class="row">
    <div class="col s12">
        <div class="card ">
            <div class="card-content">
                <h5 class="grey-text text-darken-1">Add Designation</h5>

                <div class="row">
                    <div class="col s12 m8">
                        <div class="input-field">
                            <?php echo Chtml::dropDownList('ref_cat_id', "", CHtml::listData(AdmCategory::model()->findAll(), 'cat_id', 'cat_name'), array('empty' => 'Select Category')); ?>                                    
                            <label>Category</label>
                        </div>
                    </div>
                    <div class="col s12 m8">
                        <div class="input-field">
                            <input id="hiddenId" name="hiddenId" type="hidden" value="0" required>
                            <input id="name" name="name" type="text" autocomplete="off" required>
                            <label>Designation Name</label>
                        </div>
                    </div>
                </div>              

            </div>
            <div class="card-action right-align">
                <button type="button" class=" btn waves-effect waves-light red lighten-1" onclick="clearDesignation()">Clear </button>               
                <button id="saveIndustry" type="submit" class="btn waves-effect waves-light blue lighten-1">Save   </button>             

            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

<!--Data Showing area-->
<div class="ajaxLoad"></div>

<!-- ===========================================================================
        Custom Script
============================================================================ -->

<script>
    //Delete Input
    $(document).on('click', '.btn-delete-input', function () {
        var clickedId = this.id;
        var id = clickedId.split("_")[1];
        if (id > 0) {
            deleteSubCategory(id);
        }

        $(this).parents('.input-no-label').remove();
    });

    //Form clean
    $(document).on('click', '.btn-form-clean', function () {
        buildInput('.row-input', true);
        $('input').val('');
        $(document).ready(function () {
            Materialize.updateTextFields();
        });
    });

    $(document).ready(function () {

        $('select').material_select();
    });


</script>

<!-- ===========================================================================
        Backend Script
============================================================================ -->
<script type="text/javascript">
    $(document).ready(function (e) {
        loadDesignation();
    });

    function loadDesignation() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Designation/ViewDesignationData'; ?>",
            data: '',
            success: function (responce) {
                $(".ajaxLoad").html(responce);
            }
        });
    }

    $("#formAddDesignation").validate({
        submitHandler: function () {
            SaveDesignation();
        }
    });

    function SaveDesignation() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Designation/SaveDesignation'; ?>",
            data: $('#formAddDesignation').serialize(),
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    Message.success(responce.msg);
                    $("#formAddDesignation")[0].reset();
                    loadDesignation();
                }
            }
        });
    }

    function loadDataToEdit(data) {

        //Update Text fields
        $(document).ready(function () {
            Materialize.updateTextFields();
            //page Scroll to up
            Scroll.toUp();
        });

        $("#formAddDesignation")[0].reset();
        var designations = data.designationData;

        $('#hiddenId').val(designations.desig_id);
//        $('#ref_cat_id').val();
        $('#name').val(designations.desig_name);
        $('#ref_cat_id').find('option[value="'+designations.ref_cat_id+'"]').prop('selected',true);

        $('select').material_select();
    }

    function clearDesignation() {
        $("#formAddDesignation")[0].reset();
        $("#hiddenId").val('0');
        $(document).ready(function () {
            Materialize.updateTextFields();
        });
    }

</script>


