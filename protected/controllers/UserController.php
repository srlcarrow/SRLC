<?php
class UserController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionProfile() {
        $this->render('profile');
    }

    public function actionPersonalInfo() {
        $this->renderPartial('ajaxLoad/personalInformation');
    }

    public function actionPersonalInfoEdit() {
        $this->renderPartial('ajaxLoad/personalInformation_form');
    }


    //Popup
    public function actionImageCrop() {
        $this->renderPartial('ajaxLoad/popup/imageCrop');
    }


}