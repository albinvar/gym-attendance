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
                "order_id": "{{ $data['order_id'] }}"
            };

            var rzp = new Razorpay(options);
            rzp.open();
        };
    </script>
</x-app-layout>
