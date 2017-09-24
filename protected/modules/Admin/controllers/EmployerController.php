<?php

class EmployerController extends Controller {

    public function actionViewEmployer() {
        $this->render('ViewEmployer');
    }

    public function actionViewEmployerData() {
        $sql = Yii::app()->db->createCommand()
                ->select('*')
                ->from('emp_employers emp')
                ->getText();

        $limit = 15;
        $data = Controller::createSearchCriteriaForEmployer($sql, '', Yii::app()->request->getPost('page'), $limit);

        $employers = $data['result'];
        $pageCount = $data['count'];
        $currentPage = Yii::app()->request->getPost('page');


        $this->renderPartial('ajaxLoad/ViewEmployerData', array('employers' => $employers, 'pageCount' => $pageCount, 'currentPage' => $currentPage, 'limit' => $limit));
    }

    public function actionLoadEmployerData() {
        $employerData = EmpEmployers::model()->findByPk($_POST['id']);
        $this->renderPartial('ajaxLoad/viewLoadEmployerData', array('employerData' => $employerData, 'id' => $_POST['id']));
    }

    public function actionViewAddAdvertisement() {
        $empId = $_POST['id'];
        $model = new EmpAdvertisement();
        $adId = 0;
        $this->renderPartial('ajaxLoad/viewAddAdvertisement', array('model' => $model, 'adId' => $adId, 'empId' => $empId));
    }

    public function actionLoadPaymentPopup() {
        $this->renderPartial('ajaxLoad/paymentPopup');
    }

    public function actionLogoUploadPopup() {
        $this->renderPartial('ajaxLoad/logoUpload');
    }

    public function actionSaveEmployer() {
        try {
            $model = new EmpEmployers();
            $model->ref_ind_id = $_POST['ref_ind_id'];
            $model->employer_name = $_POST['comName'];
            $model->employer_address = $_POST['comAddress'];
            $model->employer_tel = $_POST['comTel'];
            $model->employer_mobi = $_POST['comMobi'];
            $model->employer_email = strtolower(str_replace(' ', '', $_POST['comEmail']));
            $model->employer_contact_person = $_POST['comConPerson'];
            if ($model->save(false)) {
                $this->msgHandler(200, "Successfully Saved...");
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

    public function actionEmployerAdd() {
        $this->renderPartial('ajaxLoad/addEmployer');
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
                $model->ref_employer_id = $_POST['empId'];
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

