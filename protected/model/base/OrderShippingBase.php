<?php
Doo::loadCore('db/DooModel');

class OrderShippingBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $id;

    /**
     * @var bigint Max length is 20.
     */
    public $order_information_id;

    /**
     * @var varchar Max length is 20.
     */
    public $province;

    /**
     * @var varchar Max length is 20.
     */
    public $city;

    /**
     * @var varchar Max length is 255.
     */
    public $address;

    /**
     * @var char Max length is 15.
     */
    public $postcode;

    /**
     * @var char Max length is 50.
     */
    public $email;

    /**
     * @var char Max length is 20.
     */
    public $mobile;

    /**
     * @var char Max length is 20.
     */
    public $phone;

    /**
     * @var char Max length is 100.
     */
    public $contact_name;

    /**
     * @var char Max length is 20.
     */
    public $shipping_mode;

    /**
     * @var char Max length is 50.
     */
    public $trace_number;

    /**
     * @var decimal Max length is 10. ,0).
     */
    public $shipping_fee;

    /**
     * @var char Max length is 4.
     */
    public $currency;

    /**
     * @var varchar Max length is 100.
     */
    public $shipping_server;

    /**
     * @var char Max length is 20.
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

    public $_table = 'order_shipping';
    public $_primarykey = 'id';
    public $_fields = array('id','order_information_id','province','city','address','postcode','email','mobile','phone','contact_name','shipping_mode','trace_number','shipping_fee','currency','shipping_server','status','date_created','last_updated');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'order_information_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'province' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'city' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'address' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'postcode' => array(
                        array( 'maxlength', 15 ),
                        array( 'optional' ),
                ),

                'email' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'mobile' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'phone' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'contact_name' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'shipping_mode' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'trace_number' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'shipping_fee' => array(
                        array( 'float' ),
                        array( 'optional' ),
                ),

                'currency' => array(
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'shipping_server' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'status' => array(
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
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