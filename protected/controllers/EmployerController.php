<?php

class EmployerController extends Controller {

    public function actionEmployerRegister() {
        $this->render('viewEmployerRegistration');
    }

    public function actionCompanyLogoUploadPopup() {
        $this->renderPartial('ajaxLoad/company_logo_uploader');
    }

    public function actionSaveEmployer() {
        try {
            $model = new EmpEmployers();
            $model->ref_ind_id = $_POST['ind_id'];
            $model->employer_name = "TEST";
            $model->employer_reference_no = "U160C";
            $model->employer_address = $_POST['address'];
            $model->employer_tel = $_POST['contactNo'];
            $model->employer_mobi = "";
            $model->employer_email = "";
            $model->employer_contact_person = $_POST['contactPerson'];
            $model->ref_district_id = $_POST['district_id'];
            $model->ref_city_id = $_POST['city'];
            if ($model->save(false)) {
                $this->msgHandler(200, "Successfully Saved...");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

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
