<div class="row">
    <div class="col s12">
        <div class="card ">
            <div class="card-content">
                <h5 class="grey-text text-darken-1">Add Category</h5>

                <div class="row">
                    <div class="col s12 m8">
                        <div class="input-field">
                            <input type="text">
                            <label >Category Name</label>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="input-field">
                            <input type="text">
                            <label>Category Order</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-action right-align">
                <button type="button" class=" btn waves-effect waves-light red lighten-1">Clear</button>
                <button type="submit" class="btn waves-effect waves-light blue lighten-1">Save</button>
            </div>
        </div>
    </div>
</div>


<!--Data Showing area-->
<div class="ajaxLoad"></div>

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
            url: "<?php echo Yii::app()->createUrl('Category/ViewCategoryData'); ?>",
            data: '',
            dataType: 'json',
            success: function (responce) {
                if (responce.status == 'success') {

                }
            }
        });
    }
</script>
