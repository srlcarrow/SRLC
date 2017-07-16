<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">

                <h5 class="grey-text text-darken-1">Categories</h5>

                <table class="responsive-table bordered striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $row = 1;
                        foreach ($categories as $category) {
                            ?>
                            <tr>
                                <td><?php echo $row; ?></td>
                                <td><?php echo $category->cat_name; ?></td>
                                <td><?php echo $category->cat_order; ?></td>
                                <td class="adm-tbl-action_2">
                                    <a href="<?php echo $category->cat_id; ?>"><i class="material-icons grey-text lighten-2">mode_edit</i></a>
                                    <a id="<?php echo $category->cat_id; ?>" onclick="deleteCategory(this.id)"><i class="material-icons red-text lighten-2">delete</i></a>
                                </td>
                            </tr>
                            <?php
                            $row++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteCategory(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Category/DeleteCategory'; ?>",
            data: {id: id},
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    loadCategoryData();
                }
            }
        }
        );
    }
</script>