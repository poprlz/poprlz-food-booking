<?php
Doo::loadCore('db/DooModel');

class UserBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $id;

    /**
     * @var bigint Max length is 20.
     */
    public $version;

    /**
     * @var varchar Max length is 50.
     */
    public $full_name;

    /**
     * @var datetime
     */
    public $birthday;

    /**
     * @var int Max length is 1.
     */
    public $gender;

    /**
     * @var varchar Max length is 100.
     */
    public $strict_password;

    /**
     * @var varchar Max length is 100.
     */
    public $token;

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

    public $_table = 'user';
    public $_primarykey = 'id';
    public $_fields = array('id','version','full_name','birthday','gender','strict_password','token','status','date_created','last_updated');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'version' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'full_name' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'birthday' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'gender' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'optional' ),
                ),

                'strict_password' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'token' => array(
                        array( 'maxlength', 100 ),
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