<?php

class AdvertisementController extends Controller {

//    public function init() {
//        $this->redirectToLogin();
//    }

    public function actionViewAdvertisements() {
        $this->renderPartial('/site/ajaxLoad/viewAdvertisements');
    }

    public function actionViewAdvertisementsData() {
        $sql = Yii::app()->db->createCommand()
                ->select('ad.ad_id,ad.ad_reference,ad.ad_reference,ad.ad_expected_experience,ad.ad_salary,ad.ad_is_negotiable,ad.ad_title,ad.ad_is_use_desig_as_title,ad.ad_expire_date,desig.desig_name,emp.employer_name,awt.wt_name,acity.city_name,ad.ad_published_time,ad.ad_expire_date')
                ->from('emp_advertisement ad')
                ->getText();

        $limit = 10;
        $data = Controller::createSearchCriteriaForAdvertisement($sql, '', Yii::app()->request->getPost('page'), $limit, 'ad.ad_published_time');

        $result = $data['result'];
        $pageCount = $data['count'];
        $currentPage = Yii::app()->request->getPost('page');
        $this->renderPartial('/site/ajaxLoad/viewAdvertisements', array('data' => $result, 'pageCount' => $pageCount, 'currentPage' => $currentPage, 'limit' => $limit));
    }

    public function actionViewAdvertisement($id) {
        $adData = EmpAdvertisement::model()->findByPk($id);
        $this->render('/Advertisement/viewAdvertisements', array('adData' => $adData, 'adId' => $id));
    }

    //Popup
    public function actionApplyJob() {
        $userId = Yii::app()->user->getId();
        $userType = 0;
        if (isset($userId)) {
            $userType = Controller::getUserType($userId);
        }
        $this->renderPartial('/Advertisement/ajaxLoad/popup/jobApply', array('user' => $userId, 'userType' => $userType, 'adId' => $_POST['adId']));
    }

    public function actionApplyVacancy() {
//        var_dump($_POST);
//        exit;
        $status = 1;
        $reason = "";

//        if ($_FILES['EmpAdvertisement']['name']['AdverImage'] == "") {
//            $status = 0;
//            $reason = "Please Select a CV to send";
//        } else {
//            $target_dir = "uploads/JobAdvertisements/";
//            $target_file = $target_dir . basename($_FILES["EmpAdvertisement"]["name"]['AdverImage']);
//            $validateData = Controller::validateImage($_FILES, $target_dir);
//            $status = $validateData["status"];
//            $reason = $validateData["reason"];
//        }

        if ($status == 1) {

            $userId = Yii::app()->user->getId();
            if (isset($userId)) {
                $appliedData = new JsAppliedDetails();
                $appliedData->ref_advertisement_id = $_POST['adId'];
                $appliedData->is_registered_user = 1;
                $appliedData->ref_js_id = Controller::getRefEmpOrJsId($userId);
                $appliedData->jsad_name = "";
                $appliedData->jsad_email = "";
                $appliedData->jsad_cv_path = 1;
                $appliedData->jsad_applied_time = date('Y-m-d H:i:s');
                $appliedData->jsad_applied_user = $userId;
                $appliedData->save(false);
            } else {
                $target_dir = "uploads/CV/Unregistered/";

                $appliedData = new JsAppliedDetails();
                $appliedData->ref_advertisement_id = $_POST['adId'];
                $appliedData->is_registered_user = 0;
                $appliedData->ref_js_id = 0;
                $appliedData->jsad_name = $_POST['fname'];
                $appliedData->jsad_email = $_POST['email'];
                $appliedData->jsad_cv_path = "";
                $appliedData->jsad_applied_time = date('Y-m-d H:i:s');
                $appliedData->jsad_applied_user = 0;

                if ($appliedData->save(false)) {
                    $cvName = md5('cv' . $appliedData->jsad_id);
                    $path = $this->UploadCV($_FILES, $target_dir, $cvName);
                    $appliedData->jsad_cv_path = $path;
                    $appliedData->save(false);
                    
                    //Send the mail to employer by attaching the CV
                }
            }

            $path = $this->UploadCV($_FILES, $target_dir, $cvName);
            $this->msgHandler(200, "Successfully Applied");
            
        } else {
            $this->msgHandler(400, $reason);
        }
    }

}
?>

