<?php

class CategoryController extends Controller {

    public function actionViewCategory() {
        $this->render('viewCategory');
    }

    public function actionViewCategoryData() {
        $this->render('ajaxLoad/viewCategory');
    }

}
?>

