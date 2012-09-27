<?php
Doo::loadCore('db/DooModel');

class UserAccountBase extends DooModel{

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
    public $user_id;

    /**
     * @var char Max length is 20.
     */
    public $app;

    /**
     * @var varchar Max length is 100.
     */
    public $open_id;

    /**
     * @var varchar Max length is 100.
     */
    public $auth_token;

    /**
     * @var varchar Max length is 100.
     */
    public $email;

    /**
     * @var varchar Max length is 100.
     */
    public $password;

    /**
     * @var varchar Max length is 100.
     */
    public $nick_name;

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

    public $_table = 'user_account';
    public $_primarykey = 'id';
    public $_fields = array('id','version','user_id','app','open_id','auth_token','email','password','nick_name','status','date_created','last_updated');

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

                'user_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'app' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'open_id' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'auth_token' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'email' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'password' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'nick_name' => array(
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