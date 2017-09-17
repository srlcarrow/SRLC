<?php

class DefaultController extends Controller {

    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $this->actionViewLogin();
        } else {
            $userId = Yii::app()->user->id;
            $this->render('index');
        }
    }

    public function actionLogin() {
        $model = new SiteLoginForm('login');

        $model->username = $_POST['username'];
        $model->password = $_POST['password'];


        if ($model->login()) {
            $url = '';
            $userId = Yii::app()->user->id;
            $userType = User::model()->findByAttributes(array('user_id' => $userId))->user_type;

            if ($userType == 2) {
                $url = 'Employer/Profile';
            }

            $this->msgHandler(200, "Login Successfull...", array('url' => $url));
        } else {
            $this->msgHandler(400, "Error In Login Details...");
        }
    }

    public function actionResetPassword() {
        $email = trim($_POST['email']);
        $user = User::model()->findByAttributes(array('user_name' => $email));

        if (count($user) > 0) {
            $password = $this->randomPassword();
            $userType = $user->user_type;
            $jsId = $user->ref_emp_or_js_id;
            $user->user_password = md5(md5('SRLC' . $password . $password));
            if ($user->save(false)) {
                if ($userType == 1) {
                    $msg = EmailGenerator::setEmailMessageBodyJobSeeker('reset_password', '1', $jsId, $email, $password, false);
                } elseif ($userType == 2) {
                    $msg = EmailGenerator::setEmailMessageBodyEmployer('reset_password', '2', $jsId, $email, $password, false);
                }

                $subjct = "Verify Your Account";
                $to = $email;
                EmailGenerator::SendEmail($msg, $to, $subjct);
            }

            $this->msgHandler(200, "Login Successfull...");
        } else {
            $this->msgHandler(400, "Error In Login Details...");
        }
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl . '/Site');
    }

}
