<?php

class CategoryController extends Controller {

    public function actionViewCategory() {
        $this->render('viewCategory');
    }

    public function actionViewCategoryData() {
        $this->renderPartial('ajaxLoad/viewCategoryData');
    }

}
?>

