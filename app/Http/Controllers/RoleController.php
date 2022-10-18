<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        // $this->authorize('super-admin');
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = new role;
        $role->fill($request->all());
        $role->syncPermissions($request->permissions, []);
        $role->save();

        return redirect()->route('admin.roles.index')->with('success', 'role created successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->fill($request->all());
        $role->syncPermissions($request->permissions, []);
        $role->save();
        return redirect()->route('admin.roles.index')->with('success', 'Action completed');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
    }

    public function deleteRole($id, $role)
    {
        $role_to_delete = DB::table('model_has_roles')->where('model_id', $id)->where('role_id', $role)->delete();
        return redirect()->back()
            ->with('success', 'Ruolo dissociato con successo');
    }

    public function deleteAllRoles($id){
        $user = User::find($id)->roles()->detach();
        return back()->with('success', 'all roles removed');

    }

    // public function assignRole(Request $request, $id)
    // {
    //     $user = User::find($id);
    //     $data = $request->except('_token');

    //     foreach ($data as $key => $value) {
    //         $user->assignRole($value);
    //     }
    //     return redirect()->back()
    //         ->with('success', 'Ruoli utente aggiornati con successo');
    // }
}
