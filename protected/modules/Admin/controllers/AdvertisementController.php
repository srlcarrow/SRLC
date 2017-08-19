<?php

class AdvertisementController extends Controller {

    public function actionIndex() {
        $this->render('viewAdvertisement');
    }

    public function actionViewAddAdvertisement() {
        $this->renderPartial('ajaxLoad/viewAddAdvertisement');
    }

    public function actionViewAddAdvertisementData() {
        $this->renderPartial('ajaxLoad/viewAddAdvertisementData');
    }

    public function actionSaveAdvertisement() {
        try {
            var_dump($_POST);exit;
            $model = new EmpAdvertisement();
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
            $model->ad_is_image = 0;
            $model->ad_image_url = "";
            $model->ad_text = $_POST['advertisementText'];
            if ($model->save(false)) {
                $this->msgHandler(200, "Successfully Saved...");
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

}
?>

