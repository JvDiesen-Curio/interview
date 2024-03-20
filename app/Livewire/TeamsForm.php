<?php

namespace App\Livewire;

use App\Livewire\Forms\TeamsForm as FormsTeamsForm;
use App\Models\team;
use Livewire\Component;

class TeamsForm extends Component
{
    public FormsTeamsForm $form;



    public function mount(team $team)
    {

        $this->form->set($team);
    }


    public function save()
    {

        $this->form->update();

        return $this->redirect('/team');
    }


    public function render()
    {
        return view('livewire.teams-form');
    }
}
