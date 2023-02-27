<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AreaRepositoryContract;
use App\Repositories\Contracts\CityRepositoryContract;

class AreaController extends Controller
{
    protected $areasRepo ;

    protected $cityRepo ;

    public function __construct(AreaRepositoryContract $areaContract,
                                CityRepositoryContract $cityContract
                                )
    {
        $this->areasRepo = $areaContract ;
        $this->cityRepo = $cityContract ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = $this->areasRepo->all();
        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select = $this->cityRepo->pluck('name', 'id');
        return view('admin.areas.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $this->areasRepo->create($request->validated());
        return redirect()->route('areas.index')->with('status', 'Created Successfully');
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
     * @param  \App\Models\Area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $select = $this->cityRepo->pluck('name', 'id');
        return view('admin.areas.edit', compact('area', 'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AreaRequest  $request
     * @param  \App\Models\Area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $area)
    {
        $this->areasRepo->update($area->id, $request->validated());
        return redirect()->route('areas.index')->with('status', "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $this->areasRepo->destroy($area->id);
        return redirect()->route('areas.index')->with('Deleted Successfully');
    }
}
