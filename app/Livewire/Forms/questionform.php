<?php

namespace App\Livewire\Forms;

use App\Models\question;
use Livewire\Attributes\Validate;
use Livewire\Form;

class questionform extends Form
{
    public ?question $question = null;

    #[Validate('required')]
    public string $description = '';

    public function set(question $question)
    {
        $this->description = $question->description;
        $this->question = $question;
    }

    public function save()
    {
        if ($this->question) $this->update();
        else $this->store();
    }


    private function store()
    {
        question::create($this->validate());
        $this->reset();
    }

    private function update()
    {
        $this->question->update($this->validate());
        $this->reset();
    }
}
