<?php
class UserController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionProfile() {
        $userId = Yii::app()->user->id;
        $user = User::model()->findByAttributes(array('user_id' => $userId));
        $userType = $user->user_type; 
        
        
        if($userType==1){
            $model = JsBasic::model()->findByAttributes(array('ref_jsbt_id' => $user->ref_emp_or_js_id));
            $employment = JsEmploymentData::model()->findByAttributes(array('ref_js_id' => $user->ref_emp_or_js_id));
        }else{
            $model = new JsBasic();  
            $employment = new JsEmploymentData();  
        }       
        $this->render('profile',array('model' => $model));  
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