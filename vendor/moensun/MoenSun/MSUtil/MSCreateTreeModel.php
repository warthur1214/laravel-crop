<?php 
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月25日-下午5:02:02
 */
namespace MoenSun\MSUtil;
class MSCreateTreeModel{
	public  static $ID;
	public  static $PID;
	
	public static function CreatTree($array,$pidVal,$idField,$pidField)
	{
		$newArray=array();
		if(count($array)>0){
			foreach ($array as $arr)
			{
				if($arr[$pidField]==$pidVal)
				{
					$children=self::CreatTree($array, $arr[$idField],$idField,$pidField);
					if(!empty($children))
					{
			
						$arr['expanded']=true;
						$arr['iconCls']="task-folder";
						$arr['children']=$children;
			
					}
					else
					{
						$arr['iconCls']="file";
						$arr['leaf']="true";
					}
			
					$newArray[]=$arr;
				}
			}
		}
		return  $newArray;
	}
	
	public static function createTreeStruct($array,$pidVal,$idField,$pidField){
		$newArray=array();
		if(count($array)>0){
			foreach ($array as $arr)
			{
				if($arr[$pidField]==$pidVal)
				{
					$children=self::createTreeStruct($array, $arr[$idField],$idField,$pidField);
					if(!empty($children))
					{
						$arr['children']=$children;
					}
					$newArray[]=$arr;
				}
			}
		}
		return  $newArray;
	}
}