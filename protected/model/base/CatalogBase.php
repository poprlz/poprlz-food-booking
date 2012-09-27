<?php
Doo::loadCore('db/DooModel');

class CatalogBase extends DooModel{

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
    public $parent_id;

    /**
     * @var char Max length is 100.
     */
    public $name;

    /**
     * @var varchar Max length is 255.
     */
    public $description;

    /**
     * @var char Max length is 200.
     */
    public $img_path;

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

    public $_table = 'catalog';
    public $_primarykey = 'id';
    public $_fields = array('id','version','parent_id','name','description','img_path','status','date_created','last_updated');

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

                'parent_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'img_path' => array(
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