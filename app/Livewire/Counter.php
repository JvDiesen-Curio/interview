<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 1;

    public string $input = '';




    public function min()
    {

        $this->count--;
    }

    public function plus()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
