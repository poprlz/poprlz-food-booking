<?php
Doo::loadCore('db/DooModel');

class ProductOptionBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $id;

    /**
     * @var bigint Max length is 20.
     */
    public $version;

    /**
     * @var bigint Max length is 20.
     */
    public $product_id;

    /**
     * @var char Max length is 20.
     */
    public $option_code;

    /**
     * @var char Max length is 200.
     */
    public $name;

    /**
     * @var tinytext
     */
    public $value;

    /**
     * @var decimal Max length is 10. ,0).
     */
    public $price;

    /**
     * @var char Max length is 10.
     */
    public $status;

    /**
     * @var datetime
     */
    public $date_created;

    /**
     * @var datetime
     */
    public $last_updated;

    public $_table = 'product_option';
    public $_primarykey = 'id';
    public $_fields = array('id','version','product_id','option_code','name','value','price','status','date_created','last_updated');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'version' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'product_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'option_code' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'name' => array(
                        array( 'maxlength', 200 ),
                        array( 'notnull' ),
                ),

                'value' => array(
                        array( 'notnull' ),
                ),

                'price' => array(
                        array( 'float' ),
                        array( 'notnull' ),
                ),

                'status' => array(
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'date_created' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'last_updated' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                )
            );
    }

}