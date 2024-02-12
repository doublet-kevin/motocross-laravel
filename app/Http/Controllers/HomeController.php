<?php

namespace App\Http\Controllers;

use App\Models\Training;

class HomeController extends Controller
{
    public function index()
    {
        $nextJuniorTraining = Training::select(
            'trainings.*',
        )
            ->where('type', 'Jeune pilote')
            ->orderBy('trainings.date', 'desc')
            ->first();


        $nextSeniorTraining = Training::select(
            'trainings.*',
        )
            ->where('type', 'Pilote senior')
            ->orderBy('trainings.date', 'desc')
            ->first();

        return view('home', ['nextSeniorTraining' => $nextSeniorTraining, 'nextJuniorTraining' => $nextJuniorTraining]);
    }
}
