<div class="fifty-block man-category">
    <ul class="category-list main">
        <?php
        foreach ($categories as $category) {
            ?>
            <li><a id="<?php echo "c_" . $category->cat_id; ?>" onclick="getSubCat(this.id)" href=""><?php echo $category->cat_name; ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
<div id="subCat" class="fifty-block sub-category">
    <ul class="category-list sub overflow-scroll">
        <!--Sub Categories Load Here-->
    </ul>
</div>

<script>
    function getSubCat(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Site/GetSubCategoriesByCatId'; ?>",
            data: {id: id},
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    loadSubCategories(responce.data);
                }
            }
        });
    }

    function loadSubCategories(data) {
        $("#subCat ul").html("");
        var subCategories = data.subCategoryData;
        for (var i = 0, max = subCategories.length; i < max; i++) {
            $("#subCat ul").append('<li><a id="sub_"' + subCategories[i]['scat_id'] + ' href="">' + subCategories[i]['scat_name'] + '<span>(add count)</span></a></li>');
        }
    }


</script>