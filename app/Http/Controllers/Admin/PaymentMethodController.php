<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentMethodRequest;
use App\Repositories\Contracts\PaymentMethodRepositoryContract;

class PaymentMethodController extends Controller
{
    protected $paymentMethodsRepo;

    public function __construct(PaymentMethodRepositoryContract $paymentMethodContract)
    {
        $this->paymentMethodsRepo = $paymentMethodContract;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = $this->paymentMethodsRepo->all();
        return view('admin.paymentMethods.index',compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paymentMethods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PaymentMethodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentMethodRequest $request)
    {
        $this->paymentMethodsRepo->create($request->validated());
        return redirect()->route('payment-methods.index')->with('status', 'Created Successfully');
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
     * @param  \App\Models\PaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.paymentMethods.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PaymentMethodRequest  $request
     * @param  \App\Models\PaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentMethodRequest  $request, PaymentMethod $paymentMethod)
    {
        $this->paymentMethodsRepo->update($paymentMethod->id, $request->validated());
        return redirect()->route('payment-methods.index')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $this->paymentMethodsRepo->destroy($paymentMethod->id);
        return redirect()->route('payment-methods.index')->with('status', 'Deleted Successfully');
    }
}
