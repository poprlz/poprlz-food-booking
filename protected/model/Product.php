<?php

Doo::loadModel('base/ProductBase');

class Product extends ProductBase {

    public function index_all_product() {
        Doo::logger()->info("获取所有的产品信息");

        $productInstanceList = $this->find();

        return $productInstanceList;
    }

    public function count_catalog_product($catalog_id, $status = NULL) {
        $sql_cmd="select count(1) from product_catalog a,product b where a.product_id=b.id and a.catalog_id=?";
        $params[]=$catalog_id;
        if(!$status===NULL){
            $sql_cmd=$sql_cmd."  and b.status=? ";
            $params[]=$status;
        }
        //TODO MODIFY
        $result=Doo::db()->query($query);
        
        return $result;
        
    }

    public function index_catalog_product($catalog_id, $limit, $status = NULL) {
        $sql_cmd="select distinct b.id from product_catalog a,product b where a.product_id=b.id and a.catalog_id=?";
        $params[]=$catalog_id;
        if(!$status===NULL){
            $sql_cmd=$sql_cmd."  and b.status=? ";
            $params[]=$status;
        }
        $sql_cmd=$sql_cmd.' '.$limit;
        //TODO MODIFY
        $result=Doo::db()->query($query);
        
        $products=array();
        
        foreach ($result as $product_id){
            $products[]=  $this->get_product($product_id);
        }
        
        
        return $products;
    }

    public static $_Product_Cache_Key = 'product_array_cache';

    public function get_product_cache($flash_flag = FALSE) {
        $product_array_cache = Doo::cache()->get(self::_Product_Cache_Key);
        if ($flash_flag || !(isset($product_array_cache) && is_array($product_array_cache))) {
            $productInstanceList = $this->index_all_product();
            $productInstanceMap = array();
            foreach ($productInstanceList as $product) {
                $productInstanceMap[$product->id] = $product;
            }

            Doo::cache()->set(self::_Product_Cache_Key, $productInstanceMap);
        }





        return $product_array_cache;
    }

    public function get_product($id, $cache_flag = TRUE) {
        $productInstance = NULL;
        if ($cache_flag) {
            $product_array_cache = $this->get_product_cache();

            $productInstance = $product_array_cache[$id];
            if ($product_array_cache === NULL || !isset($product_array_cache)) {
                $option = array('where' => 'id=' . $id);

                $productInstance = $this->getOne($option);

                if (isset($productInstance)) {
                    $product_array_cache[$id] = $productInstance;
                }
            }
        } else {
            $option = array('where' => 'id=' . $id);

            $catalogInstance = $this->getOne($option);
            $product_array_cache = $this->get_product_cache();

            $productInstance = $product_array_cache[$id];
            if (isset($product_array_cache) && isset($productInstance)) {

                $product_array_cache[$id] = $productInstance;
            }
        }

        return $productInstance;
    }

}