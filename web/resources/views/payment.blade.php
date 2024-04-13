<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>

    <script src="https://checkout.razorpay.com/v1/checkout.js" defer></script>
    <script>
        // Launch Razorpay modal on page load
        window.onload = function() {
            var options = {
                "key": "{{ $data['key'] }}",
                "amount": "{{ $data['amount'] }}",
                "currency": "INR",
                "name": "{{ $data['name'] }}",
                "image": "{{ $data['image'] }}",
                "description": "{{ $data['description'] }}",
                "prefill": {
                    "name": "{{ $data['prefill']['name'] }}",
                    "email": "{{ $data['prefill']['email'] }}",
                    "contact": "{{ $data['prefill']['contact'] }}"
                },
                "notes": {
                    "shopping_order_id": "3456"
                },
                "order_id": "{{ $data['order_id'] }}",
                "handler": function(response) {
                    // Handle the response after payment completion, if needed
                    console.log(response);
                    capturePayment(response.razorpay_payment_id, response.razorpay_signature);
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        };

        function capturePayment(paymentId, signature) {
            // Send an AJAX request to capture the payment
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('payment.gateway.response') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Redirect to the callback URL
                    window.location.href = "{{ route('payment.gateway') }}";
                } else {
                    console.error('Failed to capture payment');
                }
            };
            xhr.send(JSON.stringify({
                paymentId: paymentId,
                signature: signature
            }));
        }
    </script>

    <div class="py-12">
        <div class="text-center max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
{{--                        <x-jet-application-logo class="block h-12 w-auto" />--}}
                    </div>

                    <div class="mt-6 text-gray-500">
                        Redirecting to payment gateway...
                    </div>

                    <div class="mt-6 text-gray-500">
                        If you are not redirected automatically, <a href="{{  route('dashboard' )}}">click here</a>.
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
