<?php
Doo::loadCore('db/DooModel');

class OrderInformationBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $id;

    /**
     * @var char Max length is 100.
     */
    public $biz_number;

    /**
     * @var decimal Max length is 10. ,0).
     */
    public $total_amount;

    /**
     * @var char Max length is 5.
     */
    public $currency;

    /**
     * @var char Max length is 20.
     */
    public $status;

    /**
     * @var char Max length is 20.
     */
    public $shipping_status;

    /**
     * @var char Max length is 20.
     */
    public $payment_status;

    /**
     * @var char Max length is 20.
     */
    public $order_mode;

    /**
     * @var datetime
     */
    public $date_created;

    /**
     * @var datetime
     */
    public $last_updated;

    /**
     * @var bigint Max length is 20.
     */
    public $order_operator_id;

    /**
     * @var bigint Max length is 20.
     */
    public $booking_user_id;

    /**
     * @var varchar Max length is 50.
     */
    public $booking_user_name;

    public $_table = 'order_information';
    public $_primarykey = 'id';
    public $_fields = array('id','biz_number','total_amount','currency','status','shipping_status','payment_status','order_mode','date_created','last_updated','order_operator_id','booking_user_id','booking_user_name');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'biz_number' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'total_amount' => array(
                        array( 'float' ),
                        array( 'notnull' ),
                ),

                'currency' => array(
                        array( 'maxlength', 5 ),
                        array( 'notnull' ),
                ),

                'status' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'shipping_status' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'payment_status' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'order_mode' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'date_created' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'last_updated' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'order_operator_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'optional' ),
                ),

                'booking_user_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'booking_user_name' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                )
            );
    }

}