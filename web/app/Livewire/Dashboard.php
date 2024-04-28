<?php

namespace App\Livewire;

use Livewire\Component;
use Razorpay\Api\Api;

class Dashboard extends Component
{
    public $confirmingRecharge = false;

    public $rechargeAmount = 0;

    public $membershipActive = false;

    public $checkins = [];


    protected $listeners = ['openAddFundsModal'];
    public bool $pinEnabled;

    public function openAddFundsModal()
    {
        $this->confirmingRecharge = true;
    }

    public function stopConfirmingRecharge()
    {
        $this->confirmingRecharge = false;
    }

    public function toggle()
    {
        $this->pinEnabled = !$this->pinEnabled;
        // Update the database when the toggle switch is enabled
        if ($this->pinEnabled) {
            // update the authenticated user's pin status to true
            auth()->user()->update(['enable_pin' => true]);
            $this->rotatePin();
        } else {
            // update the authenticated user's pin status to false
            auth()->user()->update(['enable_pin' => false]);
        }
    }

    public function rotatePin()
    {
        // Generate a new pin
        $pin = rand(1000, 9999);

        // Update the authenticated user's pin
        auth()->user()->update(['pin' => $pin]);
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
        // recharge amount
        $this->rechargeAmount = env('MEMBERSHIP_AMOUNT');

        // check if the authenticated user has an active membership
        $this->membershipActive = auth()->user()->membership()->active()->exists();

        // show the attendance records of the authenticated user of max 5 records
        $this->checkins = auth()->user()->attendances()->latest()->limit(5)->get();

        return view('livewire.dashboard');
    }
}
