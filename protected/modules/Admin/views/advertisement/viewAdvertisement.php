<!--echo  $this->module->assetsUrl-->
<!-- Include external CSS. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
      type="text/css"/>
<link rel="stylesheet" href="<?php echo $this->module->assetsUrl ?>/css/plugins/editor/codemirror.css">

<!-- Include Editor style. -->
<link href="<?php echo $this->module->assetsUrl ?>/css/plugins/editor/froala_editor.pkgd.min.css" rel="stylesheet"
      type="text/css"/>
<link href="<?php echo $this->module->assetsUrl ?>/css/plugins/editor/froala_style.min.css" rel="stylesheet"
      type="text/css"/>


<div class="ajaxLoadAdd"></div>
<div class="row">

    <div class="col s12">
        <button class="cm-btn add right addNew">
            <i class="material-icons left">&#xE148;</i>Add New
        </button>
    </div>

    <div class="col s12 addForm hide-block">

    </div>
</div>

<div class="row search-area">
    <div class="col s12">
        <div class="card-panel">
            <div class="search-input-wrp grey lighten-3">
                <div class="search-input">
                    <i class="material-icons search-icon blue-text text-lighten-3">search</i>
                    <input class="input-search" type="text" placeholder="Search">
                </div>
                <div class="search-action">
                    <button class="border-r-0 btn waves-effect waves-light btn-search deep-orange">Search</button>
                </div>
                <div class="search-action">
                    <button class="waves-effect waves-teal btn-flat btnAdvance">Advance</button>
                </div>
            </div>

            <div class="row hide-block more-panel">
                <div class="col s4">
                    <div class="input-field">
                        <input type="text">
                        <label>Label</label>
                    </div>
                </div>
                <div class="col s4">
                    <div class="input-field">
                        <input type="text">
                        <label>Label</label>
                    </div>
                </div>
                <div class="col s4">
                    <div class="input-field">
                        <input type="text">
                        <label>Label</label>
                    </div>
                </div>

                <!--Action Area-->
                <div class="col s12 right-align">
                    <button type="button" class=" btn waves-effect waves-light btnAdvance red">Close</button>
                    <button type="button" class=" btn waves-effect waves-light deep-orange">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ajaxLoad"></div>

<script>
    $(document).ready(function (e) {
        loadAdvertisementData();
    });

    function loadAdvertisementData() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Advertisement/ViewAdvertisementData'; ?>",
            data: '',
            success: function (responce) {
                $(".ajaxLoad").html(responce);
            }
        });
    }
</script>

<script>
    //Add New
    $('.addNew').on('click', function () {
        $('.addNew,.search-area,.details-cards').slideUp('fast', function () {
            $('.addForm').slideDown('slow');
            $.ajax({
                type: 'POST',
                url: "<?php echo Yii::app()->baseUrl . '/Admin/Advertisement/ViewAddAdvertisement'; ?>",
                data: '',
                success: function (responce) {
                    $('.addNew,.search-area,.details-cards').slideUp('fast', function () {
                        $(".ajaxLoadAdd").html(responce);
                        $('.company-form').slideDown('slow');

                    })
                }
            });
        });
    });

    //Close Form
    $('.btn_close').click(function (e) {
        $('.addForm').slideUp('fast', function () {
            $('.search-area,.details-cards').slideDown('slow', function () {
                $('.addNew').slideDown('fast');
            });
        })
    });

    //Card expand script
    $(function () {
        $('.btn_expand').on('click', function () {
            var $this = $(this);
            var card = $this.parents('.expand-card');

            if (!$this.hasClass('expand')) {
                $this.addClass('expand').html('expand_less');
                card.find('.expand-card-content').slideDown('fast');
            } else {
                $this.removeClass('expand').html('expand_more');
                card.find('.expand-card-content').slideUp('fast');
            }
        });
    });

    //Order edit
    $('.btn-editAndSave').on('click', function () {
        var $this = $(this);
        var input = $this.prev('input');
        if (input.is(':disabled')) {
            input.prop('disabled', false);
            $this.find('i').html('save');
        } else {
            input.prop('disabled', true);
            $this.find('i').html('edit');
        }
    });

    $(document).ready(function () {
        $('select').material_select();
    });
</script>

