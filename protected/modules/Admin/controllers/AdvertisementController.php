<?php

class AdvertisementController extends Controller {

    public function actionIndex() {
        $this->render('viewAdvertisement');
    }

    public function actionViewAddAdvertisement() {
        $model = new EmpAdvertisement();
        $this->renderPartial('ajaxLoad/viewAddAdvertisement', array('model' => $model));
    }

    public function actionViewAdvertisementData() {     
        $this->renderPartial('ajaxLoad/viewAdvertisementData');
    }

    public function actionSaveAdvertisement() {
        try {
            $target_dir = "uploads/jobAdvertisement/";
            $target_file = $target_dir . basename($_FILES["EmpAdvertisement"]["name"]['AdverImage']);
            $validateData = Controller::validateImage($_FILES, $target_dir);
            $status = $validateData["status"];
            $reason = $validateData["reason"];

            if ($status == 1) {
                $model = new EmpAdvertisement();
                $model->ad_reference = 0;
                $model->ref_employer_id = 2;
                $model->ref_district_id = $_POST['ref_district_id'];
                $model->ref_city_id = $_POST['ref_city_id'];
                $model->ref_industry_id = $_POST['ref_industry_id'];
                $model->ref_cat_id = $_POST['ref_cat_id'];
                $model->ref_subcat_id = $_POST['ref_subcat_id'];
                $model->ref_designation_id = $_POST['ref_designation_id'];
                $model->ad_expected_experience = $_POST['experience'];
                $model->ad_salary = $_POST['salary'];
                $model->ad_is_negotiable = 0;
                $model->ref_work_type_id = $_POST['ref_work_type_id'];
                $model->ad_title = $_POST['title'];
                $model->ad_is_use_desig_as_title = 0;
                $model->ad_expire_date = date('Y-m-d', strtotime($_POST['expireDate']));
                $model->ad_is_image = $_POST['group1'] == 1 ? 1 : 0;
                $model->ad_image_url = "";
                $model->ad_text = $_POST['advertisementText'];
                if ($model->save(false)) {
                    $model->ad_reference = Controller::getEmployeeReferenceNo($model->ad_id);
                    $path = $this->UploadImage($_FILES, $target_dir, $model->ad_reference);
                    $model->ad_image_url = $path;
                    $model->save(false);

                    $this->msgHandler(200, "Successfully Saved...");
                }
            } else {
                $this->msgHandler(400, $reason);
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

}
?>

