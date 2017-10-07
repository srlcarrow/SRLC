<?php

class UserController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionProfile() {
        $userId = Yii::app()->user->id;
        $user = User::model()->findByPk($userId);
        $userType = $user->user_type;

        if ($userType == 1) {
            $model = JsBasic::model()->findByAttributes(array('js_id' => $user->ref_emp_or_js_id));
            $employment = JsEmploymentData::model()->findByAttributes(array('ref_js_id' => $model->js_id));
        }

        $model = $model == NULL ? new JsBasic() : $model;
        $employment = $employment == NULL ? new JsEmploymentData() : $employment;

        $this->render('profile', array('model' => $model, 'employment' => $employment));
    }

    public function actionPersonalInfo() {
        $this->renderPartial('ajaxLoad/personalInformation');
    }

    public function actionPersonalInfoEdit() {
        $this->renderPartial('ajaxLoad/personalInformation_form');
    }
    
    public function actionCurrentPositionInfo() { 
        $this->renderPartial('ajaxLoad/currentPositionInfo');
    }
    
    public function actionExpectedPositionInfo() { 
        $this->renderPartial('ajaxLoad/expectedPositionInfo');
    }
    
    //Popup
    public function actionImageCrop() {
        $this->renderPartial('ajaxLoad/popup/imageCrop');
    }

}
