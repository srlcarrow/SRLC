<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
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

    public static function createSearchCriteriaForAdvertisement($query, $joinUsing, $page, $limit = NULL) {
        $sqlLimit = '';
        if ($limit == NULL) {
            $limit = 10;
            $offset = ($page - 1) * $limit;
            $sqlLimit = ' LIMIT ' . $limit . ' OFFSET ' . $offset;
        } elseif ($limit > 0 && $limit != NULL) {
            $limit = $limit;
            $offset = ($page - 1) * $limit;
            $sqlLimit = ' LIMIT ' . $limit . ' OFFSET ' . $offset;
        }

        $askedQuery = explode("WHERE", $query, 2);
        $askedJoin = explode("LEFT JOIN", $query, 2);
        $requestedJoin = '';

        $join = Controller::searchJoinCriterias();
        $where = Controller::searchWhereCriterias();

        $askedWhere = '';
        if (count($askedQuery) > 1) {
            $askedWhere = $askedQuery[1] == NULL ? '' : ' AND ' . $askedQuery[1];
        }

        $returnQuery = $askedQuery[0] . $join . ' WHERE ' . $where . $askedWhere . ' ' . $sqlLimit;
        $returnQueryCount = $askedQuery[0] . $join . ' WHERE ' . $where . $askedWhere . ' ';
        $result = yii::app()->db->createCommand($returnQuery)->setFetchMode(PDO::FETCH_OBJ)->queryAll();
        $count = count(yii::app()->db->createCommand($returnQueryCount)->setFetchMode(PDO::FETCH_OBJ)->queryAll());

        return array('result' => $result, 'count' => $count);
    }

    public static function searchJoinCriterias() {
        $joinCriteria = Yii::app()->db->createCommand()
                ->leftJoin('adm_category ac', 'ad.ref_cat_id=ac.cat_id')
                ->leftJoin('adm_subcategory as1', 'ad.ref_subcat_id=as1.scat_id')
                ->leftJoin('adm_work_type awt', 'ad.ref_work_type_id=awt.wt_id')
                ->leftJoin('adm_district dis', 'ad.ref_district_id=dis.district_id')
                ->leftJoin('adm_city acity', 'ad.ref_city_id=acity.city_id')
                ->leftJoin('adm_designation desig', 'ad.ref_designation_id=desig.desig_id')
                ->leftJoin('emp_employers emp', 'ad.ref_employer_id=emp.employer_id')
                ->getText();

        $joinCriteria = explode("SELECT *", $joinCriteria, 2);
        return $joinCriteria[1];
    }

    public static function searchWhereCriterias() {
        $str = "ad.ad_id !=0 ";
        if (!empty($_REQUEST['catId']) && $_REQUEST['catId'] != 'undefined' && $_REQUEST['catId'] != 0) {
            $str .= " AND ad.ref_cat_id = " . $_REQUEST['catId'];
        }
        if (!empty($_REQUEST['subCatId']) && $_REQUEST['subCatId'] != 'undefined' && $_REQUEST['subCatId'] != 0) {
            $str .= " AND ad.ref_subcat_id = " . $_REQUEST['subCatId'];
        }
        if (!empty($_REQUEST['district_id']) && $_REQUEST['district_id'] != 'undefined' && $_REQUEST['district_id'] != 0) {
            $str .= " AND ad.ref_district_id = " . $_REQUEST['district_id'];
        }
        if (!empty($_REQUEST['cities']) && $_REQUEST['cities'] != 'undefined' && $_REQUEST['cities'] != 0) {
            $str .= " AND ad.ref_city_id =" . $_REQUEST['cities'] . " ";
        }
        if (!empty($_REQUEST['wt_id']) && $_REQUEST['wt_id'] != 'undefined' && $_REQUEST['wt_id'] != 0) {
            $str .= " AND ad.ref_work_type_id =" . $_REQUEST['wt_id'] . " ";
        }
        return $str;
    }

    public static function GetSubCategoriesByCatId($catId) {
        $subCategories = AdmSubcategory::model()->findAllByAttributes(array('ref_cat_id' => $catId), array('order' => 'scat_order'));
        $subCatData = array();
        foreach ($subCategories as $subCategory) {
            $subCat["scat_id"] = $subCategory->scat_id;
            $subCat["ref_cat_id"] = $subCategory->ref_cat_id;
            $subCat["scat_name"] = $subCategory->scat_name;
            $subCat["scat_order"] = $subCategory->scat_order;
            array_push($subCatData, $subCat);
        }

        return $subCatData;
    }

    public static function GetDesignationsByCatId($catId) {
        $designations = AdmDesignation::model()->findAllByAttributes(array('ref_cat_id' => $catId), array('order' => 'desig_name'));
        $designationData = array();
        foreach ($designations as $designation) {
            $desig["desig_id"] = $designation->desig_id;
            $desig["ref_cat_id"] = $designation->ref_cat_id;
            $desig["desig_name"] = $designation->desig_name;
            array_push($designationData, $desig);
        }

        return $designationData;
    }

    public static function searchSkills($searchText) {
        $skills = yii::app()->db->createCommand("SELECT * FROM adm_skills WHERE skill_name LIKE '%" . $searchText . "%' ORDER BY skill_name;")->setFetchMode(PDO::FETCH_OBJ)->queryAll();
        $skillsData = array();
        foreach ($skills as $skill) {
            $ability["skill_id"] = $skill->skill_id;
            $ability["skill_name"] = $skill->skill_name;
            array_push($skillsData, $ability);
        }

        return $skillsData;
    }

    public static function randomAccessToken($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $chars1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chars2 = "0123456789";
        $password = substr(str_shuffle($chars), 0, 4);
        $password1 = substr(str_shuffle($chars1), 0, 3);
        $password2 = substr(str_shuffle($chars2), 0, 1);
        $passwordNew = str_shuffle($password . $password1 . $password2);
        return $passwordNew;
    }

    public static function randomPassword($length = 8) {
        $chars = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789!@#$%&*";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    static function encodeMailAction($id) {
        $key = time() . "_4you_" . $id . "_srlc_" . self::randomAccessToken();
        return base64_encode($key);
    }

    static function decodeMailAction($key) {
        $dec_key = base64_decode($key);
        $dec_data = explode("_", $dec_key);       
        return $dec_data;
    }

}
