<?php
foreach ($employers as $employer) {
    ?>
    <div class="row mb-0 company-cards ">
        <div class="col s12">
            <div class="card-panel expand-card detail-card outer-tb-15">
                <div class="row mb-0 expand-card-head">
                    <div class="col s11">
                        <div class="row mb-0">
                            <div class="col s6">
                                <h6 class="grey-text text-darken-1 "><?php echo $employer->employer_name; ?></h6>
                            </div>
                            <div class="col s3">
                                <h6 class="grey-text text-darken-1"><?php echo $employer->employer_reference_no; ?></h6>
                            </div>
                            <div class="col s3">
                                <button id="<?php echo $employer->employer_id; ?>" onclick="publishAdvertisement(this.id)" class="border-r-0 btn waves-effect waves-light" type="button">Create Advertisement</button>                                
                            </div>
                        </div>
                    </div>
                    <div class="col s1 mt-5">
                        <i id="<?php echo $employer->employer_id; ?>" class="right material-icons btn_expand" onclick="loadEmployerData(this.id,this)">expand_more</i>
                    </div>
                </div>

                <div class="row expand-card-content mb-0 ">
                    <div class="col s12 mt-20">
                        <div class="row mb-0">
                            <div class="ajaxLoad"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
}
?>

<div class="col-xs-12 col-md-10 col-md-offset-1">
    <div class="site-pagination">
        <?php
        Paginations::setLimit(2);
        Paginations::setPage($currentPage);
        Paginations::setJSCallback("loadEmployerData");
        Paginations::setTotalPages($pageCount);
        Paginations::makePagination();
        Paginations::drawPagination();
        ?>
    </div>
</div>


<script>
    function loadTab() {
        $('.company-cards').each(function () {
            $(this).find('ul.tabs').tabs();
        });
    }



    $(function () {
        $('.btn_expand').on('click', function () {
            var $this = $(this);
            var card = $this.parents('.expand-card');

            if (!$this.hasClass('expand')) {
                $this.addClass('expand').html('expand_less');
                card.find('.expand-card-content').slideDown('fast');
                loadTab();
            } else {
                $this.removeClass('expand').html('expand_more');
                card.find('.expand-card-content').slideUp('fast');
            }
        });
    });
    
    
    function loadEmployerData(id,_this) {
        var $parent = $(_this).parents('.expand-card');
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Employer/LoadEmployerData'; ?>",
            data: {id: id},
            success: function (responce) {
                $parent.find('.ajaxLoad').html(responce);
            }
        });
    }


    function publishAdvertisement(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Employer/ViewAddAdvertisement'; ?>",
            data: {id: id},
            success: function (responce) {
                $('.search-area,.company-cards').slideUp('fast', function () {
                    $("#ajaxLoadAdd").html(responce);
                    $('.company-form').slideDown('slow');
                })
            }
        });
    }


</script>