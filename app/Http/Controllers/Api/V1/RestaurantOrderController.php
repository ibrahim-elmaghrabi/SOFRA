<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\Orders\States\AcceptOrderService;
use App\Services\Orders\States\RejectOrderService;
use App\Services\Orders\States\DeliverOrderService;
use App\Repositories\Contracts\OrderRepositoryContract;

class RestaurantOrderController extends Controller
{
      protected $ordersRepo;

      protected $acceptOrderService;

      protected $deliverOrderService;

      protected $rejectOrderService;

      public function __construct(OrderRepositoryContract $orderContract,
                                 AcceptOrderService  $acceptOrderService,
                                 DeliverOrderService $deliverOrderService,
                                 RejectOrderService  $rejectOrderService,
                                 )
      {
         $this->ordersRepo= $orderContract;
         $this->acceptOrderService = $acceptOrderService;
         $this->deliverOrderService= $deliverOrderService;
         $this->rejectOrderService = $rejectOrderService;
      }

      public function index(Request $request)
      {
         return httpResponse(1, "Success", OrderResource::collection($this->ordersRepo->allOrders('restaurant_id', $request, 'state')));
      }

      public function show(Order $order)
      {
         return httpResponse(1, "Success", new OrderResource($this->ordersRepo->findWhere('restaurant_id', auth()->user()->id)->find($order->id)));
      }
   
      public function acceptOrder(OrderRequest $request)
      {
         $this->acceptOrderService->acceptOrder($this->ordersRepo ,$request['order_id'], $request->validated());
         return httpResponse(1, "Success");
      }

      public function deliverOrder(OrderRequest $request)
      {
         $this->deliverOrderService->deliverOrder($this->ordersRepo ,$request['order_id'], $request->validated());
         return httpResponse(1, "Success");
      }

      public function rejectOrder(OrderRequest $request)
      {
         $this->rejectOrderService->rejectOrder($this->ordersRepo ,$request['order_id'], $request->validated());
         return httpResponse(1, "Success");
      }
      

   
}
