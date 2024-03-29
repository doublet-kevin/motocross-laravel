<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'required|string|max:255',
        ]);

        $role = Role::create([
            'role_name' => $request->role_name,
            'role_description' => $request->role_description,
        ]);

        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('role.edit', ['role' => $role]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'role_name' => $request->role_name,
            'role_description' => $request->role_description,
        ]);

        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index');
    }
}
