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
        $success = true;

        $error = "Payment Failed";

        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $displayCurrency = 'INR';

        $api = new Api($keyId, $keySecret);

        if (empty($request->get('paymentId')) === false)
        {
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => session()->pull('razorpay_order_id'),
                    'razorpay_payment_id' => $request->get('paymentId'),
                    'razorpay_signature' => $request->get('signature')
                );

                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true)
        {
            // retrieve the amount from the payment on razorpay

            $payment = $api->payment->fetch($request->get('paymentId'));

            // retrieve the amount from the payment on razorpay
            $amount = $payment->amount;

            // convert the amount to rupees
            $amount = $amount / 100;

            // update the authenticated user's membership status
            $t= auth()->user()->membership()->create([
                'plan' => 'basic',
                'status' => 'active',
                'trial_ends_at' => null,
                'ends_at' => now()->addDays(30),
                'canceled_at' => null,
                'payment_gateway' => 'razorpay',
                'payment_id' => $request->get('paymentId'),
                'payment_status' => 'success',
                'amount' => $amount,
            ]);

            dd($t);

            return response()->json([
                'success' => true,
                'message' => 'Payment Successful',
            ], 200);
        }
        else
        {
            // return failure response for in xml ajax
            return response()->json([
                'success' => false,
                'message' => $error,
            ], 400);
        }

    }
}
