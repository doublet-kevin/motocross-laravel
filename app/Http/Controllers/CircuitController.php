<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circuit;
use App\Models\Club;


class CircuitController extends Controller
{
    public function index()
    {
        $circuits = Circuit::all();
        return view('circuit.index', ['circuits' => $circuits]);
    }

    public function create()
    {
        return view('circuit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Circuit::create([
            "name" => $request->name,
        ]);

        return redirect()->route('circuit.index');
    }

    public function edit($id)
    {
        $circuit = Circuit::find($id);

        return view('circuit.edit', ['circuit' => $circuit]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $circuit = Circuit::find($id);
        $circuit->update([
            "name" => $request->name,
        ]);

        return redirect()->route('circuit.index');
    }

    public function destroy($id)
    {
        $circuit = Circuit::find($id);
        $circuit->delete();
        return redirect()->route('circuit.index');
    }
}