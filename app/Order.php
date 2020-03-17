<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $user_id
 * @property string $recipient_name
 * @property string $recipient_phone
 * @property string $recipient_address
 * @property string $shipping_time
 * @property string $shipping_price
 * @property string $total_price
 * @property string $payment_status
 * @property string $shipping_status
 * @property string $created_at
 * @property string $updated_at
 */
class Order extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'recipient_name', 'recipient_phone', 'recipient_address', 'shipping_time', 'shipping_price', 'total_price', 'payment_status', 'shipping_status', 'created_at', 'updated_at'];

    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }

}
