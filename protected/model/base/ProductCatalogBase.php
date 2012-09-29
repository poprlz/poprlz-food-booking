<?php
Doo::loadCore('db/DooModel');

class ProductCatalogBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $catalog_id;

    /**
     * @var bigint Max length is 20.
     */
    public $product_id;

    public $_table = 'product_catalog';
    public $_primarykey = 'product_id';
    public $_fields = array('catalog_id','product_id');

    public function getVRules() {
        return array(
                'catalog_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'product_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                )
            );
    }

}