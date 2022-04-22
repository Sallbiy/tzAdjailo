<?php


namespace App\Http\Services;


use App\Models\Order;

class UpdateStatusService
{
    public function close(int $order_id)
    {
        $order = Order::findOrFail($order_id);

        if($order->isClosed()) {
            throw new \Exception('Заказ уже закрыт');
        }

//        if($order->isApproved())
//        {
//            throw new \Exception('Заказ уже подтвержден модератором, его нельзя закрыть');
//        }

        $order->update(['status' => Order::STATUS_CLOSED]);

        return $order;
    }

    public function approved(int $order_id)
    {
        $order = Order::findOrFail($order_id);

        if($order->isApproved()) {
            throw new \Exception('Заказ уже утвержден');
        }

        $order->update(['status' => Order::STATUS_APPROVED]);

        return $order;
    }

    public function is_Read(int $order_id)
    {
        $order = Order::findOrFail($order_id);

        $order->update(['is_read' => Order::IS_READ_TRUE]);

        return $order;
    }
    public function has_answer(int $order_id)
    {
        $order = Order::findOrFail($order_id);

        $order->update(['has_answer' => Order::ANSWER_TRUE]);

        return $order;
    }
}
