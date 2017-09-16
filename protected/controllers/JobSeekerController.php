<?php

class JobSeekerController extends Controller {

    public function actionViewRegistration($id) {
        try {
            $key = Controller::decodeMailAction($id);
            $jsTempId = $key[2];
            $jsBasicTempData = JsBasicTemp::model()->findByPk($jsTempId);
            if ($id == $jsBasicTempData->jsbt_encrypted_id) {
                $this->render('jobSeekerRegistration', array('accessId' => $id));
            } else {
                echo "Invalid URL";
                exit;
            }
        } catch (Exception $exc) {
            echo "Invalid Verification";
        }
    }

    public function actionFormStepOne() {
        $key = Controller::decodeMailAction($_POST['accessId']);
        $jsTempId = $key[2];
        $this->renderPartial('ajaxLoad/form_step1', array());
    }

    public function actionSaveStepOne() {
        try {
            $model = new JsBasic();
            $model->js_name = '';
            $model->js_email = '';
            $model->js_contact_no1 = $_POST['contactNo'];
            $model->js_contact_no2 = '';
            $model->js_address = $_POST['address'];
            $model->js_gender = 1;
            $model->js_dob = $_POST['dob'];
//            if ($model->save(false)) {
            $this->msgHandler(200, "Successfully Saved...");
//            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionFormStepTwo() {
        $categories = AdmCategory::model()->findAll();
        $this->renderPartial('ajaxLoad/form_step2', array('categories' => $categories));
    }

    public function actionGetSubCategories() {
        $subCatData = $this->GetSubCategoriesByCatId($_POST['id']);
        $this->msgHandler(200, "Data Transfer", array('subCategoryData' => $subCatData));
    }

    public function actionGetDesignationsByCat() {
        $designationData = $this->GetDesignationsByCatId($_POST['id']);
        $this->msgHandler(200, "Data Transfer", array('designationData' => $designationData));
    }

    public function actionSearchSkills() {
        $skillsData = $this->searchSkills($_POST['searchSkill']);
        $this->msgHandler(200, "Data Transfer", array('skillsData' => $skillsData));
    }

    public function actionFormStepThree() {
        $workTypes = AdmWorkType::model()->findAll();
        $modelCV = new JsCv();
        $this->renderPartial('ajaxLoad/form_step3', array('workTypes' => $workTypes, 'modelCV' => $modelCV));
    }

    public function actionSaveStepTwo() {
        try {
//            $model = new JsEmploymentData();
//            $model->ref_js_id = 1;
//            $model->ref_industry_id = $_POST['ind_id'];
//            $model->ref_category_id = $_POST['cat_id'];
//            $model->ref_sub_category_id = $_POST['subCategories'];
//            $model->ref_designation_id = $_POST['designations'];
//            $model->jsemp_expected_ref_industry_id = $_POST['ind_id'];
//            $model->jsemp_expected_ref_category_id = $_POST['cat_id'];
//            $model->jsemp_expected_sub_category_id = $_POST['subCategories'];
//            $model->jsemp_expected_designation_id = $_POST['designations'];
//            $model->jsemp_expected_salary = 0;
//            $model->jsemp_no_of_experience_years = 0;
//            $model->jsemp_no_of_experience_months = 0;
//            if ($model->save(false)) {
            $this->msgHandler(200, "Successfully Saved...");
//            }
        } catch (Exception $ex) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

//    public function actionSaveStepThree() {
//        try {
//            $path = Yii::app()->basePath . '/uploads';
//            if (!is_dir($path)) {
//                mkdir($path);
//            }
//            var_dump($_POST);
//            exit;
//            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . "Test");
//            exit;
//            $model = new JsEmploymentData();
//            $model->ref_js_id = 1;
//            $model->ref_industry_id = $_POST['ind_id'];
//            $model->ref_category_id = $_POST['cat_id'];
//            $model->ref_sub_category_id = $_POST['subCategories'];
//            $model->ref_designation_id = $_POST['designations'];
//            $model->jsemp_expected_ref_industry_id = $_POST['ind_id'];
//            $model->jsemp_expected_ref_category_id = $_POST['cat_id'];
//            $model->jsemp_expected_sub_category_id = $_POST['subCategories'];
//            $model->jsemp_expected_designation_id = $_POST['designations'];
//            $model->jsemp_expected_salary = $_POST['salary'];
//            $model->jsemp_no_of_experience_years = $_POST['experience'];
//            $model->jsemp_no_of_experience_months = 0;
//
//            if ($model->save(false)) {
//                $this->msgHandler(200, "Successfully Saved...");
//            }
//        } catch (Exception $ex) {
//            $this->msgHandler(400, $exc->getTraceAsString());
//        }
//    }
    public function actionSaveStepThree() {
        try {
            $model = new JsCv;
//            $model->up_dated = date('Y-m-d');
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            $path = Yii::app()->basePath . '/../uploads';

            if (!is_dir($path)) {
                mkdir($path);
            }
            $file = CUploadedFile::getInstance($model, 'cv_path');
            var_dump($file);
            exit;
            if (isset($_POST['JsCv']['cv_path'])) {
                $model->cv_path = $_POST['JsCv']['cv_path'];
                if (@!empty($_FILES['JsCv']['name']['cv_path'])) {
                    $model->cv_path = $_POST['JsCv']['cv_path'];

//                    if ($model->validate(array('doc_file'))) {
//                        $model->doc_file = CUploadedFile::getInstance($model, 'doc_file');
//                    } else {
//                        $model->doc_file = '';
//                    }

                    $model->doc_file->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->doc_file)));

                    $model->doc_type = $model->doc_file->getType();
                    $model->doc_size = $model->doc_file->getSize();
                }

                $model->doc_file = time() . '_' . str_replace(' ', '_', strtolower($model->doc_file));

                if ($model->save()) {
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

}
