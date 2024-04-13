<?php

namespace App\Livewire;

use Livewire\Component;
use Razorpay\Api\Api;

class Dashboard extends Component
{
    public $confirmingRecharge = false;

    public $rechargeAmount;

    protected $listeners = ['openAddFundsModal'];

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
        // Generate Razorpay order and store necessary details in session
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);

        $orderData = [
            'receipt'         => uniqid(),
            'amount'          => $this->rechargeAmount * 100, // Convert amount to paise
            'currency'        => 'INR',
            'payment_capture' => 1 // Auto capture
        ];


        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];

        session()->put('razorpay_order_id', $razorpayOrderId);

        $this->confirmingRecharge = false;

        // send post request to payment gateway with params
        return redirect()->route('payment.gateway');
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
