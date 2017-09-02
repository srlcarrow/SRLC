<?php

class AdvertisementController extends Controller {

    public function actionViewAdvertisements() {
        $this->renderPartial('/site/ajaxLoad/viewAdvertisements');
    }

    public function actionViewAdvertisementsData() {      
        $sql = Yii::app()->db->createCommand()
                ->select('ad.ad_id,ad.ad_reference,ad.ad_reference,ad.ad_expected_experience,ad.ad_salary,ad.ad_is_negotiable,ad.ad_title,ad.ad_is_use_desig_as_title,ad.ad_expire_date,desig.desig_name,emp.employer_name,awt.wt_name,acity.city_name')
                ->from('emp_advertisement ad')
                ->getText();

        $limit = 10;
        $data = Controller::createSearchCriteriaForAdvertisement($sql, '', Yii::app()->request->getPost('page'), $limit);

        $result = $data['result'];
        $pageCount = $data['count'];
        $currentPage = Yii::app()->request->getPost('page');
        $this->renderPartial('/site/ajaxLoad/viewAdvertisements', array('data' => $result, 'pageCount' => $pageCount, 'currentPage' => $currentPage, 'limit' => $limit));
    }

    //Popup
    public function actionApplyJob() {
        $this->renderPartial('ajaxLoad/popup/jobApply');
    }

}
?>

