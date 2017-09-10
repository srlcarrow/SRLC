<?php

class RegistrationController extends Controller {

    public function actionRegister() {
        try {



            $model = new JsBasicTemp();
            $model->jsbt_type = $_POST['isCheckedJobSeeker'] == "true" ? 1 : 2;
            $model->jsbt_fname = $_POST['isCheckedJobSeeker'] == "true" ? $_POST['fname'] : $_POST['cname'];
            $model->jsbt_lname = $_POST['lname'];
            $model->jsbt_email = $_POST['email'];
            $model->jsbt_contact_no = $_POST['contactNo'];
            $model->jsbt_created_time = date('Y-m-d H:i:s');
            if ($model->save(false)) {
//            $id = $model->jsbt_id;
//            $jsBasicTemp = JsBasicTemp::model()->findByPk($id);
//
//            $user = new User();
//            $user->ref_emp_or_js_id = $id;
//            $user->user_name = $jsBasicTemp->jsbt_email;
//            $user->user_password = md5($this->randomPassword() . $this->randomPassword());
//            $user->user_access_token = md5(md5($this->randomAccessToken()));
//            $user->user_type = $jsBasicTemp->jsbt_type;
//            $user->user_is_verified = 0;
//            $user->user_created_date = date('Y-m-d H:i:s');
//            $user->save(false);

                $msg = "Test For Payroll";
                $subjct = "Registered";
                $to = "sanjeewa@4you.lk";
                EmailGenerator::SendEmail($msg, $to, $subjct);

                $this->msgHandler(200, "Successfully Saved...");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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