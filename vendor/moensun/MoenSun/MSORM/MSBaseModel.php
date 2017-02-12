<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月25日-下午4:35:18
 */
namespace MoenSun\MSORM;

use Illuminate\Database\Eloquent\Model;
use MoenSun\MSORM\MSModelStatic;
use MoenSun\MSUtil\MSRequest;

class MSBaseModel
{
    private $mysqlFunReg = "/(^(?i)(\s*?)(unix_timestamp|now|uuid)\((\s*?)\)$)/";

    protected $_tableName;

    private $selectSql = "";
    private $updateSql = "";
    private $deleteSql = "";
    private $where = "";
    private $and = "";
    private $limit = "";
    private $orderby = "";
    private $groupby = "";

    public function __construct($tableName = "")
    {
        if ($tableName) {
            $this->_tableName = $tableName;
        }
    }

    /**
     * Get the table name.
     * @return string
     */
    public function getTableName()
    {
        return $this->_tableName;
    }

    /**
     * init the model by request param
     * @throws Exception
     */
    public function initByRequest()
    {
        try {
            $obj = MSModelStatic::toArray($this);
            foreach ($obj as $k => $v) {
                $kv = MSRequest::getParam($k);
                $this->$k = ($kv) ? $kv : (($this->$k) ? $this->$k : $kv);
            }
        } catch (Exception $e) {
            throw new Exception($e, 3, $previous);
        }
    }

