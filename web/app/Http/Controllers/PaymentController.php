<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class PaymentController extends Controller
{
    // This controller is responsible for handling payment gateway related logic

    // Method to show payment gateway page
    public function showPaymentGateway()
    {

        // check if razorpay order id is present in session
        if (!session()->has('razorpay_order_id'))
        {
            return redirect()->route('dashboard');
        }

        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $displayCurrency = 'INR';

        $api = new Api($keyId, $keySecret);

        $razorpayOrderId = session()->get('razorpay_order_id');

        // Fetch order data from Razorpay
        $order = $api->order->fetch($razorpayOrderId);

        $orderData = [
            'amount' => $order['amount'],
            'currency' => $order['currency'],
            'receipt' => $order['receipt'],
            'status' => $order['status'],
        ];

        // abort if order is not valid
        if ($orderData['status'] !== 'created')
        {
            dd('Invalid order');
            return redirect()->route('dashboard');
        }

        $data = [
            "key"               => $keyId,
            "amount"            => $orderData['amount'],
            "name"              => "Campus X",
            "description"       => "Unified platform for campus payments...",
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

        return view('payment', compact('data'));
    }

    public function handleGatewayResponse(Request $request)
    {
        

    }
}
