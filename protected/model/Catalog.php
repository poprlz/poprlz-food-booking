<?php

Doo::loadModel('base/CatalogBase');

class Catalog extends CatalogBase {

    public static $_Catalog_Cache_Key = 'catalog_array_cache';

    public function get_catalog_cache($flash_flag = FALSE) {
        $catalog_array_cache = Doo::cache()->get('catalog_array_cache');
        if ($flash_flag || !(isset($catalog_array_cache) && is_array($catalog_array_cache))) {
            $catalogInstanceList = $this->index_all_catalog();
            $catalogInstanceMap = array();
            foreach ($catalogInstanceList as $catalog) {
                $catalogInstanceList[$catalog->id] = $catalog;
            }

            Doo::cache()->set('catalog_array_cache', $catalogInstanceMap);
        }





        return $catalog_array_cache;
    }

    public function get_catalog($id, $cache_flag = TRUE) {
        $catalogInstance = NULL;
        if ($cache_flag) {
            $catalog_array_cache = $this->get_catalog_cache();

            $catalogInstance = $catalog_array_cache[$id];
            if ($catalogInstance === NULL || !isset($catalogInstance)) {
                $option = array('where' => 'id=' . $_GET['id']);

                $catalogInstance = $this->getOne($option);

                if (isset($catalogInstance)) {
                    $this->get_catalog_cache(TRUE);
                }
            }
        } else {
            $option = array('where' => 'id=' . $_GET['id']);

            $catalogInstance = $this->getOne($option);
        }

        return $catalogInstance;
    }

    public function index_all_catalog() {
        Doo::logger()->info("获取所有的目录信息");

        $catalogInstanceList = $this->find();

        return $catalogInstanceList;
    }

    public function index_children_catalog($parent_id = 0) {
        Doo::logger()->info("根据父目录ID=" . $parent_id . "获取目录信息！");


        //条件
        $opt = array('parent_id' => $parent_id);

        $catalogList = $this->find($opt);

        var_dump($catalogList);

        return $catalogList;
    }
    
    public function get_parent(){
        $parent=NULL;
        if($this->parent_id>0){
            $parent=$this->get_catalog($this->parent_id);
        }
        
        return $parent;
    }

}