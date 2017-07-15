<div class="row">
    <div class="col s12">
        <div class="card ">
            <div class="card-content">
                <h5 class="grey-text text-darken-1">Add Category</h5>

                <div class="row">
                    <div class="col s12 m8">
                        <div class="input-field">
                            <input type="text">
                            <label>Category Name</label>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="input-field">
                            <input type="text">
                            <label>Category Order</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button class="cm-btn add right add-new-input"><i class="material-icons left">&#xE148;</i>Add
                            New
                        </button>
                    </div>
                </div>

                <div class="row row-input">
                    <div class="col s4 input-no-label">
                        <input type="text" class="pr-20">
                        <button class="cm-btn ps-absolute right-5 btn-delete-input">
                            <i class="material-icons m-0 red-text">delete</i>
                        </button>
                    </div>

                </div>

            </div>
            <div class="card-action right-align">
                <button type="button" class=" btn waves-effect waves-light red lighten-1 btn-form-clean">Clear</button>
                <button type="submit" class="btn waves-effect waves-light blue lighten-1">Save</button>
            </div>
        </div>
    </div>
</div>


<!--Data Showing area-->
<div class="ajaxLoad"></div>

<!-- ===========================================================================
        Custom Script
============================================================================ -->

<script>

    function buildInput(appendEle) {

        //Clear old
        if (arguments[1]) {
            $(appendEle).html('');
        }

        var html = '';
        html += '<div class="col s4 input-no-label">';
        html += '<input type="text" class="pr-20">';
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
            dataType: 'json',
            success: function (responce) {

            }
        });
    }
</script>
