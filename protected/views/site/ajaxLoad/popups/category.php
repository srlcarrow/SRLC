<div class="fifty-block man-category">
    <ul class="category-list main">
        <li><a class="all" id="c_0" onclick="getSubCat(this.id)" href="">All</a></li>
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
        $("#subCat ul").append('<li><a id="sub_0" href="">All</a></li>');
        for (var i = 0, max = subCategories.length; i < max; i++) {
            $("#subCat ul").append('<li><a id="sub_' + subCategories[i]['scat_id'] + '" href="" onclick="loadAdvertisementData(1)">' + subCategories[i]['scat_name'] + '<span>(add count)</span></a></li>');
        }
    }
</script>