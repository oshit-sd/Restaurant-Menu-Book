<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\RolePermission;

use Illuminate\Http\Request;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class RoleController extends Controller
{
    protected $guard_name = 'admin';

    public function __construct()
    {
        $this->middleware(['auth:admin', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        where('name', '!=', 'Super Admin')->get();
        $roles = Role::all(); //Get all roles

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all(); //Get all permissions

        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate name and permissions field
        $this->validate(
            $request,
            [
                'name' => 'required|unique:roles|max:15',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;
        $role->save();

        return redirect()->route('roles.index')
            ->with(
                'success',
                'Role ' . $role->name . ' Added!'
            );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $title = "Assign Permissions";
        $role = Role::findOrFail($id);
        $permissions = Permission::where('name', '!=', 'All Access')->get();

        return view('roles.edit', compact('role', 'permissions', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = Role::findOrFail($id); //Get role with the given id
        //Validate name and permission fields
        $this->validate($request, [
            'name' => 'required|max:15|unique:roles,name,' . $id,
            'permissions' => 'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();

        $p_all = Permission::all(); //Get all permissions

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p); //Remove all permissions associated with role
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
            $role->givePermissionTo($p);  //Assign permission to role
        }

        return redirect()->route('roles.index')
            ->with(
                'success',
                $role->name . ' Role Updated!'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with(
                'success',
                'Role Deleted!'
            );
    }
}
