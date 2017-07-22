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
//            var_dump($_POST);exit;
            $model = new AdmCategory();
            $model->cat_name = $_POST['name'];
            $model->cat_order = $_POST['order'];
            if ($model->save(false)) {
                $subCat = new AdmSubcategory();

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

    public function actionGetEditCategoryData() {
        try {
            $id = $_POST['id'];
            $categoryData = AdmCategory::model()->findByPk($id);
            $category["cat_id"] = $categoryData->cat_id;
            $category["cat_name"] = $categoryData->cat_name;
            $category["cat_order"] = $categoryData->cat_order;

            $subCatData = array();
            $subCategoryData = AdmSubcategory::model()->findAllByAttributes(array('ref_cat_id' => $id));
            foreach ($subCategoryData as $subCategory) {
                $subCat["scat_id"] = $subCategory->scat_id;
                $subCat["ref_cat_id"] = $subCategory->ref_cat_id;
                $subCat["scat_name"] = $subCategory->scat_name;
                $subCat["scat_order"] = $subCategory->scat_order;
                array_push($subCatData, $subCat);
            }

            $this->msgHandler(200, "Deleted Successfully...", array('categoryData' => $category, 'subCategoryData' => $subCatData));
        } catch (Exception $exc) {
            $this->msgHandler(400, $exc->getTraceAsString());
        }
    }

}
?>

