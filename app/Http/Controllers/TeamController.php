<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;
use PDO;

class TeamController extends Controller
{

    //Get: index

    public function index()
    {
        $teams = team::with('projects')->get();

        return view('team.index', ['teams' => $teams]);
    }


    //Get: create 
    public function create()
    {
        return view("team.form");
    }

    //Post: store
    public function store()
    {
        $data = $this->validateTeam();
        $team =  team::create($data);
        $team->projects(['name'  => $data['projectName']]);
        return redirect()->route('team.index');
    }

    //Get show
    public function show(team $team)
    {
        return view('team.show', ['team' => $team]);
    }

    //Get: edit 
    public function edit(Team $team)
    {
        return view('team.form', ['team' => $team]);
    }

    //Put: update
    public function update(Team $team)
    {
        $team->update($this->validateTeam('update'));
        return redirect()->route('team.index');
    }


    //delete: 
    public function destroy(team $team)
    {
        $team->delete();
        return redirect()->route('team.index');
    }


    private function validateTeam($method = 'create')
    {
        $rules = [
            'name' => ['string', 'required']
        ];
        if ($method === 'create')  $rules['projectName'] = ['string'];
        return request()->validate($rules);
    }
}
