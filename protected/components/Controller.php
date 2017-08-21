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

    public static function createSearchCriteriaForAdvertisement($query, $joinUsing, $page, $limit = NULL, $empbasic = NULL, $other = NULL) {
        $sqlLimit = '';
        if ($limit == NULL) {
            $limit = 12;
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

//        if ($empbasic == NULL) {
//            $join = ' JOIN `hr_empbasic` `t` ON t.emp_id=' . $joinUsing . ' ' . $join;
//        }

        $askedWhere = $askedQuery[1] == NULL ? '' : ' AND ' . $askedQuery[1];

        $returnQuery = $askedQuery[0] . $join . ' WHERE ' . $where . $askedWhere . ' ' . $other . $sqlLimit;
        $returnQueryCount = $askedQuery[0] . $join . ' WHERE ' . $where . $askedWhere . ' ' . $other;

        $result = yii::app()->db->createCommand($returnQuery)->setFetchMode(PDO::FETCH_OBJ)->queryAll();
        $count = count(yii::app()->db->createCommand($returnQueryCount)->setFetchMode(PDO::FETCH_OBJ)->queryAll());

        return array('result' => $result, 'count' => $count);
    }

    public static function searchJoinCriterias() {
        $joinCriteria = Yii::app()->db->createCommand()
                ->leftJoin('hr_employment emp', 't.emp_id=emp.ref_emp_id')
                ->leftJoin('hr_empcontact cont', 't.emp_id=cont.ref_emp_id')
                ->leftJoin('hr_empdemographic demogr', 't.emp_id=demogr.ref_emp_id')         
                ->getText();

        $joinCriteria = explode("SELECT *", $joinCriteria, 2);
        return $joinCriteria[1];
    }

    public static function searchWhereCriterias() {
        $str = "emp_id !='' ";
        if (!empty($_REQUEST['activeStatus']) && ($_REQUEST['activeStatus'] == "resign")) {
            $str .= " AND emp_status = 'resign'";
        } elseif (!empty($_REQUEST['activeStatus'])) {
            $str .= " AND emp_status ='" . $_REQUEST['activeStatus'] . "' ";
        } 
        
        return $str;
    }

}
