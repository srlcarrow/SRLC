<?php

class CategoryController extends Controller {

    public function actionViewCategory() {
        $this->render('viewCategory');
    }

    public function actionViewCategoryData() {
        $categories = AdmCategory::model()->findAll();
        $this->renderPartial('ajaxLoad/viewCategoryData', array('categories' => $categories));
    }

    public function actionSaveCategory() {
        try {
            $model = new AdmCategory();
            $model->cat_name = $_POST['name'];
            $model->cat_order = $_POST['order'];
            if ($model->save(false)) {
                $this->msgHandler(200, "Successfully Saved...");
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

    public function actionDeleteCategory() {
        try {
            $id = $_POST['id'];
            $model = new AdmCategory();
            if ($model->deleteByPk($id)) {
                $this->msgHandler(200, "Deleted Successfully...");
            }
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

}
?>

