<?php

class EmployerController extends Controller {



    public function actionProfile() {
        $this->render('profile');
    }

    public function actionPackage() {
        $this->renderPartial('ajaxLoad/package');
    }

    public function actionPackageEdit() {
        $this->renderPartial('ajaxLoad/package_form');
    }


    //Popup
    public function actionImageCrop() {
        $this->renderPartial('ajaxLoad/popup/imageCrop');
    }

}
?>
