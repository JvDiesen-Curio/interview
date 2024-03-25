<?php

namespace App\Livewire\Forms;

use App\Models\team;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TeamsForm extends Form
{

    public ?team $team = null;

    #[Validate('required')]
    public string $name = '';


    public function set(team $team)
    {
        $this->team = $team;

        $this->name = $team->name;
    }

    public function save()
    {
        if ($this->team) {
            $this->update();
        } else {
            $this->store();
        }
    }


    private function store()
    {
        team::create($this->validate());
        $this->reset();
    }

    private function update()
    {
        $this->team->update($this->validate());
        $this->reset();
    }
}
