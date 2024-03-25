<?php

namespace App\Livewire;

use App\Livewire\Forms\interview;
use App\Models\project;
use App\Models\question;
use Livewire\Component;

class InterviewForm extends Component
{
    public interview $form;

    public $questions = [];

    public function addQuestion()
    {
        array_push($this->questions, null);
    }

    public function mount($interview)
    {
        if (!$interview) return;
        $this->form->set($interview);
    }

    public function save()
    {
        dd($this->all());
        $this->form->save();
        return $this->redirect('/interview');
        $this->questions[0]->save();
    }

    public function render()
    {
        $projects = project::all();
        return view('livewire.interview-form', ['projects' => $projects]);
    }
}
