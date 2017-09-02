<?php

class JobSeekerController extends Controller {

    public function actionViewRegistration() {
        $this->render('jobSeekerRegistration');
    }

    public function actionFormStepOne() {
        $this->renderPartial('ajaxLoad/form_step1');
    }

    public function actionSaveStepOne() {
        try {
            $model = new JsBasic();
            $model->js_name = '';
            $model->js_email = '';
            $model->js_contact_no1 = $_POST['contactNo'];
            $model->js_contact_no2 = '';
            $model->js_address = $_POST['address'];
            $model->js_gender = 1;
            $model->js_dob = $_POST['dob'];
            if ($model->save(false)) {
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionFormStepTwo() {
        $this->renderPartial('ajaxLoad/form_step2');
    }

    public function actionFormStepThree() {
        $this->renderPartial('ajaxLoad/form_step3');
    }

}
