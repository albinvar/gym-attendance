<?php

namespace App\Livewire;

use Livewire\Component;

class Attendance extends Component
{

    public $attendances;

    public function render()
    {
        $this->attendances = auth()->user()->attendances()->latest()->get();

        return view('livewire.attendance');
    }
}
