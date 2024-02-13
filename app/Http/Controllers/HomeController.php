<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $nextJuniorTraining = Training::select(
            'trainings.*',
            DB::raw('COUNT(registrations.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.training_id')
            ->where('type', 'Jeune pilote')
            ->groupBy('trainings.id', 'trainings.type', 'trainings.date', 'trainings.max_participants', 'trainings.circuit_id')
            ->orderBy('trainings.date', 'desc')
            ->first();


        $nextSeniorTraining = Training::select(
            'trainings.*',
            DB::raw('COUNT(registrations.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.training_id')
            ->where('type', 'Pilote senior')
            ->groupBy('trainings.id', 'trainings.type', 'trainings.date', 'trainings.max_participants', 'trainings.circuit_id')
            ->orderBy('trainings.date', 'desc')
            ->first();

        return view('home', ['nextSeniorTraining' => $nextSeniorTraining, 'nextJuniorTraining' => $nextJuniorTraining]);
    }
}
