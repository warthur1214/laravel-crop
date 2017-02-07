<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年3月12日-下午6:38:14
 */
namespace MoenSun\MSYII2Extension;
class MSYII2DB{
	/**
	 * Begin the transcation.
	 * @param string $db
	 */
	public static function beginTransaction($db='db'){
		return \Yii::$app->$db->beginTransaction();
	}
	/**
	 * Rollback the transcation.
	 * @param string $db
	 */
	public static function rollback($db='db'){
		return \Yii::$app->$db->getTransaction()->rollBack();
	}
	/**
	 * Commit the transcation.
	 * @param string $db
	 */
	public static function commit($db='db'){
		return \Yii::$app->$db->getTransaction()->commit();
	}
	/**
	 * Query from database and return one row.
	 * @param unknown $sql sql 
	 * @param string $param 
	 * @param string $usecache 
	 * @param string $duration
	 * @param string $dependency
	 * @param string $db
	 */	
	public static function queryRow($sql,$param=null,$usecache=false,$duration=60,$dependency=null,$db='db'){		
		if($usecache){
			return \Yii::$app->$db->createCommand($sql,$param)->cache($duration,$dependency)->queryOne();
		}else{
			return \Yii::$app->$db->createCommand($sql,$param)->noCache()->queryOne();
		}
	}
	/**
	 * Query from database and return all rows.
	 * @param unknown $sql
	 * @param string $param
	 * @param string $usecache
	 * @param string $duration
	 * @param string $dependency
	 * @param string $db
	 */
	public static function queryAll($sql,$param=null,$usecache=false,$duration=60,$dependency=null,$db='db'){
		if($usecache){
			return \Yii::$app->$db->createCommand($sql,$param)->cache($duration,$dependency)->queryAll();
		}else{
			return \Yii::$app->$db->createCommand($sql,$param)->noCache()->queryAll();
		}
	}
	/**
	 * Execute a sql .
	 * @param unknown $sql
	 * @param string $param
	 * @param string $db
	 * @return number
	 */
	public static function execute($sql,$param=null,$db='db'){
		return \Yii::$app->$db->createCommand($sql,$param)->execute();
	}

}
?>