<?php

namespace App\Livewire;

use App\Models\interview as ModelsInterview;
use Livewire\Component;

class Interview extends Component
{

    public $editInterview = null;

    public function setIterview(ModelsInterview $interview)
    {
        $this->editInterview = $interview;
    }

    public function render()
    {
        $interviews = ModelsInterview::all();
        return view('livewire.interview', ['interviews' => $interviews]);
    }
}
