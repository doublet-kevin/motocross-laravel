<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circuit;
use App\Models\Training;


class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::all();
        return view('training.index', ['trainings' => $trainings]);
    }

    public function create()
    {
        $circuits = Circuit::all();
        return view('training.create', ['circuits' => $circuits]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_circuit' => 'required',
            'date' => 'required',
            'type' => 'required',
            'number_of_places' => 'required',
        ]);

        // $circuit = Circuit::where('name'= $request->)

        Training::create([
            "name_circuit" => $request->id_training,
            "date" => $request->date,
            "type" => $request->type,
            "number_of_places" => $request->number_of_places,
        ]);

        return redirect()->route('training.index');
    }

    public function edit($id)
    {
        $training = Training::find($id);

        return view('training.edit', ['training' => $training, 'circuits' => Circuit::all()]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name_circuit' => 'required',
            'date' => 'required',
            'type' => 'required',
            'number_of_places' => 'required',
        ]);

        $training = Training::find($id);
        $training->update([
            "name_circuit" => $request->id_training,
            "date" => $request->date,
            "type" => $request->type,
            "number_of_places" => $request->number_of_places,
        ]);

        return redirect()->route('training.index');
    }

    public function destroy($id)
    {
        $training = Training::find($id);
        $training->delete();
        return redirect()->route('training.index');
    }
}
