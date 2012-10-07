<?php
Doo::loadModel('base/CatalogBase');

class Catalog extends CatalogBase{
    
    public function index_all_catalog(){
        Doo::logger()->info("获取所有的目录信息");
        
        $catalogInstanceList=  $this->find();
        
        return $catalogInstanceList;
        
        
    }
    
    
    public function index_children_catalog($parent_id=0){
        Doo::logger()->info("根据父目录ID=".$parent_id."获取目录信息！");
       
        
        //条件
        $opt=array('parent_id'=>$parent_id);
        
        $catalogList=$this->find($opt);
        
        var_dump($catalogList);
        
        return $catalogList;
        
        
    }
}