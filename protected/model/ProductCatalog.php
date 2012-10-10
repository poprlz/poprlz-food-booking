<?php

Doo::loadModel('base/ProductCatalogBase');

class ProductCatalog extends ProductCatalogBase {
     

    public static function _saveAllProductCatalog($product_id, $catalog_id_arrays = array()) {

        $productCatalog = new ProductCatalog();
        $options['where'] = 'product_id=' . $product_id;
        $productCatalog->delete($options);
        $productCatalog->product_id = $product_id;
        foreach ($catalog_id_arrays as $catalog_id) {
            $productCatalog->catalog_id = $catalog_id;
            $productCatalog->insert();
        }

        return TRUE;
    }

    
 

}