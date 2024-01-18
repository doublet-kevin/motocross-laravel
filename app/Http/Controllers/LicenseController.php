<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::all();
        return view('license.index', ['licenses' => $licenses]);
    }

    public function create()
    {
        return view('license.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_number' => 'required|string|max:255',
            'license_type' => 'required|string|max:255',
            'license_class' => 'required|string|max:255',
            'license_expiration' => 'required|string|max:255',
            'license_status' => 'required|string|max:255',
            'license_renewal' => 'required|string|max:255',
            'license_renewal_date'
        ]);

        $license = License::create([
            'license_number' => $request->license_number,
            'license_type' => $request->license_type,
            'license_class' => $request->license_class,
            'license_expiration' => $request->license_expiration,
            'license_status' => $request->license_status,
            'license_renewal' => $request->license_renewal,
            'license_renewal_date' => $request->license_renewal_date
        ]);
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
            'license_type' => 'required|string|max:255',
            'license_class' => 'required|string|max:255',
            'license_expiration' => 'required|string|max:255',
            'license_status' => 'required|string|max:255',
            'license_renewal' => 'required|string|max:255',
            'license_renewal_date'
        ]);

        $license = License::findOrFail($id);
        $license->update([
            'license_number' => $request->license_number,
            'license_type' => $request->license_type,
            'license_class' => $request->license_class,
            'license_expiration' => $request->license_expiration,
            'license_status' => $request->license_status,
            'license_renewal' => $request->license_renewal,
            'license_renewal_date' => $request->license_renewal_date
        ]);
    }

    public function destroy($id)
    {
        $license = License::findOrFail($id);
        $license->delete();
    }
}