    /**
     * trans an array to object
     * @param unknown $array
     * @throws \Exception
     */
    public function initArrayToObject($array)
    {
        try {
            $obj = MSModelStatic::toArray($this);
            foreach ($obj as $k => $v) {
                $kv = isset($array[$k]) ? $array[$k] : null;
                $this->$k = ($kv) ? $kv : (($this->$k) ? $this->$k : $kv);
            }
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    /**
     * Get all the model's variable as array.
     * @throws Exception
     * @return multitype:unknown
     */
    public function getFieldsArray($alis = null)
    {
        try {
            $obj = MSModelStatic::toArray($this);
            $fieldsArray = array();
            foreach ($obj as $k => $v) {
                $fieldsArray[] = ($alis ? ($alis . ".") : "") . $k;
            }
            return $fieldsArray;
        } catch (Exception $e) {
            throw new Exception($e, 3, $previous);
        }
    }
    ###########################################################################################################################################################
    /**
     * Set the where value when create the sql.
     * @param string $where
     *    This value can be string or array or the model object.
     * @param string $alias
     *    This parameter is using for create the join sql ,the default value is empty string.
     * @return \MoenSun\MSORM\MSBaseModel
     */
    public function where($where = "", $alias = "")
    {
        if ($where != '' && $where != null) {
            if (is_object($where)) {
                $obj = MSModelStatic::toArray($this);
                $fieldsArray = array();
                if (count($obj) > 0) {
                    foreach ($obj as $k => $v) {
                        if ($v != null || is_int($v)) {
                            $v = MSModelStatic::sqlRegular($v);
                            $fieldsArray[] = " " . (($alias == "") ? "" : $alias . ".") . $k . "=" . (preg_match($this->mysqlFunReg, $v) ? $v : "'" . $v . "'");
                        }
                    }
                    if (count($fieldsArray) > 0) {
                        $this->where = " where " . implode(" and ", $fieldsArray);
                    }
                }

            } else if (is_array($where)) {
                if (count($where)) {
                    $fieldsArray = array();
                    foreach ($where as $k => $v) {
                        if ($v != null || is_int($v)) {
                            $v = MSModelStatic::sqlRegular($v);
                            $fieldsArray[] = " " . (($alias == "") ? "" : $alias . ".") . $k . "=" . (preg_match($this->mysqlFunReg, $v) ? $v : "'" . $v . "'");
                        }
                    }
                    if (count($fieldsArray)) {
                        $this->where = " where " . implode(" and ", $fieldsArray);
                    }
                }
            } else if (is_string($where)) {
                $this->where = " where " . $where . " ";
            }
        }
        return $this;
    }

    public function andWhere($andWhere = "", $alias = "")
    {
        if ($andWhere != '' && $andWhere != null) {
            if (is_object($andWhere)) {
                $obj = MSModelStatic::toArray($this);
                if (count($obj)) {
                    $fieldsArray = array();
                    foreach ($obj as $k => $v) {
                        if ($v != null || is_int($v)) {
                            $v = MSModelStatic::sqlRegular($v);
                            $fieldsArray[] = " " . (($alias == "") ? "" : $alias . ".") . $k . "=" . (preg_match($this->mysqlFunReg, $v) ? $v : "'" . $v . "'");
                        }
                    }
                    if (count($fieldsArray)) {
                        $this->and .= " and " . implode(" and ", $fieldsArray);
                    }
                }
            } else if (is_string($andWhere)) {
                $this->and .= " and " . $andWhere;
            }
        }
        return $this;
    }

    public function limit($start, $limit)
    {
        $this->limit = " limit " . $start . "," . $limit . " ";
        return $this;
    }

    public function orderby($fields = "", $asc = true)
    {
        if ($fields) {
            if (is_array($fields)) {
                $this->orderby = " order by " . implode(",", $fields) . " " . ($asc ? "asc " : "desc ");
            } else if (is_string($fields)) {
                $this->orderby = " order by " . $fields . " " . ($asc ? "asc " : "desc ");
            }
        }
        return $this;
    }

    public function groupby($fields = "")
    {
        if ($fields) {
            $this->groupby = " group by " . $fields . " ";
        }
        return $this;
    }

    /**
     * Get the where value.
     * @return string
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * 获取and
     */
    public function getAnd()
    {
        return $this->and;
    }

    ###########################################################################################################################################################
    public function sqlCondition()
    {
        return $this->where . $this->and . $this->groupby . $this->orderby . $this->limit;
    }

    /**
     * 查询多行数据
     * @return string
     */
    public function find($obj=null)
    {
        if ($obj) {
            if (is_array($obj)) {
                $this->selectSql = "select " . implode(",", $obj) . " from " . $this->_tableName;
            } elseif (is_string($obj)) {
                $this->selectSql = "select {$obj} from " . $this->_tableName;
            }
        } else {
            $this->selectSql = "select " . implode(",", $this->getFieldsArray()) . " from " . $this->_tableName;
        }
        return $this->selectSql . $this->sqlCondition();
    }

    /**
     * 查询总数
     * @return string
     */
    public function count()
    {
        $this->selectSql = "select count(*)  from " . $this->_tableName;
        return $this->selectSql . $this->sqlCondition();
    }

    /**
     * 保存
     * @throws Exception
     * @return string|boolean
     */
    public function save()
    {
        try {
            $insertArray = null;
            if (is_object($this)) {
                $insertArray = $obj = MSModelStatic::toArray($this);
            } else if (is_array($this)) {
                $insertArray = $this;
            } else {

            }
            if ($insertArray) {
                $fields = array();
                $values = array();
                foreach ($insertArray as $k => $v) {
                    $v = MSModelStatic::sqlRegular($v);
                    $fields[] = $k;
                    $values[] = (preg_match($this->mysqlFunReg, $v) ? $v : "'" . $v . "'");
                }
                return "insert into " . $this->getTableName() . " (" . implode(",", $fields) . ") values (" . implode(",", $values) . ")";
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e, 5);
        }
    }

    /**
     * 更新
     * @return string|boolean
     */
    public function update()
    {
        try {
            $updateArray = null;
            if (is_object($this)) {
                $updateArray = $obj = MSModelStatic::toArray($this);
            } else if (is_array($this)) {
                $updateArray = $this;
            } else {

            }
            if ($updateArray) {
                $updateItems = array();
                foreach ($updateArray as $k => $v) {
                    if (is_int($v) || $v != null) {
                        $v = MSModelStatic::sqlRegular($v);
                        $updateItems[] = $k . "=" . (preg_match($this->mysqlFunReg, $v) ? $v : "'" . $v . "'");
                    } else if ($v == "" && is_string($v)) {
                        $updateItems[] = $k . "=null";
                    }
                }
                $this->updateSql = "update " . $this->getTableName() . " set " . implode(",", $updateItems);
                return $this->updateSql . $this->sqlCondition();
            }
            return false;
        } catch (Exception $e) {
            throw new Exception($e, 5);
        }
    }

    public function delete()
    {
        try {
            $this->deleteSql = "delete from " . $this->getTableName() . " ";
            return $this->deleteSql . $this->sqlCondition();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

###########################################################################################################################################################
    public static function getRowsCount($result, $field = 'count(*)')
    {
        return $result[$field];
    }


}

?>