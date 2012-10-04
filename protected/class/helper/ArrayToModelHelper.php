<?php
class ArrayToModelHelper
{
	
 
	public function array_to_model($classInstance,$paramArray){

		$class_name=get_class($classInstance);
		Doo::logger()->info('class_name='.$class_name);
		$reflectionClass = new ReflectionClass($class_name);

		foreach ($paramArray as $key => $value) {
			 if($reflectionClass->hasProperty($key)){
			 	$reflectionProperty = $reflectionClass->getProperty($key);
			 	$reflectionProperty->setValue($classInstance, $value);
			 }
		}

		//var_dump($classInstance);
		return $classInstance;
	}


/**
	public function model_to_array($classInstance){

		$class_name=get_class($classInstance);
		Doo::logger()->info('class_name='.$class_name);
		$reflectionClass = new ReflectionClass($class_name);

		$props = $reflectionClass->getProperties(); 
    	$props_arr = array(); 
    	foreach($props as $prop){ 
        	$f = $prop->getName(); 
        
        	if($prop->isPublic() and (stripos($types, 'public') === FALSE)) continue; 
        	if($prop->isPrivate() and (stripos($types, 'private') === FALSE)) continue; 
        	if($prop->isProtected() and (stripos($types, 'protected') === FALSE)) continue; 
        	if($prop->isStatic() and (stripos($types, 'static') === FALSE)) continue; 
        
        	$props_arr[$f] = $prop; 
    	} 
    	if($parentClass = $reflectionClass->getParentClass()){ 
        	$parent_props_arr = getClassProperties($parentClass->getName());//RECURSION 
        	if(count($parent_props_arr) > 0) 
           	 $props_arr = array_merge($parent_props_arr, $props_arr); 
    	} 
    	return $props_arr;

		 
	}
**/
	 
}
?>