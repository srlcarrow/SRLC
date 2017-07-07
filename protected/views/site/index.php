<?php
//==============================================================================
//    CSS
//==============================================================================
//
//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/admin/main.css', 'screen');
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
                <button type="submit" class="btn btn-success adm-btn adm-right">Save</button>
                <button type="button" class="btn btn-danger adm-btn adm-right">Clear</button>
            </div>
        </div>

    </div>
</div>

<!--Data Showing area-->
<div class="row mt-30">
    <div class="col-md-12">
        <h4 class="mb-15">Show Details</h4>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>Category 1</td>
                    <td>2</td>
                    <td class="adm-tbl-action_2">
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-warning" title="Edit">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button type="button" class="btn btn-danger" title="Delete">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Category 2</td>
                    <td>1</td>
                    <td class="adm-tbl-action_2">
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-warning" title="Edit">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button type="button" class="btn btn-danger" title="Delete">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
