<div class="row details-cards">
    <div class="col s12">
        <?php
        foreach ($data as $value) {
            $designation = AdmDesignation::model()->findByPk($value->ref_designation_id);
            ?>
            <div class="card-panel expand-card detail-card outer-tb-15">
                <div class="row mb-0 expand-card-head">
                    <div class="col s11">
                        <div class="row mb-0">
                            <div class="col s1 ps-relative">
                                <input value="12" type="text" disabled="disabled" class="disabled h-20">
                                <button class="cm-btn ps-absolute right-5 btn-editAndSave">
                                    <i class="material-icons m-0 red-text">edit</i>
                                </button>
                            </div>
                            <div class="col s3">
                                <h6 class="grey-text text-darken-1 "><?php echo $value->ad_reference; ?></h6>
                            </div>
                            <div class="col s4">
                                <h6 class="grey-text text-darken-1"><?php echo $value->ad_is_use_desig_as_title == 1 ? $designation->desig_name : $value->ad_title; ?></h6>
                            </div>
                            <div class="col s4">
                                <h6 class="grey-text text-darken-1">Lorem ipsum.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col s1 mt-5">
                        <button id="<?php echo $value->ad_id; ?>" onclick="edit(this.id)">Edit</button>
    <!--                        <i id="<?php // echo $value->ad_id;   ?>" class="right material-icons btn_expand" onclick="edit(this.id)">expand_more</i>                        -->
                    </div>
                    <div class="ajaxLoadAdData"></div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>

<div class="col-xs-12 col-md-10 col-md-offset-1">
    <div class="site-pagination">
        <?php
        Paginations::setLimit(10);
        Paginations::setPage($currentPage);
        Paginations::setJSCallback("loadAdvertisementData");
        Paginations::setTotalPages($pageCount);
        Paginations::makePagination();
        Paginations::drawPagination();
        ?>
    </div>
</div>

<script>
    function edit(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Advertisement/EditAdvertisement'; ?>",
            data: {id: id},
            success: function (responce) {
                $(".ajaxLoadAdData").html(responce);
            }
        });
    }
</script>