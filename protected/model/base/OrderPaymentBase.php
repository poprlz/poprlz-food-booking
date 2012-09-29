<?php
Doo::loadCore('db/DooModel');

class OrderPaymentBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $id;

    /**
     * @var bigint Max length is 20.
     */
    public $order_information_id;

    /**
     * @var char Max length is 255.
     */
    public $payment_method;

    /**
     * @var char Max length is 100.
     */
    public $merchant_id;

    /**
     * @var decimal Max length is 10. ,0).
     */
    public $tx_amount;

    /**
     * @var char Max length is 4.
     */
    public $currency;

    /**
     * @var char Max length is 10.
     */
    public $tx_type;

    /**
     * @var char Max length is 50.
     */
    public $payment_trace_number;

    /**
     * @var char Max length is 50.
     */
    public $trace_number;

    /**
     * @var char Max length is 50.
     */
    public $auth_number;

    /**
     * @var datetime
     */
    public $tx_time;

    /**
     * @var varchar Max length is 255.
     */
    public $remark;

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

    public $_table = 'order_payment';
    public $_primarykey = 'id';
    public $_fields = array('id','order_information_id','payment_method','merchant_id','tx_amount','currency','tx_type','payment_trace_number','trace_number','auth_number','tx_time','remark','status','date_created','last_updated');

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

                'payment_method' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'merchant_id' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'tx_amount' => array(
                        array( 'float' ),
                        array( 'optional' ),
                ),

                'currency' => array(
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'tx_type' => array(
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'payment_trace_number' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'trace_number' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'auth_number' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'tx_time' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'remark' => array(
                        array( 'maxlength', 255 ),
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