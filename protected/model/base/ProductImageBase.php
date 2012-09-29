<?php
Doo::loadCore('db/DooModel');

class ProductImageBase extends DooModel{

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
     * @var char Max length is 200.
     */
    public $img_path;

    /**
     * @var char Max length is 200.
     */
    public $alt;

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

    public $_table = 'product_image';
    public $_primarykey = 'id';
    public $_fields = array('id','version','product_id','img_path','alt','status','date_created','last_updated');

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

                'img_path' => array(
                        array( 'maxlength', 200 ),
                        array( 'notnull' ),
                ),

                'alt' => array(
                        array( 'maxlength', 200 ),
                        array( 'optional' ),
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