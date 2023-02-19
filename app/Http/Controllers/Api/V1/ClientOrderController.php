<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\Orders\OrderStateService;
use App\Services\Orders\OrderCreationService;
use App\Services\Orders\States\DeclineOrderService;
use App\Repositories\Contracts\OrderRepositoryContract;

class ClientOrderController extends Controller
{
    protected $ordersRepo;

    protected $createService;

    protected $declineOrderService;

   public function __construct(OrderRepositoryContract $orderContract,
                              OrderCreationService $orderCreationService,
                              DeclineOrderService  $declineOrderService,
                              )
   {
      $this->ordersRepo = $orderContract;
      $this->createService = $orderCreationService;
      $this->declineOrderService = $declineOrderService;
   }

   public function index(Request $request)
   {
      return httpResponse(1, "Success", OrderResource::collection($this->ordersRepo->allOrders('client_id', $request, 'state')));
   }

   public function store(OrderRequest $request)
   {
       $this->createService->createOrder($request->validated());
      return httpResponse(1, "Order created Successfully",);
   }
   
   public function show(Order $order)
   {
      return httpResponse(1, "Success", new OrderResource($this->ordersRepo->findWhere('client_id', auth()->user()->id)->find($order->id)));
   }

   public function update(OrderRequest $request)
   {
      $this->declineOrderService->declineOrder($this->ordersRepo, $request['order_id'], $request->validated());
      return httpResponse(1, "Success");
   }
 
}
