<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Repositories\Contracts\RoleRepositoryContract;
use App\Repositories\Contracts\PermissionRepositoryContract;

class RoleController extends Controller
{

    protected $rolesRepo;

    protected $permissionsRepo;

    public function __construct(RoleRepositoryContract $roleContract,
                                PermissionRepositoryContract $permissionContract,
    
    )
    {
        $this->rolesRepo = $roleContract;
        $this->permissionsRepo = $permissionContract;
         /* $this->middleware('permission:role-list' , ['only' => ['index']] );
         $this->middleware('permission:role-create' , ['only' => ['create' , 'store']] );
         $this->middleware('permission:role-edit' , ['only' => ['edit' , 'update']] );
         $this->middleware('permission:role-delete' , ['only' => ['destroy']] ); */
        
    }
     public function index()
    {
        $roles = $this->rolesRepo->all();
        return view('admin.roles.index', compact('roles'));
    }

    
    public function create()
    {
        $permissions = $this->permissionsRepo->all();
        return view('admin.roles.create', compact('permissions'));
    }

     
    public function store(RoleRequest $request)
    {
        $role = $this->rolesRepo->create($request->validated());
        $role->permissions()->attach($request['permission_list']);
        return redirect()->route('roles.index')->with('status', 'Role Added Successfully');
    }

    
    public function edit(Role $role)
    {
        $permissions = $this->permissionsRepo->all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

  
    public function update(RoleRequest $request, Role $role)
    {
        $this->rolesRepo->update($role->id, $request->validated());
        $role->permissions()->sync($request['permission_list']);
        return redirect()->route('roles.index')->with('status', 'Role Updated Successfully');

    }

    
    public function destroy(Role $role)
    {
        $this->rolesRepo->destroy($role->id);
        return redirect()->route('roles.index')->with('status', 'Role Deleted Successfully');

    }
}
