<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        // TASK: Add one sentence to save the project to the logged-in user
        //   by $request->project_id and with $request->start_date parameter
        
        $project_id = $request->project_id;
        $start_date = $request->start_date;
        
        // Obtenha o usuário logado
        $user = auth()->user();
        
        // Encontre o projeto pelo id
        $project = Project::find($project_id);
        
        // Associe o projeto ao usuário e defina a data de início
        $user->projects()->attach($project_id, ['start_date' => $start_date]);

        return 'Success';
    }
}
