<?php
$form = $this->beginWidget('CActiveForm', array('id' => 'frmApplyJob',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),));

$model = new EmpAdvertisement();
?>
<div class="row">
    <div class="col-md-12">
        <h3 class="text-black mb-50 text-center">Apply Job</h3>

        <form>
            <?php
            if ($user == NULL || $user == 0) {
                ?>
                <!--New-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-wrapper">
                                    <input id="fname" name="fname" type="text">
                                    <div class="float-text">First Name</div>
                                </div>


                                <div class="input-wrapper">
                                    <input id="email" name="email" type="text">
                                    <div class="float-text">Email</div>
                                </div>
                            </div>
                        </div>

                        <div class="float-block mt-15">
                            <div class="d-table">
                                <div class="d-table-cell width-0">
                                    <div class="text-nowrap pr-20"><h5>Upload CV</h5></div>
                                </div>
                                <div class="d-table-cell width-100">
<!--                                    <div class="file-uploader width-100">-->
<!--                                        <div class="button width-100 text-center">Brows...</div>-->
<!--                                        <input type="file">-->
<!--                                    </div>-->
                                    <div class="file-uploader width-100">
                                        <div class="button width-100 text-center">Brows...</div>
                                        <?php
//                                        echo $form->labelEx($model, 'image');
                                        echo CHtml::activeFileField($model, 'image');
                                        echo $form->error($model, 'image');
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php
            if ($user != NULL && $user > 0) {
                ?>
                <!--Ex-->
                <div class="row">
                    <div class="col-md-12 mb-30">

                        <div class="row">
                            <div class="col-md-12">
                                <input class="radio-group" id="existing" checked="checked" name="group1"
                                       type="radio">
                                <label for="existing">Apply using existing CV</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <input class="radio-group " id="newUsers" data-show="newUser" name="group1" type="radio">
                                <label for="newUsers">Upload New CV</label>
                            </div>

                            <div class="col-md-12 mt-10 hide-show newUser hide-block">


                                <div class="float-block mt-15">
                                    <div class="d-table">
                                        <div class="d-table-cell width-0">
                                            <div class="text-nowrap pr-20"><h5>Upload CV</h5></div>
                                        </div>
                                        <div class="d-table-cell width-100">
                                            <div class="file-uploader width-100">
                                                <?php
                                                echo $form->labelEx($model, 'image');
                                                echo CHtml::activeFileField($model, 'image');
                                                echo $form->error($model, 'image');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 float-block mt-20">
                        <button id="Register" type="submit" onclick=""
                                class="cm-btn large text-uppercase light-blue right">Register
                        </button>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="row">
                <div class="col-md-12 float-block mt-20">
                    <button id="Register" type="submit" onclick=""
                            class="cm-btn large text-uppercase light-blue right">Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->endWidget(); ?>

<script>
    Input.init();

    $('.radio-group').on('change', function () {
        var $this = $(this);
        var show = $this.data('show');

        $('.hide-show').slideUp('fast', function () {

            $('.' + show).slideDown('slow')

        })
    });

    $('#frmApplyJob').submit(function (e) {
        $.ajax({
            url: "<?php echo Yii::app()->baseUrl . '/Advertisement/UploadCV'; ?>",
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false
        });
        e.preventDefault();
    });


</script>
