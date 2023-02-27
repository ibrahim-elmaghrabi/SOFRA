<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordRequest;
use App\Repositories\Contracts\UserRepositoryContract;

class UserPasswordController extends Controller
{
    protected $usersRepo;

    public function __construct(UserRepositoryContract $userContract)
    {
        $this->usersRepo = $userContract ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.passwords.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserPasswordRequest $request, $id)
    {
        if(! Hash::check($request['current_password'], auth()->user()->password)){
            return back()->with('status', 'Current password not correct');
        }else
        {
        $request['password'] = bcrypt($request['password']);
        $update = $this->usersRepo->update(auth()->user()->id,['password' => $request['password']]);
        if($update){
            return back()->with('status', 'Password Updated Successfully');
        }
        else
        {
            return back()->with('status', 'Error Happen please try Again');
        }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
