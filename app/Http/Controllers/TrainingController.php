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
            'id_circuit' => 'required',
            'date' => 'required',
            'type' => 'required',
            'number_of_places' => 'required',
        ]);

        Training::create([
            "id_circuit" => $request->id_circuit,
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
            'id_circuit' => 'required',
            'date' => 'required',
            'type' => 'required',
            'number_of_places' => 'required',
        ]);

        $training = Training::find($id);
        $training->update([
            "id_circuit" => $request->id_circuit,
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
        return back()->with('success', 'Training deleted successfully');
    }

    public function board()
    {
        $trainings = Training::all();
        return view('admin.training.index', ['trainings' => $trainings]);
    }
}
