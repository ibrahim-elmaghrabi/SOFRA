<?php

namespace App\Services\Orders\States;

use App\Events\OrderRejected;
use App\Exceptions\UnexpectedOrderStateException;

class RejectOrderService
{
    public function rejectOrder($model, $orderId, $data)
    {
        $order= $model->find($orderId);
        if($order['restaurant_id'] ==  auth()->user()->id && $order['state'] == 'pending' && $data['state'] == 'rejected')
         {
            $model->update($orderId, $data);
            event(new OrderRejected($order));
         }
         else
         {
             throw new UnexpectedOrderStateException;
         }
    }

}