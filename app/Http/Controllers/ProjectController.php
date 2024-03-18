<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //Get: index

    public function index()
    {
        // $project = project::all();

        return view('project.index');
    }


    //Get: create 
    public function create()
    {
        return view("project.form");
    }

    //Post: store
    public function store()
    {
        // dd($this->validateTeam());
        project::create($this->validateTeam());
        return redirect()->route('project.index');
    }

    //Get show
    public function show(project $project)
    {
        return view('project.show', ['project' => $project]);
    }

    //Get: edit 
    public function edit(project $project)
    {
        return view('project.form', ['project' => $project]);
    }

    //Put: update
    public function update(project $project)
    {
        $project->update($this->validateTeam());
        return redirect()->route('project.index');
    }


    //delete: 
    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }


    private function validateTeam()
    {
        return request()->validate([
            'name' => ['string', 'required']
        ]);
    }
}
