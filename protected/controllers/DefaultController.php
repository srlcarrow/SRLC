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

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl . '/Site');
    }

}
