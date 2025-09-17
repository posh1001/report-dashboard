<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class CentersPioneeredCard extends Component
{
    public $centersPioneered = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->centersPioneered = PostProgram::sum('centers_pioneered');
    }

    public function render()
    {
        $this->loadData();

        return view('livewire.cards.centers-pioneered-card');
    }
}
