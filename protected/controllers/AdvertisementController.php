<?php

class AdvertisementController extends Controller {

    public function actionViewAdvertisements() {
//        var_dump($_POST);
//        exit;
//        $sql = Yii::app()->db->createCommand()
//                ->select('t.emp_id,t.emp_no,t.epf_no,t.emp_name,emp.is_general_shift_emp,t.is_attendance_processed')
//                ->from('hr_empbasic t')
//                ->getText();
//
//        $data = Controller::createSearchCriteriaForEMP($sql, 'al.emp_no', Yii::app()->request->getPost('page'), NULL, 'hr_empbasic');
//        $result = $data['result'];
//        $pageCount = $data['count'];
//        $currentPage = Yii::app()->request->getPost('page');

        $this->renderPartial('/site/ajaxLoad/viewAdvertisements');
    }

    public function actionViewAdvertisementsData() {
        $sql = Yii::app()->db->createCommand()
                ->select('t.emp_id,t.emp_no,t.epf_no,t.emp_name,emp.is_general_shift_emp,t.is_attendance_processed')
                ->from('hr_empbasic t')
                ->getText();

        $data = Controller::createSearchCriteriaForEMP($sql, 'al.emp_no', Yii::app()->request->getPost('page'), NULL, 'hr_empbasic');
        $result = $data['result'];
        $pageCount = $data['count'];
        $currentPage = Yii::app()->request->getPost('page');
    }

}
?>

