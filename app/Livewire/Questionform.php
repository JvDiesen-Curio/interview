<?php

namespace App\Livewire;

use App\Livewire\Forms\questionform as FormsQuestionform;
use App\Models\question;
use Livewire\Component;

class Questionform extends Component
{

    public FormsQuestionform $form;


    public function mount($question)
    {
        if (!$question) return;
        $this->form->set($question);
    }

    public function save()
    {
        $this->form->save();
    }


    public function render()
    {
        return view('livewire.questionform');
    }
}
