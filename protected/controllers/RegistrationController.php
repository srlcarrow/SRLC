<?php

class RegistrationController extends Controller {

    public function actionRegister() {
        $model = new JsBasicTemp();
        $model->jsbt_type = $_POST['isCheckedJobSeeker'] == "true" ? 1 : 2;
        $model->jsbt_fname = $_POST['isCheckedJobSeeker'] == "true" ? $_POST['fname'] : $_POST['cname'];
        $model->jsbt_lname = $_POST['lname'];
        $model->jsbt_email = $_POST['email'];
        $model->jsbt_contact_no = $_POST['contactNo'];
        $model->jsbt_created_time = date('Y-m-d H:i:s');
        if ($model->save(false)) {
            $msg = "Test For Payroll";
            $subjct = "Registered";
            $to = "sahampath1990@gmail.com";
            EmailGenerator::SendEmail($msg, $to, $subjct);

            $this->msgHandler(200, "Successfully Saved...");
        }
    }

    public function actionGen() {
        $msg = "Test For Payroll";
        $subjct = "Test Subject";
        $to = "sahampath1990@gmail.com";
        EmailGenerator::SendEmail($msg, $to, $subjct, '');
    }

}

?>