<?php

namespace App\Livewire;

use App\Models\project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public string $name = '';
    public ?int $id = null;

    public function setProject(ModelsProject $project)
    {
        $this->name = $project->name;
    }

    public function save()
    {
        $project = ModelsProject::findOrFail($this->id);
        $project->name = $this->name;
        $project->update();
        $this->clearForm();
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
        $this->id = null;
    }
}
