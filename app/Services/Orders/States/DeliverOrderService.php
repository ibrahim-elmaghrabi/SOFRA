<?php

namespace App\Services\Orders\States;

use App\Events\OrderDelivered;
use App\Exceptions\UnexpectedOrderStateException;

class DeliverOrderService
{
     public function deliverOrder($model, $orderId, $data)
    {
        $order= $model->find($orderId);
        if($order['restaurant_id'] ==  auth()->user()->id && $order['state'] == 'accepted' && $data['state'] == 'delivered')
         {
            $model->update($orderId, $data);
            event(new OrderDelivered($order));
         }
         else
         {

             throw new UnexpectedOrderStateException;
         }
    }

}