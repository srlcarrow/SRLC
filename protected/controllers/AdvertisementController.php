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
                ->select('ad.ad_id,ad.ad_reference,ad.ad_reference,ad.ad_expected_experience,ad.ad_salary,ad.ad_is_negotiable,ad.ad_title,ad.ad_is_use_desig_as_title,ad.ad_expire_date,desig.desig_name,emp.employer_name,awt.wt_name,acity.city_name,ad.ad_created_time,ad.ad_expire_date')
                ->from('emp_advertisement ad')
                ->getText();

        $limit = 10;
        $data = Controller::createSearchCriteriaForAdvertisement($sql, '', Yii::app()->request->getPost('page'), $limit);

        $result = $data['result'];
        $pageCount = $data['count'];
        $currentPage = Yii::app()->request->getPost('page');
        $this->renderPartial('/site/ajaxLoad/viewAdvertisements', array('data' => $result, 'pageCount' => $pageCount, 'currentPage' => $currentPage, 'limit' => $limit));
    }

    public function actionViewAdvertisement($id) {
        $adData = EmpAdvertisement::model()->findByPk($id);
        $this->render('viewAdvertisements', array('adData' => $adData));
    }

    //Popup
    public function actionApplyJob() {
        $userId = Yii::app()->user->getId();
        $this->renderPartial('ajaxLoad/popup/jobApply', array('user' => $userId));
    }

    public function actionUploadCV() {
        $target_dir = "uploads/cv/";

        $target_file = $target_dir . basename($_FILES["EmpAdvertisement"]["name"]['image']);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (isset($_POST)) {
            $check = getimagesize($_FILES['EmpAdvertisement']['tmp_name']['image']);
            move_uploaded_file($_FILES["EmpAdvertisement"]["tmp_name"]['image'], $target_file);
        }
        exit;
    }

}
?>

