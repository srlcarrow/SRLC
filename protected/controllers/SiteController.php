<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index', array('isMain' => 1));
    }

    public function actionCategoryPopup() {
        $categories = AdmCategory::model()->findAll(array('order' => 'cat_order'));
        $this->renderPartial('ajaxLoad/popups/category', array('categories' => $categories));
    }

    public function actionGetSubCategoriesByCatId() {
        $catId = explode("_", $_POST['id'])[1];
        $subCategories = AdmSubcategory::model()->findAllByAttributes(array('ref_cat_id' => $catId), array('order' => 'scat_order'));
        $subCatData = array();
        foreach ($subCategories as $subCategory) {
            $subCat["scat_id"] = $subCategory->scat_id;
            $subCat["ref_cat_id"] = $subCategory->ref_cat_id;
            $subCat["scat_name"] = $subCategory->scat_name;
            $subCat["scat_order"] = $subCategory->scat_order;
            array_push($subCatData, $subCat);
        }

        $this->msgHandler(200, "Data Transfer", array('subCategoryData' => $subCatData));
    }

    public function actionGetCitiesByDistrictID() {
        $cities = AdmCity::model()->findAllByAttributes(array('ref_district_id' => $_POST['id']), array('order' => 'city_name'));
        $cityData = array();
        foreach ($cities as $city) {
            $cityDat["city_id"] = $city->city_id;
            $cityDat["city_name"] = $city->city_name;
            array_push($cityData, $cityDat);
        }

        $this->msgHandler(200, "Data Transfer", array('cityData' => $cityData));
    }

    public function actionRegistrationPopup() {
        $this->renderPartial('ajaxLoad/popups/registration');
    }

    public function actionSignInPopup() {
        if (yii::app()->user->isGuest) {
            $this->layout = 'login_layout';
            $model = new User();
            $url = '';

            if (isset($_REQUEST['controllerAction'])) {
                if (!empty($_REQUEST['request_arr'])) {
                    $url_param = '';
                    foreach ($_REQUEST['request_arr'] as $key => $val) {
                        $url_param .= "$key/$val/";
                    }
                    $url = $_REQUEST['controllerAction'] . "/" . $url_param;
                } else {
                    $url = $_REQUEST['controllerAction'];
                }
            }


            $this->renderPartial('ajaxLoad/popups/sign_in_form', array('model' => $model, 'url' => $url));
        } else {
            $this->render('index');
        }

        
    }

    public function actionPasswordResetFrom() {
        $this->renderPartial('ajaxLoad/popups/password_reset_form');
    }

    public function actionAdvertisement() {
        $this->render('advertisement');
    }

    public function actionCreateAdvertisement() {
        $this->render('createAdd');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
