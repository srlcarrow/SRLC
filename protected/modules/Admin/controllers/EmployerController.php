<?php

class EmployerController extends Controller {

    public function actionViewEmployer() {
        $this->render('ViewEmployer');
    }

    public function actionViewEmployerData() {
        $employers = EmpEmployers::model()->findAll();
        $this->renderPartial('ajaxLoad/ViewEmployerData', array('employers' => $employers));
    }

    public function actionEmployerAdd() {
        $this->renderPartial('ajaxLoad/addEmployer');
    }

    public function actionSaveEmployer() {
        try {
            $model = new EmpEmployers();
            $model->employer_name = $_POST['comName'];
            $model->employer_address = $_POST['comAddress'];
            $model->employer_tel = $_POST['comTel'];
            $model->employer_mobi = $_POST['comMobi'];
            $model->employer_email = $_POST['comEmail'];
            $model->employer_contact_person = $_POST['comConPerson'];
            if ($model->save(false)) {
                $this->msgHandler(200, "Successfully Saved...");
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

}
?>

