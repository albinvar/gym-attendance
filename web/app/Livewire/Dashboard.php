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
//        $keyId = env('RAZORPAY_KEY_ID');
//        $keySecret = env('RAZORPAY_KEY_SECRET');
//        $api = new Api($keyId, $keySecret);
//
//        $orderData = [
//            'receipt'         => uniqid(),
//            'amount'          => $this->rechargeAmount * 100, // Convert amount to paise
//            'currency'        => 'INR',
//            'payment_capture' => 1 // Auto capture
//        ];
//
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $displayCurrency = 'INR';

        $api = new Api($keyId, $keySecret);

        $orderData = [
            'receipt'         => "3232",
            'amount'          => 1999 * 100, // 1999 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];

        $displayAmount = $amount = $orderData['amount'];

        $data = [
            "key"               => $keyId,
            "amount"            => $amount,
            "name"              => "Dev Connect",
            "description"       => "A platform for beginners in programming...",
            "image"             => "https://raw.githubusercontent.com/albinvar/code-mentor-hub/c56d5ff1478adcfee0c55b4808704b8d567987bd/public/images/logo.png?token=GHSAT0AAAAAAB7UHVCIRYDUSE6FTH4PTTSEZCHKU6Q",
            "prefill"           => [
                "name"              => auth()->user()->name,
                "email"             => auth()->user()->email,
                "contact"           => "9876543219",
            ],
            "notes"             => [
                "address"           => "",
                "merchant_order_id" => "12312321",
            ],
            "theme"             => [
                "color"             => "#F37254"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        session()->put('razorpay_order_id', $razorpayOrderId);

        $this->confirmingRecharge = false;

        // Redirect to payment gateway page
        return redirect()->route('payment.gateway');
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
