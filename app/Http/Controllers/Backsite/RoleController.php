<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
//use library
use Illuminate\Support\Facades\storage;
use Symfony\Component\HttpFoundation\Response;

//request
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;


// use everything here
use Gate;
use Auth;


//models
use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\RoleUser;
use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\PermissionRole;

// thirdparty package

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.management-access.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // store to database
        $role = Role::create($data);

        // sweetalert show
        alert()->success('Success Message', 'Successfully added new role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permission');

        // menggunakan fitur model binding, Models dijadikan sebuah parameter pada function
        return view('pages.backsite.management-access.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission = Permission::all();
        $role->load('permission');

        return view('pages.backsite.management-access.role.edit', compact('permission','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // get all request from frontsite
        $data = $request->all();

        // update to database
        $role->update($data);
        $role->permission()->sync($request->input('permission', []));

        // sweetalert show
        alert()->success('Success Message', 'Successfully updated role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->forceDelete();

        alert()->success('Success Message', 'Successfully deleted role');
        return back();
    }
}
