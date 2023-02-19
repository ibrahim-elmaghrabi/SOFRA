<?php

namespace App\Services\Orders\States;

use App\Events\OrderDeclined;
use App\Exceptions\OrderNotFoundException;
use App\Exceptions\CanNotDeclineOrderException;
use App\Exceptions\UnexpectedOrderStateException;

class DeclineOrderService
{
      public function declineOrder($model, $orderId, $data)
    {
         $order= $model->find($orderId);
        if($order['client_id'] ==  auth()->user()->id && $data['state'] == 'declined')
         {
            if($order['state'] == 'delivered' || $order['state'] == 'accepted')
            {
                $model->update($orderId, $data);
                event(new OrderDeclined($order));
            }
            elseif ($order['state'] == 'pending')
            {
                $model->destroy($orderId);
            }else{
                throw new UnexpectedOrderStateException;
            }
        }else{
            throw new CanNotDeclineOrderException;
        }
    }
}