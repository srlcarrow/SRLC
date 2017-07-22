<?php

class EmployerController extends Controller {

    public function actionViewEmployer() {
        $this->render('ViewEmployer');
    }

    public function actionAdd() {
        $this->render('add');
    }

}
?>

