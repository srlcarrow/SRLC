<?php

class AdvertisementController extends Controller {

    public function actionIndex() {
        $this->render('viewAdvertisement');
    }

    public function actionViewAddAdvertisement() {
        $model = new EmpAdvertisement();
        $adId = 0;
        $this->renderPartial('ajaxLoad/viewAddAdvertisement', array('model' => $model, 'adId' => $adId));
    }

    public function actionViewAdvertisementData() {
        $sql = Yii::app()->db->createCommand()
                ->select('ad.ad_id,ad.ref_designation_id,ad.ad_reference,ad.ad_reference,ad.ad_expected_experience,ad.ad_salary,ad.ad_is_negotiable,ad.ad_title,ad.ad_is_use_desig_as_title,ad.ad_expire_date,desig.desig_name,emp.employer_name,awt.wt_name,acity.city_name')
                ->from('emp_advertisement ad')
                ->getText();

        $limit = 10;
//        $data = Controller::createSearchCriteriaForAdvertisement($sql, '', Yii::app()->request->getPost('page'), $limit);
        $data = Controller::createSearchCriteriaForAdvertisement($sql, '', 1, $limit);

        $result = $data['result'];
        $pageCount = $data['count'];
        $currentPage = Yii::app()->request->getPost('page');

        $this->renderPartial('ajaxLoad/viewAdvertisementData', array('data' => $result, 'pageCount' => $pageCount, 'currentPage' => $currentPage, 'limit' => $limit));
    }

    public function actionEditAdvertisement() {
        $model = EmpAdvertisement::model()->findByPk($_POST['id']);
        $adId = $model->ad_id;
        $this->renderPartial('ajaxLoad/viewAddAdvertisement', array('model' => $model, 'adId' => $adId));
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
                if ($_POST['adId'] > 0) {
                    $model = EmpAdvertisement::model()->findByPk($_POST['adId']);
                }
                $model->ad_reference = 0;
                $model->ref_employer_id = 2;
                $model->ref_district_id = $_POST['district_id'];
                $model->ref_city_id = $_POST['city'];
                $model->ref_industry_id = $_POST['ref_industry_id'];
                $model->ref_cat_id = $_POST['ref_cat_id'];
                $model->ref_subcat_id = $_POST['subCategories'];
                $model->ref_designation_id = $_POST['designations'];
                $model->ad_expected_experience = $_POST['experience'];
                $model->ad_salary = $_POST['salary'];
                $model->ad_is_negotiable = isset($_POST['isNegotiable']) && $_POST['isNegotiable'] == "on" ? 1 : 0;
                $model->ref_work_type_id = $_POST['ref_work_type_id'];
                $model->ad_title = $_POST['title'];
                $model->ad_is_use_desig_as_title = isset($_POST['isDesigAsTitle']) && $_POST['isDesigAsTitle'] == "on" ? 1 : 0;
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

