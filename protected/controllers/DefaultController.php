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
            if (isset($url)) {
//                Yii::app()->user->isGuest = 0;
                $this->redirect(array($url));
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
