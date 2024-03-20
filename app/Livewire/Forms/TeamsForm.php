<?php

namespace App\Livewire\Forms;

use App\Models\team;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TeamsForm extends Form
{

    public ?team $team;

    #[Validate('required')]
    public string $name = '';


    public function set(team $team)
    {
        $this->team = $team;

        $this->name = $team->name;
    }

    public function store()
    {
        $this->validate();

        team::create($this->all());

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->team->update($this->all());

        $this->reset();
    }
}
