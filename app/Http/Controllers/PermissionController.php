<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission;
        $permission->fill($request->all());
        $permission->save();

        return redirect()->route('admin.permissions.index')->with('success', 'permission created successfully');
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
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->fill($request->all());
        $permission->save();
        return redirect()->route('admin.permissions.index')->with('success', 'Action completed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully');
    }

    public function deletePermission($id, $permission)
    {
        $permission_to_delete = DB::table('model_has_permissions')->where('model_id', $id)->where('permission_id', $permission)->delete();
        return redirect()->back()
            ->with('success', 'Permesso dissociato con successo');
    }

    public function deleteAllPermissions($id){
        $user = User::find($id)->permissions()->detach();
        return back()->with('success', 'all Permissions removed');

    }

    public function assignpermission(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $user->givePermissionTo($value);
        }
        return redirect()->back()
            ->with('success', 'Permessi utente aggiornati con successo');
    }

}
