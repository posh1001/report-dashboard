<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class ChurchesPioneeredCard extends Component
{
    public $churchesPioneered = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->churchesPioneered = PostProgram::sum('churches_pioneered');
    }

    public function render()
    {
        $this->loadData();

        return view('livewire.cards.churches-pioneered-card');
    }
}
