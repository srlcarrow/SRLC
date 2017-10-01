<?php

class JobSeekerController extends Controller {

    public function actionViewRegistration($id) {
        try {
            $key = $id;
            $jsBasicTempData = JsBasicTemp::model()->findByAttributes(array('jsbt_encrypted_id' => $key));
            if (count($jsBasicTempData) > 0) {

                if ($jsBasicTempData->jsbt_is_verified == 1 && $jsBasicTempData->jsbt_is_finished == 0) {
                    $this->render('/Error/index', array('error' => "Already Verified Your Account"));
                } elseif ($jsBasicTempData->jsbt_is_verified == 1 && $jsBasicTempData->jsbt_is_finished == 1) {
                    $this->render('/Error/index', array('error' => "Expired URL"));
                } else {
                    $this->render('/site/verify', array('accessId' => $id, 'userName' => $jsBasicTempData->jsbt_email));
                }
            } else {
                $this->render('/Error/index', array('error' => "Invalid URL"));
            }
        } catch (Exception $exc) {
            $this->render('/Error/index', array('error' => "Invalid Verification"));
        }
    }

    public function actionFormStepOne($id = NULL) {
        if ($id != NULL) {
            $jsBasicTempData = JsBasicTemp::model()->findByAttributes(array('jsbt_encrypted_id' => $id));
        } elseif (isset($_POST['jsBasicKey'])) {
            $jsBasicTempData = JsBasicTemp::model()->findByAttributes(array('jsbt_encrypted_id' => $_POST['jsBasicKey']));
        }

        $jsTempId = $jsBasicTempData->jsbt_id;

        $jsBasicId = 0;
        $status = 0;

        if ($jsTempId > 0) {
            $jsBasicTempData = JsBasicTemp::model()->findByPk($jsTempId);
            if ($jsBasicTempData->jsbt_type == 1) {
                if ($jsBasicTempData->jsbt_is_verified == 0 && $jsBasicTempData->jsbt_is_finished == 0) {
                    $jsBasicTempData->jsbt_is_verified = 1;
                    if ($jsBasicTempData->save(false)) {
                        $jsBasic = new JsBasic();
                        $jsBasic->ref_jsbt_id = $jsBasicTempData->jsbt_id;
                        $jsBasic->js_fname = $jsBasicTempData->jsbt_fname;
                        $jsBasic->js_lname = $jsBasicTempData->jsbt_lname;
                        $jsBasic->js_email = $jsBasicTempData->jsbt_email;
                        $jsBasic->js_contact_no1 = $jsBasicTempData->jsbt_contact_no;
                        $jsBasic->js_contact_no2 = '';
                        $jsBasic->js_address = '';
                        $jsBasic->js_gender = 0;
                        $jsBasic->js_experience = '';
                        $jsBasic->js_highest_academic_quali = '';
                        $jsBasic->js_nameof_academic_quali = '';
                        $jsBasic->js_created_time = date('Y-m-d H:i:s');
                        $jsBasic->js_updated_time = date('Y-m-d H:i:s');
                        $jsBasic->js_cv_path = '';
                        if ($jsBasic->save(false)) {
                            $user = User::model()->findByAttributes(array('ref_emp_or_js_id' => $jsBasicTempData->jsbt_id));
                            $user->ref_emp_or_js_id = $jsBasic->js_id;
                            $user->user_is_verified = 1;
                            $user->save(false);
                            $status = 1; // Verified But Not Finished
                        }
                    }
                } elseif ($jsBasicTempData->jsbt_is_verified == 1 && $jsBasicTempData->jsbt_is_finished == 0) {
                    $jsBasicId = JsBasic::model()->findByAttributes(array('ref_jsbt_id' => $jsBasicTempData->jsbt_id));
                    $status = 1;
                }
            }
        }

        $jsBasicData = JsBasic::model()->findByAttributes(array('ref_jsbt_id' => $jsTempId));
        $jsProfQualifications = JsQualifications::model()->findAllByAttributes(array('ref_js_id' => $jsBasicData->js_id, 'jsquali_type' => 1));
        $jsMemberships = JsQualifications::model()->findAllByAttributes(array('ref_js_id' => $jsBasicData->js_id, 'jsquali_type' => 2));
        $jsBasicKey = $id;
        if (count($jsBasicData) == 0) {
            $jsBasicData = new JsBasic();
        }


        $this->renderPartial('ajaxLoad/form_step1', array('jsBasicData' => $jsBasicData, 'jsProfQualifications' => $jsProfQualifications, 'jsMemberships' => $jsMemberships, 'jsBasicKey' => $jsBasicKey));
    }

