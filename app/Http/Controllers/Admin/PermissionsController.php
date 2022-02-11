<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permissions;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        abort_unless(Auth::user()->can('Administer Permissions'), '403');
        $permissions = Permissions::all(); //Get all permissions

        return view('Admin.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        abort_unless(Auth::user()->can('Administer Permissions'), '403');
        $roles = Role::get()->pluck('name', 'name');
        return view('Admin.permissions.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|max:40',
        ]);
        abort_unless(Auth::user()->can('Administer Permissions'), '403');

        $permission = Permissions::create($request->except('roles'));
        $roles = $request->input('roles') ? $request->input('roles') : [];

        foreach($roles as $r) {
            $role = Role::findByName($r);
            $role->givePermissionTo($permission);
        }

        return redirect()->route('permissions.index')->with('success', 'Permission '. $permission->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return Response
     */
    public function show(Permissions $permissions)
    {
        abort_unless(Auth::user()->can('Administer Permissions'), '403');
        return redirect('permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return Response
     */
    public function edit( $id)
    {
        abort_unless(Auth::user()->can('Administer Permissions'), '403');
        $permission = Permission::findOrFail($id);

        return view('Admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        abort_unless(Auth::user()->can('Administer Permissions'), '403');
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'string|required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permissions.index')->with('success', 'Permission'. $permission->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        abort_unless(Auth::user()->can('Administer Permissions'), '403');
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission
        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('permissions.index')->with('error', 'Cannot delete this Permission!');
        }

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted!');
    }
}
