<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circuit;
use App\Models\Training;
use Illuminate\Support\Facades\DB;


class TrainingController extends Controller
{
    public function index()
    {

        $trainings = Training::select(
            'trainings.*',
            'type',
            DB::raw('COUNT(registrations.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.id_training')
            ->groupBy('trainings.id', 'type')
            ->orderBy('date', 'desc')
            ->get();

        // Séparez les entraînements pour les enfants et les adultes
        $young_pilot = $trainings->where('type', 'enfant');
        $veteran_pilot = $trainings->where('type', 'adulte');


        return view('training.index')->with([
            'enfant' => $young_pilot,
            'adulte' => $veteran_pilot,
            'trainings' => $trainings,
        ]);
    }

    public function show($id)
    {
        $training = Training::find($id);
        $participants = $training->registrations->map->user;
        return view('training.show', ['training' => $training, 'participants' => $participants]);
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
            'max_participants' => 'required',
        ]);

        Training::create([
            "id_circuit" => $request->id_circuit,
            "date" => $request->date,
            "type" => $request->type,
            "max_participants" => $request->max_participants,
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
            'max_participants' => 'required',
        ]);

        $training = Training::find($id);
        $training->update([
            "id_circuit" => $request->id_circuit,
            "date" => $request->date,
            "type" => $request->type,
            "max_participants" => $request->max_participants,
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
