<?php
Doo::loadCore('db/DooModel');

class ProductBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $id;

    /**
     * @var bigint Max length is 20.
     */
    public $version;

    /**
     * @var varchar Max length is 200.
     */
    public $title;

    /**
     * @var char Max length is 200.
     */
    public $img_path;

    /**
     * @var longtext
     */
    public $description;

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

    public $_table = 'product';
    public $_primarykey = 'id';
    public $_fields = array('id','version','title','img_path','description','price','status','date_created','last_updated');

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

                'title' => array(
                        array( 'maxlength', 200 ),
                        array( 'notnull' ),
                ),

                'img_path' => array(
                        array( 'maxlength', 200 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'optional' ),
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