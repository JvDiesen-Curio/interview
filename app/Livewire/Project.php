<?php

namespace App\Livewire;

use App\Models\project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public string $name = '';
    // public ?int $id = null;
    public ?ModelsProject $project = null;

    public function setProject(ModelsProject $project)
    {

        $this->name = $project->name;
        $this->project = $project;
    }

    public function store()
    {
        if ($this->project) {
            $this->project->name = $this->name;
            $this->project->update();
            $this->clearForm();
        }

        return $this->redirect('/project');
    }

    public string $input = '';

    public function render()
    {
        $projects = ModelsProject::where('name', 'like', "%" . $this->input  . "%")->get();
        return view('livewire.project', ['projects' => $projects]);
    }


    private function clearForm()
    {
        $this->name = '';
        $this->project = null;
    }
}
