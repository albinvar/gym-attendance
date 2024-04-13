<?php

namespace App\Livewire;

use Livewire\Component;

class AddFunds extends Component
{
    public $confirmingRecharge = false;
    public $rechargeAmount;

    public function openAddFundsModal()
    {
        $this->confirmingRecharge = true;
    }

    public function stopConfirmingRecharge()
    {
        $this->confirmingRecharge = false;
    }

    public function rechargeFunds()
    {
        // Perform your logic to recharge funds
        // Once the funds are recharged, you can close the modal
        $this->confirmingRecharge = false;
    }
    public function render()
    {
        return view('livewire.add-funds');
    }
}
