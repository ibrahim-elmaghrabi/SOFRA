<?php

namespace App\Services\Orders\States;

use App\Models\Order;
use App\Events\OrderAccepted;
use App\Exceptions\UnexpectedOrderStateException;

class AcceptOrderService
{
     public function acceptOrder($model, $orderId, $data)
    {
        $order= $model->find($orderId);
        if($order['restaurant_id'] ==  auth()->user()->id && $order['state'] == 'pending' && $data['state'] == 'accepted')
         {
            $model->update($orderId, $data);
            event(new OrderAccepted($order));
         }else {
            throw new UnexpectedOrderStateException;
         }
          
    }

}