<?php
Doo::loadCore('db/DooModel');

class OrderItemBase extends DooModel{

    /**
     * @var bigint Max length is 20.
     */
    public $id;

    /**
     * @var bigint Max length is 20.
     */
    public $order_information_id;

    /**
     * @var char Max length is 5.
     */
    public $currency;

    /**
     * @var decimal Max length is 10. ,0).
     */
    public $unit_price;

    /**
     * @var int Max length is 11.
     */
    public $quantity;

    /**
     * @var decimal Max length is 10. ,0).
     */
    public $final_amount;

    /**
     * @var char Max length is 20.
     */
    public $item_type;

    /**
     * @var bigint Max length is 20.
     */
    public $item_type_union_id;

    /**
     * @var varchar Max length is 255.
     */
    public $description;

    /**
     * @var char Max length is 20.
     */
    public $business_status;

    /**
     * @var datetime
     */
    public $date_created;

    /**
     * @var datetime
     */
    public $last_updated;

    public $_table = 'order_item';
    public $_primarykey = 'id';
    public $_fields = array('id','order_information_id','currency','unit_price','quantity','final_amount','item_type','item_type_union_id','description','business_status','date_created','last_updated');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'order_information_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'currency' => array(
                        array( 'maxlength', 5 ),
                        array( 'notnull' ),
                ),

                'unit_price' => array(
                        array( 'float' ),
                        array( 'notnull' ),
                ),

                'quantity' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'final_amount' => array(
                        array( 'float' ),
                        array( 'notnull' ),
                ),

                'item_type' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'item_type_union_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'business_status' => array(
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
                )
            );
    }

}