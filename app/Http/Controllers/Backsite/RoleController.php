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
        $role = Role::orderBy('title', 'asc')->get();

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
        return view('pages.backsite.management-access.role.edit', compact('role'));
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
        $role->forceDelete();

        alert()->success('Success Message', 'Successfully deleted role');
        return back();
    }
}
