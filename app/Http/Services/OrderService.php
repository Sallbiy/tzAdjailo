<?php


namespace App\Http\Services;


use App\Models\Order;
use App\Models\OrderMessage;
use App\User;


class OrderService
{
    public function create(int $user_id, array $data)
    {

        $user = User::findOrFail($user_id);

        $data['user_id'] = $user->id;

        $order = Order::create($data);

        return $order;
    }

    public function createOrderMessage(int $order_id,int $user_id, array $data)
    {
        $order = Order::findOrFail($order_id);
        $user = User::findOrFail($user_id);

        $data['user_id'] = $user->id;

        $message = OrderMessage::make($data);
        $order->messages()->save($message);

        return $message;
    }

}
