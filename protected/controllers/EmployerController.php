<?php

class EmployerController extends Controller {

    public function actionEmployerRegister($id) {
        try {
            $key = $id;
            $jsBasicTempData = JsBasicTemp::model()->findByAttributes(array('jsbt_encrypted_id' => $key));

            if ($id == $jsBasicTempData->jsbt_encrypted_id) {
                $id = Controller::encodePrimaryKeys($jsBasicTempData->jsbt_id);
                $this->render('viewEmployerRegistration', array('accessId' => $id));
            } else {
                echo "Invalid URL";
                exit;
            }
        } catch (Exception $exc) {
            echo "Invalid Verification";
        }
    }

    public function actionCompanyLogoUploadPopup() {
        $this->renderPartial('ajaxLoad/popup/imageCrop');
    }

    public function actionSaveEmployer() {
        try {
            $key = Controller::decodeMailAction($_POST['accessId']);
            $jsTempId = $key[2];
            $jsBasicTempData = JsBasicTemp::model()->findByPk($jsTempId);

            if ($jsTempId > 0) {
                $jsBasicTempData = JsBasicTemp::model()->findByPk($jsTempId);
                if ($jsBasicTempData->jsbt_type == 2) {
                    if ($jsBasicTempData->jsbt_is_verified == 0 && $jsBasicTempData->jsbt_is_finished == 0) {
                        $jsBasicTempData->jsbt_is_verified = 1;
                        if ($jsBasicTempData->save(false)) {
                            $empEmployers = new EmpEmployers();
                            $empEmployers->ref_jsbt_id = $jsBasicTempData->jsbt_id;
                            $empEmployers->ref_ind_id = $_POST['ind_id'];
                            $empEmployers->ref_district_id = $_POST['district_id'];
                            $empEmployers->ref_city_id = isset($_POST['city']) ? $_POST['city'] : 0;
                            $empEmployers->employer_name = $jsBasicTempData->jsbt_fname;
                            $empEmployers->employer_reference_no = 'SSS';
                            $empEmployers->employer_address = $_POST['address'];
                            $empEmployers->employer_tel = $jsBasicTempData->jsbt_fname;
                            $empEmployers->employer_mobi = $_POST['contactNo'];
                            $empEmployers->employer_email = $jsBasicTempData->jsbt_email;
                            $empEmployers->employer_contact_person = $_POST['contactPerson'];
                            $empEmployers->employer_image = $_POST['image'];
                            $empEmployers->employer_created_time = date('Y-m-d H:i:s');
                            $empEmployers->employer_updated_time = date('Y-m-d H:i:s');
                            if ($empEmployers->save(false)) {
                                $jsBasicTempData->jsbt_is_finished = 1;
                                $jsBasicTempData->save(false);
                            }
                        }
                    } else {
                        //render U Have already done
                    }
                }
            }
            $key = Controller::encodePrimaryKeys($empEmployers->employer_id);
            $this->msgHandler(200, "Successfully Saved...", array('employerKey' => $key));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionProfile($id) {
        $id = Controller::decodePrimaryKeys($id);
        $employerData = EmpEmployers::model()->findByPk($id);
        $this->render('profile', array('employerData' => $employerData));
    }

    public function actionProfileDetails() {
        //$id = Controller::decodePrimaryKeys($id);
        //$employerData = EmpEmployers::model()->findByPk($id);

        $userId = Yii::app()->user->id;
        $user = User::model()->findByAttributes(array('user_id' => $userId));
        $userType = $user->user_type;


        if ($userType == 2) {
            $employerData = EmpEmployers::model()->findByAttributes(array('ref_ind_id' => $user->ref_emp_or_js_id));
            //$employment = JsEmploymentData::model()->findByAttributes(array('ref_js_id' => $user->ref_emp_or_js_id));
        } else {
            $employerData = new EmpEmployers();
            //$employment = new JsEmploymentData();  
        }



        $this->render('profile', array('employerData' => $employerData));
    }

    public function actionPackage() {
        $this->renderPartial('ajaxLoad/package');
    }

    public function actionPackageEdit() {
        $this->renderPartial('ajaxLoad/package_form');
    }

    public function actionJobPost() {
        $this->renderPartial('ajaxLoad/jobPost');
    }

    public function actionPasswordReset() {
        $this->renderPartial('ajaxLoad/passwordResetForm');
    }

    //Popup
    public function actionImageCrop() {
        $this->renderPartial('ajaxLoad/popup/imageCrop');
    }

    public function actionUploadLogo() {
        try {
            define('UPLOAD_DIR', 'uploads/company/logo/');
            $img = $_POST['imageData'];
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $fileName = "employerCompany_" . uniqid() . '.png';
            $widthArray = array('212');
            $success = Controller::saveImageInMultipleSizes($widthArray, $fileName, UPLOAD_DIR, $data);
            if ($success) {
                $this->msgHandler(200, "Data Transfer", array('fileName' => $fileName));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>
