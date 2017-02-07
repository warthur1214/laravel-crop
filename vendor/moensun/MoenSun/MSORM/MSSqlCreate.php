<?php 
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月25日-下午4:32:28
 */
namespace MoenSun\MSORM;
class MSSqlCreate{
	public static $mysqlFunReg="/^(?i)(\s*?)(unix_timestamp|now|uuid)\((\s*?)\)$/";
	
	public static function conditionsLinkStr($field,$link,$idsStr){
		$idsArray=explode(",", $idsStr);
		if($idsArray){
			foreach ($idsArray as $k=>$v){
				if($k==0){
					$idsArray[$k]=" ".$field."='".$idsArray[$k]."'";
				}else {
					$idsArray[$k]=" ".$link." ".$field."='".preg_replace("/'/","\\'" , $idsArray[$k])."'";
				}
			}
		}
		return  implode(" ", $idsArray);
	}
	
	public static function conditionsLinkArray($field,$link,$idsArray){
		if($idsArray){
			foreach ($idsArray as $k=>$v){
				if($k==0){
					$idsArray[$k]=" ".$field."='".$idsArray[$k]."'";
				}else {
					$idsArray[$k]=" ".$link." ".$field."='".preg_replace("/'/","\\'",$idsArray[$k])."'";
				}
			}
		}
		return  implode(" ", $idsArray);
	}
	
	public static function conditionLink($field,$link,$ids,$where=false){
		if(is_string($ids)){
			$ids=explode(",", $ids);
		}
		if(count($ids)>0){
			foreach ($ids as $k=>$v){
				if($k==0){
					$ids[$k]=" ".$field."='".$ids[$k]."'";
				}else {
					$ids[$k]=" ".$link." ".$field."='".preg_replace("/'/","\\'",$ids[$k])."'";
				}
			}			
		}
		
		return implode("  ", $ids);		
	}
	
	
	/**
	 * 生成sql语句
	 * @param $sql 原始sql 字符串用#{} ,int ,decimal用~{}
	 * @param $parameterObj 一个Class
	 * @throws Exception
	 */
	public static function createSql($sqlPre,$parameterObj){
		try {
			if(is_object($parameterObj)||is_array($parameterObj)){
				$parameterArray=is_object($parameterObj)?MSModelStatic::toArray($parameterObj):$parameterObj;
	
				$keyReg=preg_match_all("/(\#|\~)\{.*?\}/", $sqlPre, $matches);
				if($keyReg){
					$keyArray=$matches[0];
					foreach ($keyArray as $k=>$v){
						if(preg_match("/^\#/", $keyArray[$k])){
							$sqlPre=str_replace(preg_replace("/'/","\'",$keyArray[$k]),"'".$parameterArray[preg_replace("/[#{} ]/","",$keyArray[$k])]."'", $sqlPre);
						}else if(preg_match("/^\~/", $keyArray[$k])){
							$sqlPre=str_replace(preg_replace("/'/","\'",$keyArray[$k]),$parameterArray[preg_replace("/[~{} ]/","",$keyArray[$k])], $sqlPre);
						}
					}
				}
	
			}else {
				$sqlPre=preg_replace("/\#\{.*?\}/", "'".$parameterObj."'", $sqlPre);
				$sqlPre=preg_replace("/\~\{.*?\}/", $parameterObj, $sqlPre);
			}
			return $sqlPre;
		} catch (Exception $e) {
			throw new Exception($e,5);
		}
	}
	
	/**
	 * 创建Insert 语句
	 * @param $insertObj
	 * @param $table
	 * @throws Exception
	 */
	public static function createInsertSql($insertObj,$table=null){
		try {
			$insertArray=null;
			if(is_object($insertObj)){
				$insertArray=BaneORMStatic::toArray($insertObj);
			}else if(is_array($insertObj)){
				$insertArray=$insertObj;
			}else{
					
			}
			if($insertArray){
				$fields=array();
				$values=array();
				foreach ($insertArray as $k=>$v){
					$fields[]=$k;
					$values[]=(($v==null) ||($v==""))?"null":(preg_match(self::$mysqlFunReg, $v)?$v:"'".$v."'");
				}
				return "insert into ".($table?$table:($insertObj->getTableName()))." (".implode(",",$fields).") values (".implode(",",$values).")";
			}else {
				return false;
			}
		} catch (Exception $e) {
			throw new Exception($e,5);
		}
	}
	/**
	 * 创建Update语句
	 * @param $updateObj
	 * @param $condition
	 * @param $table
	 * @throws Exception
	 */
	public static function createUpdateSql($updateObj,$condition,$table=null){
		try {
			$updateArray=null;
			if(is_object($updateObj)){
				$updateArray=BaneORMStatic::toArray($updateObj);
			}else if(is_array($updateObj)){
				$updateArray=$updateObj;
			}else{
					
			}
			if($updateArray){
				$updateItems=array();
				foreach ($updateArray as $k=>$v){
					if($v!=null){
						$updateItems[]=$k."=".(preg_match(self::$mysqlFunReg, $v)?$v:"'".$v."'");
					}
				}
				if(is_array($condition)){
					$conditionArr=array();
					foreach ($condition as $ck=>$cv){
						$conditionArr[]=($ck==0)?" ".$cv."=".(preg_match(self::$mysqlFunReg, $updateArray[$cv])?$updateArray[$cv]:"'".$updateArray[$cv]."'")." ":" and ".$cv."=".(preg_match(self::$mysqlFunReg, $updateArray[$cv])?$updateArray[$cv]:"'".$updateArray[$cv]."'")." ";
					}
					$condition=implode(" ", $conditionArr);
				}
				return  "update ".($table?$table:($updateObj->getTableName()))." set ".implode(",", $updateItems)." ".($condition?" where ".$condition:"");
			}else {
				return false;
			}
		} catch (Exception $e) {
			throw new Exception($e,5);
		}
	}
	
	public static function deleteItemsLogic($table,$statusField,$condition){
		try {
			if($condition){
				return "update ".$table." set ".$statusField."='-1'  where ".$condition;
			}
		} catch (Exception $e) {
			throw new Exception($e,5);
		}
	}
	
	public static function changeStatus($table,$statusField,$condition){
		if($condition){
			return "update ".$table." set ".$statusField."=(case when ".$statusField."=1 then 0 when ".$statusField."=0 then 1 else ".$statusField." end)  where ".$condition;
		}
	}
	
	public static function passCheck($table,$statusField,$condition){
		if($statusField){
			return "update ".$table." set ".$statusField."=1 where ".$condition;
		}
	}
	
	public static function cancelCheck($table,$statusField,$condition){
		if($condition){
			return "update ".$table." set ".$statusField."=0 where ".$condition;
		}
	}	
}
?>