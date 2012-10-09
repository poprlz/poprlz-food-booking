<?php
Doo::loadModel('base/ProductBase');

class Product extends ProductBase{
    
      
            
    public function index_all_product(){
        Doo::logger()->info("获取所有的产品信息");
        
        $productInstanceList=  $this->find();
        
        return $productInstanceList;
        
        
    }
}