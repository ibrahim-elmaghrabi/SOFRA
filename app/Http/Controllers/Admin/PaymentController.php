<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Repositories\Contracts\PaymentRepositoryContract;
use App\Repositories\Contracts\RestaurantRepositoryContract;

class PaymentController extends Controller
{
    protected $paymentsRepo;

    protected $restaurantsRepo;

    public function __construct(PaymentRepositoryContract $paymentContract,
                                RestaurantRepositoryContract $restaurantContract
    )
    {
        $this->restaurantsRepo = $restaurantContract;
        $this->paymentsRepo = $paymentContract;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments= $this->paymentsRepo->all();
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select = $this->restaurantsRepo->pluck('name', 'id');
        return view('admin.payments.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $this->paymentsRepo->create($request->validated());
        return redirect()->route('payments.index')->with('status', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $select = $this->restaurantsRepo->pluck('name', 'id');
        return view('admin.payments.edit', compact('payment', 'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PaymentRequest  $request
     * @param  \App\Models\Payment
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        $this->paymentsRepo->update($payment->id, $request->validated());
        return redirect()->route('payments.index')->with('status', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $this->paymentsRepo->destroy($payment->id);
        return redirect()->route('payments.index')->with('status', 'Deleted Successfully');
    }
}
