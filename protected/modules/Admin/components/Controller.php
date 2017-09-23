<?php

class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public static function msgHandler($code, $msg, $data = NULL) {
        if ($code == 200) {
            echo json_encode(array("code" => $code, "msg" => $msg, "data" => $data));
        } else {
            echo json_encode(array("code" => $code, "msg" => $msg, "data" => $data));
        }
    }

    public function redirectToLogin() {
        parent::init();
        if (yii::app()->user->isGuest) {
            $this->redirect(array('Default/ViewLogin?', 'controllerAction' => Yii::app()->urlManager->parseUrl(Yii::app()->request), 'request_arr' => $_REQUEST));
        }
    }

    public static function validateImage($fileData, $targetDir) {
        $targetFile = $targetDir . basename($_FILES["EmpAdvertisement"]["name"]['AdverImage']);
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        $status = 1;
        $reason = "";

        // Check file size
        if ($fileData["EmpAdvertisement"]["size"]["AdverImage"] > 3145728) {
            $status = 0;
            $reason = "File is too Large";
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            $status = 0;
            $reason = "Sorry, file already exists.";
        }

        // Check if file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $status = 0;
            $reason = "Sorry, only JPG, JPEG, PNG files are allowed.";
        }

        $arr["status"] = $status;
        $arr["reason"] = $reason;

        return $arr;
    }

    public static function UploadImage($fileData, $targetDir, $fileName) {
        $year = date('Y');
        $month = date('F');

        $targetFile = $targetDir . basename($fileData["EmpAdvertisement"]["name"]['AdverImage']);
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        $path = $targetDir . $year . "/$month";
        if (!file_exists($path)) {
            mkdir($path, 0, true);
        }

        $fileName = $fileName . "." . $imageFileType;
        move_uploaded_file($fileData["EmpAdvertisement"]["tmp_name"]["AdverImage"], $path . '/' . $fileName);
        return $path . '/' . $fileName;
    }

    public static function getEmployeeReferenceNo($id) {
        $reference = "1" . str_pad($id, 8, '0', STR_PAD_LEFT);
        return $reference;
    }

}
