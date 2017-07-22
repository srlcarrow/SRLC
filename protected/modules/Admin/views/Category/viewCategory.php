<!--JS | Jquery Lib-->
<script src="<?php //echo Yii::app()->baseUrl . '/js/lib/jquery-3.2.1.min.js';      ?>"></script>
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'formAddCategory')); ?>
<div class="row">
    <div class="col s12">
        <div class="card ">
            <div class="card-content">
                <h5 class="grey-text text-darken-1">Add Category</h5>

                <div class="row">
                    <div class="col s12 m8">
                        <div class="input-field">
                            <input name="name" type="text" required>
                            <label >Category Name</label>

                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="input-field">
                            <input name="order" type="text" required>
                            <label>Category Order</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button type="button" class="cm-btn add right add-new-input"><i class="material-icons left">&#xE148;</i>Add
                            New
                        </button>
                    </div>
                </div>

                <div class="row row-input">
                    <div class="col s4 input-no-label">
                        <input id="hiddenSubCatId_0" name="hiddenSubCat_0" type="hidden" value="0" class="hiddenSubCat">
                        <input id="subCatId_0" name="subCatName_0" type="text" class="pr-20">
                        <button class="cm-btn ps-absolute right-5 btn-delete-input">
                            <i class="material-icons m-0 red-text">delete</i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="card-action right-align">
                <button type="button" class=" btn waves-effect waves-light red lighten-1">Clear</button>
                <button id="saveCategory" type="submit" class="btn waves-effect waves-light blue lighten-1">Save</button>

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
    var i = 0;
    function buildInput(appendEle) {
        i = i + 1;
        //Clear old
        if (arguments[1]) {
            $(appendEle).html('');
        }

        var html = '';
        html += '<div class="col s4 input-no-label">';
        html += '<input type="hidden" id="hiddenSubCatId_' + i + '" name="hiddenSubCat_' + i + '" value="0" class="hiddenSubCat">';
        html += '<input type="text" id="subCatId_' + i + '" name="subCatName_' + i + '" class="pr-20">';
        html += '<button class="cm-btn ps-absolute right-5 btn-delete-input">';
        html += '<i class="material-icons m-0 red-text">delete</i>';
        html += '</button>';
        html += '</div>';

        $(appendEle).append(html);
    }

    //Add new inputs
    $('.add-new-input').on('click', function () {
        buildInput('.row-input');
    });

    //Delete Input
    $(document).on('click', '.btn-delete-input', function () {
        $(this).parents('.input-no-label').remove();
    });

    $(document).on('click', '.btn-form-clean', function () {
        buildInput('.row-input', true);
        $('input').val('');
    });


</script>

<!-- ===========================================================================
        Backend Script
============================================================================ -->
<script type="text/javascript">
    $(document).ready(function (e) {
        loadCategoryData();
    });

    function loadCategoryData() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Category/ViewCategoryData'; ?>",
            data: '',
            success: function (responce) {
                $(".ajaxLoad").html(responce);
            }
        });
    }
    $('#saveCategory').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Category/SaveCategory'; ?>",
            data: $('#formAddCategory').serialize(),
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    Message.success(responce.msg);
                    $("#formAddCategory")[0].reset();
                    $('.row-input > .input-no-label').not(':first').remove();
                    loadCategoryData();
                }
            }
        });
    });

    function loadDataToEdit(data) {
        $("#formAddCategory")[0].reset();
        if (data.length > 0) {
            $('.row-input > .input-no-label').remove();
        } else {
            $('.pr-20').attr('value', '');
            $('.row-input > .input-no-label').not(':first').remove();
        }

        for (var i = 0, max = data.length; i < max; i++) {
            var html = '';
            html += '<div class="col s4 input-no-label">';
            html += '<input type="hidden" id="hiddenSubCatId_' + i + '" name="hiddenSubCat_' + i + '" value="' + data[i]['scat_id'] + '" class="hiddenSubCat">';
            html += '<input type="text" id="subCatId_' + i + '"  name="subCatName_' + i + '" value="' + data[i]['scat_name'] + '" class="pr-20">';
            html += '<button class="cm-btn ps-absolute right-5 btn-delete-input">';
            html += '<i class="material-icons m-0 red-text">delete</i>';
            html += '</button>';
            html += '</div>';

            $('.row-input').append(html);
        }
    }

</script>
