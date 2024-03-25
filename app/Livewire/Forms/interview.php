<?php

namespace App\Livewire\Forms;

use App\Models\interview as ModelsInterview;
use Livewire\Attributes\Validate;
use Livewire\Form;

class interview extends Form
{
    public ?ModelsInterview $interview = null;

    #[Validate('required')]
    public string $description = '';

    #[Validate('required')]
    public string $date = '';

    #[Validate('required')]
    public int $project_id = 0;

    public function set(ModelsInterview $interview)
    {
        $this->description = $interview->description;
        $this->date = $interview->date;
        $this->project_id = $interview->project_id;
        $this->interview = $interview;
    }

    public function save()
    {
        if ($this->interview) $this->update();
        else $this->store();
    }


    private function store()
    {
        ModelsInterview::create($this->validate());
        $this->reset();
    }

    private function update()
    {
        $this->interview->update($this->validate());
        $this->reset();
    }
}
