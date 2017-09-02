<?php
//--------------------------------------------
//Javascript
//--------------------------------------------
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/custom/advertisement.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/custom/advertisement.server.js', CClientScript::POS_HEAD);
?>

<div class="nav-bar-space"></div>

<section class="main-block add-block">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12 mb-25">
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/company/logo/wso2.logo.png" alt="">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-dark-blue mb-25">Visual Designer</h2>

                                <p class="text-dark-blue">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="side-panel">
                            <div class="side-panel-row">
                                <h6 class="title">Type</h6>
                                <h6 class="info">Full Time</h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Experience</h6>
                                <h6 class="info">3+ Years</h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Address</h6>
                                <h6 class="info">182/1, Darmapala Mawatha, Colombo 2</h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Salary</h6>
                                <h6 class="info">Negotiable</h6>
                            </div>

                            <div class="side-panel-row">
                                <button type="button" class="cm-btn large light-blue-4 up-case btn-apply-job">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
