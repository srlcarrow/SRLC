<?php
//==============================================================================
//    CSS
//==============================================================================
//
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/admin/main.css', 'screen');
?>

<div class="panel panel-default adm-panel">
    <div class="panel-heading">
        <h3>Add Category</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Category Order</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary adm-btn adm-right">Save</button>
                <button type="button" class="btn btn-danger adm-btn adm-right">Clear</button>
            </div>
        </div>

    </div>
</div>
