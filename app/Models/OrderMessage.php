<?php

namespace App\Models;

use App\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property text $text
 **/


class OrderMessage extends Model
{

    protected $fillable =
        [
            'order_id',
            'user_id',
            'text',
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
