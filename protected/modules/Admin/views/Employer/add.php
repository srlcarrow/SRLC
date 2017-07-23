<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>-->
<?php
// Image Crop
Yii::app()->clientScript->registerCssFile($this->module->assetsUrl . '/css/plugins/imageCrop/image-crop.css', 'screen');

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/lib/jquery.2.0.0.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl . '/js/plugins/imageCrop/jquery.cropit.js', CClientScript::POS_HEAD);
?>


<div class="row">


    <div class="col s12">
        <button class="cm-btn add right addNewCompany">
            <i class="material-icons left">&#xE148;</i>Add New
        </button>
    </div>

    <div class="col s12 company-form">
        <div class="card ">
            <div class="card-content">
                <h5 class="grey-text text-darken-1">Add Company</h5>

                <div class="row">
                    <div class="col s12 m5">
                        <div class="row">
                            <div class="col s12">

                                <div class="image-editor">
                                    <div class="dist">
                                        <p>Add photo by dropping them here</p>
                                        <img src="<?php echo $this->module->assetsUrl; ?>/css/plugins/imageCrop/gallery.svg">
                                    </div>
                                    <div class="image-wrp dash-br">
                                        <div class="cropit-preview no-background"></div>
                                    </div>
                                    <div class="action-wrp">
                                        <!--set error msg-->
                                        <div class="error-msg"></div>
                                        <div class="upload-wrp">
                                            <div class="upload dark">
                                                <input type="file" class=" cropit-image-input" >
                                            </div>
                                            <span>Image Upload</span>
                                        </div>

                                        <div class="range-slider">
                                            <input min="0" max="1" type="range" step="0.01" class="cropit-image-zoom-input rangeSlide" data-rangeslider>
                                            <!--<input min="0" max="1" step="0.01" type="range" class="rangeSlide" data-rangeslider>-->
                                        </div>
                                        <p class="upload-note">Please make sure you will upload only 'jpg' file that is not exceeding 5 MB </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m7">
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Company Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Contact No</label>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Contact No (Optional)</label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="email">
                                    <label>Email</label>
                                </div>
                            </div>

                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Contact Person</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="card-action right-align">
                <button type="button" class=" btn_close_Company btn waves-effect waves-light red lighten-1">Close
                </button>
                <button type="button" class=" btn waves-effect waves-light red lighten-1">Clear</button>
                <button type="submit" class="btn waves-effect waves-light blue lighten-1">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="row search-area ">
    <div class="col s12">
        <div class="card-panel">
            <div class="search-input-wrp grey lighten-3">
                <div class="search-input">
                    <i class="material-icons search-icon blue-text text-lighten-3">search</i>
                    <input class="input-search" type="text" placeholder="Search">
                </div>
                <div class="search-action">
                    <button class="btn waves-effect waves-light btn-search deep-orange">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-0 company-cards ">
    <div class="col s12">
        <div class="card-panel expand-card detail-card outer-tb-15">
            <div class="row mb-0 expand-card-head">
                <div class="col s11">
                    <div class="row mb-0">
                        <div class="col s6">
                            <h6 class="grey-text text-darken-1 ">Abc Company</h6>
                        </div>
                        <div class="col s3">
                            <h6 class="grey-text text-darken-1">E0023</h6>
                        </div>
                    </div>
                </div>
                <div class="col s1 mt-5">
                    <i class="right material-icons btn_expand">expand_more</i>
                </div>
            </div>

            <div class="row expand-card-content mb-0 ">
                <div class="col s12 mt-20">
                    Content
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <ul class=" right pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
</div>

<!-- ===========================================================================
        Custom Script
============================================================================ -->

<script>
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


    $('.addNewCompany').on('click', function () {
        $('.search-area,.company-cards').slideUp('fast', function () {
            $('.company-form').slideDown('slow');
        })
    });

    $('.btn_close_Company').on('click', function () {
        $('.company-form').slideUp('fast', function () {
            $('.search-area,.company-cards').slideDown('slow');
        })
    });

</script>

<!-- ===========================================================================
       Plugin Script
============================================================================ -->
<!--<script>-->
<!--    $(function() {-->
<!--        $('.image-editor').cropit({-->
<!--            exportZoom: 1.25,-->
<!--            imageBackground: true,-->
<!--            imageBackgroundBorderWidth: 20,-->
<!--            imageState: {-->
<!--                src: 'http://lorempixel.com/500/400/',-->
<!--            },-->
<!--        });-->
<!---->
<!--        $('.rotate-cw').click(function() {-->
<!--            $('.image-editor').cropit('rotateCW');-->
<!--        });-->
<!--        $('.rotate-ccw').click(function() {-->
<!--            $('.image-editor').cropit('rotateCCW');-->
<!--        });-->
<!---->
<!--        $('.export').click(function() {-->
<!--            var imageData = $('.image-editor').cropit('export');-->
<!--            window.open(imageData);-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script>



    $(window).load(function () {
        resetAl();

        $('.image-editor').cropit({
            imageBackground: true,
            onImageLoading: function () {

            },
            onImageLoaded: function () {

            },
            onImageError: function (e) {
//                e.message
            },
            width: 225,
            height: 150
        });

        $('.export').click(function () {
            var $modal = $('#myModal2');
            var $imageCropper = $('.image-editor');
            var imageData = $imageCropper.cropit('export', {
                type: 'image/jpeg'
            });
            //reset
            resetAl();
        });
        function resetAl() {
            $('.dist').css('display', 'block');
            $('.image-wrp').removeClass('solid-br').addClass('dash-br');
            $('.cropit-preview-image').attr('src', '');
            $('.cropit-image-zoom-input').val(0);
            $('.cropit-preview-background').attr('src', '');
        }
    })


</script>

<!-- ===========================================================================
        Backend Script
============================================================================ -->

