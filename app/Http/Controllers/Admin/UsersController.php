<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        abort_unless(Auth::user()->can('Administer Users'), '403');

        $users = User::all();

        return view('Admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        abort_unless(Auth::user()->can('Administer Users'), '403');

        $roles = Roles::get()->pluck('name', 'name');

        return view('Admin.users.create', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        abort_unless(Auth::user()->can('Administer Users'), '403');

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $roles = $request->input('roles') ? $request->input('roles') : [];
        foreach($roles as $r) {
            $role = Role::findByName($r);
            $user->assignRole($role);
        }

        return view('Admin.users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        abort_unless(Auth::user()->can('Administer Users'), '403');
        $user = User::findOrFail($id);
        return view('profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('Administer Users'), '403');
        $user = User::findOrFail($id);
        $roles = Role::get()->pluck('name', 'name');
        return view('Admin.users.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'roles' => 'required',
        ]);
        abort_unless(Auth::user()->can('Administer Users'), '403');
        $user = User::findOrFail($id);

        if($request->input('password')){
            $user->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        } else {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
        }

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('users.index')->with('success', 'User '.$user->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        abort_unless(Auth::user()->can('Administer Users'), '403');
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
