<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CityRepositoryContract;

class CityController extends Controller
{
     protected $citiesRepo;

    public function __construct(CityRepositoryContract $cityContract)
    {
        $this->citiesRepo = $cityContract ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities= $this->citiesRepo->all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $this->citiesRepo->create($request->validated());
        return redirect()->route('cities.index')->with('status', "Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $this->citiesRepo->find($city->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CityRequest  $request
     * @param   city $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $this->citiesRepo->update($city->id, $request->validated());
        return redirect()->route('cities.index')->with('status', "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->citiesRepo->destroy($city->id);
        return redirect()->route('cities.index')->with('status', "Deleted Successfully");

    }
}
