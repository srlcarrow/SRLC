<?php
//--------------------------------------------
//Javascript
//--------------------------------------------
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/custom/advertisement.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/custom/advertisement.server.js', CClientScript::POS_HEAD);
?>
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'frmAdver')); ?>
<?php
$employerData = EmpEmployers::model()->findByPk($adData->ref_employer_id);
$companyLogo = count($employerData) > 0 ? $employerData->employer_image : '';
$employerAddress = count($employerData) > 0 ? $employerData->employer_address : '';

$workType = AdmWorkType::model()->findByPk($adData->ref_work_type_id);
$workType = count($workType) > 0 ? $workType->wt_name : 'Not Mentioned';

$jobPostUrl = $adData->ad_is_image == 1 ? $adData->ad_image_url : "";
$jobPostText = $adData->ad_is_image != 1 ? $adData->ad_text : "";
?>
<div class="nav-bar-space"></div>

<section class="main-block add-block">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="row">
                    <?php
                    if ($adData->ad_is_image == 0) {
                        ?>
                        <div class="col-md-12 mb-25">
                            <img src="<?php echo Yii::app()->baseUrl ?>/uploads/company/logo/<?php echo $companyLogo; ?>" alt="">
                        </div>
                        <?php
                    }
                    ?>

                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <!-- Image -->
                            <?php
                            if ($adData->ad_is_image == 1) {
                                ?>
                                <div class="col-md-12">                                                           
                                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl . "/" . $jobPostUrl; ?>" alt=""/>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($adData->ad_is_image == 0) {
                                ?>
                                <!-- text -->
                                <div class="col-md-12">
                                    <h2 class="text-dark-blue mb-25"><?php echo $adData->ad_title; ?></h2>

                                    <?php echo $jobPostText; ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="side-panel">
                            <div class="side-panel-row">
                                <h6 class="title">Type</h6>
                                <h6 class="info"><?php echo $workType; ?></h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Experience</h6>
                                <h6 class="info"><?php echo $adData->ad_expected_experience; ?></h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Address</h6>
                                <h6 class="info"><?php echo $employerAddress; ?></h6>
                            </div>

                            <div class="side-panel-row">
                                <h6 class="title">Salary</h6>
                                <h6 class="info"><?php echo $employerAddress; ?></h6>
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
<?php $this->endWidget(); ?>