<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月1日-下午8:53:30
 */
namespace MoenSun\MSLaravelExtension;
use MoenSun\MSORM\MSModelStatic;
use MoenSun\MSUtil\MSDataConversion;
class MSLaravelDB{
	
	public static function beginTransaction($db=null){
		return \DB::connection($db)->beginTransaction();
	}
	
	public static function rollback($db=null){
		return \DB::connection($db)->rollback();
	}
	
	public static function commit($db=null){
		return \DB::connection($db)->commit();
	}
	
	public static function queryRow($sql,$param=array(),$usecache=false,$duration=60,$dependency=null,$db=null){
		try {
			$param=$param?$param:array();
			$result=null;
			if($usecache){
				$key=md5($sql.serialize($param)); 
				if(\Cache::has($key)){
					$result= \Cache::get($key);
				}else {
					$result= \DB::connection($db)->selectOne($sql,$param);
					\Cache::add($key, $result, $duration);
				}
			}else {
				$result= \DB::connection($db)->selectOne($sql,$param);
			}
			return MSDataConversion::stdClassToArray($result);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function queryAll($sql,$param=array(),$usecache=false,$duration=60,$dependency=null,$db=null){
		try {
			$param=$param?$param:array();
			$result=null;
			if($usecache){
				$key=md5($sql.serialize($param));
				if(\Cache::has($key)){
					$result= \Cache::get($key);
				}else {
					$result= \DB::connection($db)->select($sql,$param);
					\Cache::add($key, $result, $duration);
				}
			}else {
				$result= \DB::connection($db)->select($sql,$param);
			}

			return MSDataConversion::stdClassToArray($result);
		} catch (Exception $e) {
			throw new \Exception($e);
		}		
	}
	
	public static function insert($sql,$param=array(),$db=null){
		try {
			return \DB::connection($db)->insert($sql,$param);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function update($sql,$param=array(),$db=null){
		try {
			return \DB::connection($db)->update($sql,$param);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function delete($sql,$param=array(),$db=null){
		try {
			return \DB::connection($db)->delete($sql,$param);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	
}

?>