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
                            $empEmployers->employer_reference_no = 0;
                            $empEmployers->employer_address = $_POST['address'];
                            $empEmployers->employer_tel = $jsBasicTempData->jsbt_contact_no;
                            $empEmployers->employer_mobi = $_POST['contactNo'];
                            $empEmployers->employer_email = $jsBasicTempData->jsbt_email;
                            $empEmployers->employer_contact_person = $_POST['contactPerson'];
                            $empEmployers->employer_image = $_POST['image'];
                            $empEmployers->employer_created_time = date('Y-m-d H:i:s');
                            $empEmployers->employer_updated_time = date('Y-m-d H:i:s');
                            if ($empEmployers->save(false)) {
                                $empEmployers->employer_reference_no = Controller::getEmployeeReferenceNo($empEmployers->employer_id);
                                $empEmployers->save(false);

                                $user = User::model()->findByAttributes(array('ref_emp_or_js_id' => $jsBasicTempData->jsbt_id));
                                $user->ref_emp_or_js_id = $empEmployers->employer_id;
                                $user->user_is_verified = 1;
                                $user->save(false);

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
        $userId = Yii::app()->user->id;
        $user = User::model()->findByAttributes(array('user_id' => $userId));
        $userType = $user->user_type;

        if ($userType == 2) {
            $employerData = EmpEmployers::model()->findByAttributes(array('employer_id' => $user->ref_emp_or_js_id));
//            var_dump($employerData);exit;
        } else {
            $employerData = new EmpEmployers();
        }

        $this->render('profile', array('employerData' => $employerData));
    }

    public function actionPackage() {
        $packages = AdmPackage::model()->findAll();
        $this->renderPartial('ajaxLoad/package', array('packages' => $packages));
    }

    public function actionBasicData() {
        $this->renderPartial('ajaxLoad/basic');
    }

    public function actionViewPurchasedPackages() {
        $userId = Yii::app()->user->id;
        $purchaseedpackages = EmpPurchasePackage::model()->findAllByAttributes(array('ref_user_id' => $userId));

        $this->renderPartial('ajaxLoad/viewPurchasePackages', array('purchaseedpackages' => $purchaseedpackages));
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
            define('UPLOAD_DIR', 'uploads/Profile/Employer/');
            $img = $_POST['imageData'];
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            if (isset(Yii::app()->user->id) || Yii::app()->user->id > 0) {
                $employerId = Controller::getRefEmpOrJsId(Yii::app()->user->id);
                $imageName = EmpEmployers::model()->findByPk($employerId)->employer_image;

                if ($imageName == "") {
                    $fileName = "employer_" . uniqid() . '.png';
                } else {
                    unlink('uploads/Profile/Employer/' . $imageName);
                    $fileName = "employer_" . uniqid() . '.png';
                }
            } else {
                $fileName = "employerCompany_" . uniqid() . '.png';
            }
            $widthArray = array('212');
            $success = Controller::saveImageInMultipleSizes($widthArray, $fileName, UPLOAD_DIR, $data);
            if ($success) {
                if ($employerId != NULL) {
                    $empData = EmpEmployers::model()->findByPk($employerId);
                    $empData->employer_image = $fileName;
                    $empData->save(false);
                }
                $this->msgHandler(200, "Data Transfer", array('fileName' => $fileName));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionChangeEmployerPassword() {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $rePassword = $_POST['rePassword'];

        $oldPasswordEncryp = md5(md5('SRLC' . $oldPassword . $oldPassword));
        $newPasswordEncryp = md5(md5('SRLC' . $newPassword . $newPassword));

        $userId = Yii::app()->user->id;
        $userData = User::model()->findByPk($userId);

        try {
            if ($oldPasswordEncryp != $userData->user_password) {
                $this->msgHandler(400, "Old Password is inccorect!");
            } elseif ($newPassword != $rePassword) {

                $this->msgHandler(400, "New Passwords are not matching!");
            } else {
                $userData->user_password = $newPasswordEncryp;
                if ($userData->save(false)) {

                    $this->msgHandler(200, "Your password has been changed!");
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionPurchasePackage() {

        try {
            $userId = Yii::app()->user->id;
            $packageId = $_POST['id'];
            $packageData = AdmPackage::model()->findByPk($packageId);
            $effectiveDate = date('Y-m-d H:i:s');
            $expireDate = date('Y-m-d', strtotime("+" . floor($packageData->pack_validity_period) . " months", strtotime($effectiveDate)));

            $model = new EmpPurchasePackage();
            $model->ref_user_id = $userId;
            $model->ref_pack_id = $packageId;
            $model->epp_pack_name = $packageData->pack_name;
            $model->epp_pack_amount = $packageData->pack_amount;
            $model->epp_pack_num_of_ads = $packageData->pack_num_of_ads;
            $model->epp_pack_is_unlimited = $packageData->pack_is_unlimited;
            $model->epp_pack_validity_period = $packageData->pack_validity_period;
            $model->epp_effective_date = $effectiveDate;
            $model->epp_expire_date = $expireDate;

            if ($model->save(false)) {
                $this->msgHandler(200, "Successfully Saved!");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionCreateAdvertisement() {
        $empId = Yii::app()->user->id;
        $model = new EmpAdvertisement();
        $this->render('createAdd', array('model' => $model, 'empId' => $empId));
    }

    public function actionSaveAdvertisement() {
        try {
         
            if ($_POST['group1'] == "on") {               
                $target_dir = "uploads/JobAdvertisements/";
                $target_file = $target_dir . basename($_FILES["EmpAdvertisement"]["name"]['AdverImage']);
                $validateData = Controller::validateImage($_FILES, $target_dir);
//                var_dump();exit;
                $status = $validateData["status"];
                $reason = $validateData["reason"];
            } else {
                $status = 1;
                $reason = '';
            }

            $employerId = $this->getRefEmpOrJsId(Yii::app()->user->id);
            $employerData = EmpEmployers::model()->findByPk($employerId);

            if ($status == 1) {
                $model = new EmpAdvertisement();
                $model->ad_reference = "";
                $model->ref_employer_id = $employerId;
                $model->ref_district_id = isset($_POST['district_id']) ? $_POST['district_id'] : 0;
                $model->ref_city_id = isset($_POST['city']) ? $_POST['city'] : 0;
                $model->ref_industry_id = $employerData->ref_ind_id;
                $model->ref_cat_id = $_POST['ref_cat_id'];
                $model->ref_subcat_id = $_POST['subCategories'];
                $model->ref_designation_id = isset($_POST['designations']) ? $_POST['designations'] : 0;
                $model->ad_expected_experience = isset($_POST['experience']) ? $_POST['experience'] : 0;
                $model->ad_salary = isset($_POST['salary']) ? $_POST['salary'] : 0;
                $model->ad_is_negotiable = isset($_POST['isNegotiable']) && $_POST['isNegotiable'] == "on" ? 1 : 0;
                $model->ref_work_type_id = $_POST['ref_work_type_id'];
                $model->ad_title = $_POST['title'];
                $model->ad_is_use_desig_as_title = isset($_POST['isDesigAsTitle']) && $_POST['isDesigAsTitle'] == "on" ? 1 : 0;
                $model->ad_expire_date = date('Y-m-d', strtotime($_POST['expireDate']));
                $model->ad_is_image = $_POST['group1'] == 1 ? 1 : 0;
                $model->ad_image_url = "";
                $model->ad_text = $_POST['advertisementText'];
                $model->ad_is_intern = $_POST['advertisementText'];

                if ($model->save(false)) {
                    if ($_POST['group1'] == "on") {
                        $model->ad_reference = Controller::getAdvertisementReferenceNo($model->ad_id);
                        $path = $this->UploadImage($_FILES, $target_dir, $model->ad_reference);
                        $model->ad_image_url = $path;
                        $model->save(false);
                    }
                    $this->msgHandler(200, "Successfully Saved...");
                }
            } else {
                $this->msgHandler(400, $reason);
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

}

?>
