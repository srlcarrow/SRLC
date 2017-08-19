<?php

class RegistrationController extends Controller {

    public function actionRegister() {
        $model = new JsBasicTemp();
        $model->jsbt_type = $_POST['isCheckedJobSeeker'] == "true" ? 1 : 2;
        $model->jsbt_fname = $_POST['fname'];
        $model->jsbt_lname = $_POST['lname'];
        $model->jsbt_email = $_POST['email'];
        $model->jsbt_contact_no = $_POST['contactNo'];
        $model->jsbt_created_time = date('Y-m-d H:i:s');
        if ($model->save(false)) {
             $this->msgHandler(200, "Successfully Saved...");
//            Send the verification mail
        }
    }

}

?>