    public function actionSaveStepOne() {
        try {
            $jsId = Controller::decodePrimaryKeys($_POST['jsBasicKey']);

            $model = JsBasic::model()->findByPk($jsId);
            $model->js_address = $_POST['address'];
            $model->js_contact_no2 = $_POST['contactNo'];
            $model->js_gender = 1;
            $model->js_dob = $_POST['dob'];
            $model->js_experience = $_POST['experience'];
            $model->js_highest_academic_quali = $_POST['highestAcaQuali'];
            $model->js_nameof_academic_quali = $_POST['nameOfAcaQuali'];
            $model->js_updated_time = date('Y-m-d H:i:s');
            if ($model->save(false)) {
                $profQualiIds = $_POST['profQualiHiddenName'];
                $profQualiNames = $_POST['profQualiName'];

                for ($i = 0; $i < count($profQualiIds); $i++) {
                    if ($profQualiNames[$i] != "") {
                        if ($profQualiIds[$i] == 0) {
                            $JsQualifications = new JsQualifications();
                        } else {
                            $JsQualifications = JsQualifications::model()->findByPk($profQualiIds[$i]);
                        }
                        $JsQualifications->ref_js_id = $model->js_id;
                        $JsQualifications->jsquali_type = 1;
                        $JsQualifications->jsquali_qualification = $profQualiNames[$i];
                        $JsQualifications->save(false);
                    }
                }

                $membershipIds = $_POST['membershipHiddenName'];
                $membershipNames = $_POST['membershipName'];
                for ($i = 0; $i < count($membershipIds); $i++) {
                    if ($membershipNames[$i] != "") {
                        if ($membershipIds[$i] == 0) {
                            $JsQualifications = new JsQualifications();
                        } else {
                            $JsQualifications = JsQualifications::model()->findByPk($membershipIds[$i]);
                        }
                        $JsQualifications->ref_js_id = $model->js_id;
                        $JsQualifications->jsquali_type = 2;
                        $JsQualifications->jsquali_qualification = $membershipNames[$i];
                        $JsQualifications->save(false);
                    }
                }

                $this->msgHandler(200, "Successfully Saved...", array('jsBasicKey' => $_POST['jsBasicKey']));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionDeleteQualification() {
        try {
            $id = $_POST['id'];
            if (JsQualifications::model()->deleteByPk($id)) {
                $this->msgHandler(200, "Deleted Successfully...");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function actionFormStepTwo() {
        $jsBasicKey = $_POST['jsBasicKey'];
        $jsId = Controller::decodePrimaryKeys($jsBasicKey);
        $jsEmploymentData = JsEmploymentData::model()->findByAttributes(array('ref_js_id' => $jsId));
        $categories = AdmCategory::model()->findAll();
        if (count($jsEmploymentData) == 0) {
            $jsEmploymentData = new JsEmploymentData();
        }

        $this->renderPartial('ajaxLoad/form_step2', array('categories' => $categories, 'jsBasicKey' => $jsBasicKey, 'jsEmploymentData' => $jsEmploymentData));
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
        $jsBasicKey = $_POST['jsBasicKey'];
        $workTypes = AdmWorkType::model()->findAll();
        $this->renderPartial('ajaxLoad/form_step3', array('workTypes' => $workTypes, 'jsBasicKey' => $jsBasicKey));
    }

    public function actionSaveStepTwo() {
        try {
            $jsId = Controller::decodePrimaryKeys($_POST['jsBasicKey']);
            $jsEmploymentData = JsEmploymentData::model()->findByAttributes(array('ref_js_id' => $jsId));
            if (count($jsEmploymentData) > 0) {
                $model = $jsEmploymentData;
            } else {
                $model = new JsEmploymentData();
            }

            $model->ref_js_id = $jsId;
            $model->ref_industry_id = $_POST['ind_id'];
            $model->ref_category_id = $_POST['cat_id'];
            $model->ref_sub_category_id = $_POST['subCategories'];
            $model->ref_designation_id = $_POST['designations'];
            $model->jsemp_expected_ref_industry_id = isset($_POST['ind_id']) == true ? $_POST['ind_id'] : 0;
            $model->jsemp_expected_ref_category_id = isset($_POST['cat_id']) == true ? $_POST['cat_id'] : 0;
            $model->jsemp_expected_sub_category_id = isset($_POST['subCategories']) == true ? $_POST['subCategories'] : 0;
            $model->jsemp_expected_designation_id = isset($_POST['designations']) == true ? $_POST['designations'] : 0;
            $model->jsemp_expected_salary = 0;
            $model->jsemp_no_of_experience_years = 0;
            $model->jsemp_no_of_experience_months = 0;
            $model->jsemp_is_fresher = isset($_POST['isFresher']) && $_POST['isFresher'] == "on" ? 1 : 0;
            if ($model->save(false)) {
                $this->msgHandler(200, "Successfully Saved...", array('jsBasicKey' => $_POST['jsBasicKey']));
            }
        } catch (Exception $ex) {
            $this->msgHandler(400, $ex->getTraceAsString());
        }
    }

    public function actionSaveStepThree() {
//        try {
        $skills = explode(',', $_POST['skills']);
        $skillsString = '';
        $skillsArray = array();
        foreach ($skills as $skill) {
            if (is_numeric($skill)) {
                array_push($skillsArray, $skill);
            } else {
                $modelSkills = new AdmSkills();
                $modelSkills->skill_name = $skill;
                if ($modelSkills->save(false)) {
                    array_push($skillsArray, $modelSkills->skill_id);
                }
            }
        }

        $skillsString = implode(',', $skillsArray);


        $jsId = Controller::decodePrimaryKeys($_POST['jsBasicKey']);
        $jsEmploymentData = JsEmploymentData::model()->findByAttributes(array('ref_js_id' => $jsId));
        if (count($jsEmploymentData) > 0) {
            $model = $jsEmploymentData;
        } else {
            $model = new JsEmploymentData();
        }

        $model->ref_js_id = $jsId;
        $model->ref_industry_id = $_POST['ind_id'];
        $model->ref_category_id = $_POST['cat_id'];
        $model->ref_sub_category_id = $_POST['subCategories'];
        $model->ref_designation_id = $_POST['designations'];
        $model->jsemp_expected_ref_industry_id = $_POST['ind_id'];
        $model->jsemp_expected_ref_category_id = $_POST['cat_id'];
        $model->jsemp_expected_sub_category_id = $_POST['subCategories'];
        $model->jsemp_expected_designation_id = $_POST['designations'];
        $model->jsemp_expected_salary = $_POST['salary'];
        $model->jsemp_no_of_experience_years = $_POST['experience'];
        $model->jsemp_no_of_experience_months = 0;
        $model->jsemp_expected_cities_to_work = $_POST['cities'];
        $model->jsemp_skills = $skillsString;
        $model->jsemp_create_time = date('Y-m-d H:i:s');
        $model->jsemp_updated_time = date('Y-m-d H:i:s');
        if ($model->save(false)) {
            $jsBasic = JsBasic::model()->findByPk($jsId);
            $jsBasicTempData = JsBasicTemp::model()->findByPk($jsBasic->ref_jsbt_id);
            $jsBasicTempData->jsbt_is_finished = 1;
            $jsBasicTempData->save(false);
            $this->msgHandler(200, "Successfully Saved...");
        }
//        } catch (Exception $ex) {
//            $this->msgHandler(400, $exc->getTraceAsString());
//        }
    }

}
