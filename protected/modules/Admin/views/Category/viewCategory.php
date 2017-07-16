<!--JS | Jquery Lib-->
<script src="<?php echo Yii::app()->baseUrl . '/js/lib/jquery-3.2.1.min.js'; ?>"></script>
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'formAddCategory')); ?>
<div class="row">
    <div class="col s12">
        <div class="card ">
            <div class="card-content">
                <h5 class="grey-text text-darken-1">Add Category</h5>

                <div class="row">
                    <div class="col s12 m8">
                        <div class="input-field">
                            <input name="name" type="text">
                            <label >Category Name</label>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="input-field">
                            <input name="order" type="text">
                            <label>Category Order</label>
                        </div>
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
                    loadCategoryData();
                }
            }
        });
    });

</script>
