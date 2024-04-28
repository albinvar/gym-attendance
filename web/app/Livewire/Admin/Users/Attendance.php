<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class Attendance extends Component
{

    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin.users.attendance');
    }
}
