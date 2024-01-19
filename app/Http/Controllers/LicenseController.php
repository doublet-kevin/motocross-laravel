<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::all();
        return view('admin.license.index', ['licenses' => $licenses]);
    }

    public function create()
    {
        return view('license.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_number' => 'required|string|max:255',
        ]);

        $license = License::create([
            'license_number' => $request->license_number,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('license.index');
    }

    public function edit($id)
    {
        $license = License::findOrFail($id);
        return view('license.edit', ['license' => $license]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'license_number' => 'required|string|max:255',
        ]);

        $license = License::findOrFail($id);
        $license->update([
            'license_number' => $request->license_number,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('license.index');
    }

    public function destroy($id)
    {
        $license = License::findOrFail($id);
        $license->delete();

        return redirect()->route('license.index');
    }
}
