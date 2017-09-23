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
            $model->jsbt_encrypted_id = '';
            if ($model->save(false)) {
                $jsId = $model->jsbt_id;
                $model->jsbt_encrypted_id = md5($jsId);
                $model->save(false);

                $jsBasicTemp = JsBasicTemp::model()->findByPk($jsId);
                $password = $this->randomPassword();
                $accessToken = md5(md5($this->randomAccessToken()));

                $user = new User();
                $user->ref_emp_or_js_id = $jsId;
                $user->user_name = $jsBasicTemp->jsbt_email;
                $user->user_password = md5(md5('SRLC' . $password . $password));  
                $user->user_access_token = $accessToken;
                $user->user_type = $jsBasicTemp->jsbt_type;
                $user->user_is_verified = 0;
                $user->user_created_date = date('Y-m-d H:i:s');
                if ($user->save(false)) {
                    if ($model->jsbt_type == 1) {
                        $msg = EmailGenerator::setEmailMessageBodyJobSeeker('user_created', '1', $jsId, $jsBasicTemp->jsbt_email, $password, false);
                    } elseif ($model->jsbt_type == 2) {
                        $msg = EmailGenerator::setEmailMessageBodyEmployer('user_created', '2', $jsId, $jsBasicTemp->jsbt_email, $password, false);
                    }

                    $subjct = "Verify Your Account";
                    $to = $_POST['email'];                  
                    EmailGenerator::SendEmail($msg, $to, $subjct);
                }
                $this->msgHandler(200, "Successfully Saved...");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionIsExistingEmail() {
        $email = $_POST['email'];
        $emailCount = User::model()->countByAttributes(array('user_name' => $email));
        $status = $emailCount > 0 ? 1 : 0;
        $this->msgHandler(200, "Successfully Saved...", array('isExistingEmail' => $status));
    }

}

?>