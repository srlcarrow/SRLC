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
        $this->renderPartial('ajaxLoad/popup/jobApply', array('user' => $userId, 'userType' => $userType, 'adId' => $_POST['adId']));
    }

    public function actionApplyVacancy() {
        $userId = Yii::app()->user->getId();
        $appliedData = new JsAppliedDetails();
        $appliedData->ref_advertisement_id = $_POST['adId'];
        $appliedData->is_registered_user = $userId == NULL ? 0 : $userId;
        $appliedData->ref_js_id = $userId == NULL ? 0 : Controller::getRefEmpOrJsId($userId);
        $appliedData->jsad_name = $userId == NULL ? $_POST['fname'] : "";
        $appliedData->jsad_email = $userId == NULL ? $_POST['email'] : "";
        $appliedData->jsad_cv_path = 1;
        $appliedData->jsad_applied_time = date('Y-m-d H:i:s');
        $appliedData->jsad_applied_user = $userId == NULL ? 0 : $userId;
        $appliedData->save(false);
        
        $target_dir = "uploads/CV/Unregistered/";
        $cvName = "00006";
        $path = $this->UploadCV($_FILES, $target_dir, $cvName);
    }

}
?>

