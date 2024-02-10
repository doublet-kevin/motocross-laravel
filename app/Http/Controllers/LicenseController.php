<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;
use Illuminate\Validation\Rule;

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
        $request->validate(
            [
                'license_number' => 'required|unique:licenses|string|max:255',
                'associate_email' => 'required|unique:licenses|email',
            ],
            [
                'license_number.required' => 'Le numéro de licence est obligatoire',
                'license_number.unique' => 'Ce numéro de licence est déjà utilisé',
                'associate_email.required' => 'L\'email est obligatoire',
                'associate_email.unique' => 'Cet email est déjà associé à une licence',
                'associate_email.email' => 'L\'email doit être une adresse valide',
            ]
        );

        License::create([
            'license_number' => $request->license_number,
            'associate_email' => $request->associate_email,
        ]);

        return redirect()->route('license.board')->with('message', 'La licence a bien été créée');
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
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('license.index');
    }

    public function destroy($id)
    {
        $license = License::findOrFail($id);
        $license->delete();

        return back()->with('message', 'License supprimé et utilisateur mis à jour');
    }

    public function board()
    {
        $licenses = License::all();
        return view('license.admin-board', ['licenses' => $licenses]);
    }
}
