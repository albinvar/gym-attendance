<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

<!-- Modal -->
<div class="size-full z-[80] overflow-x-hidden overflow-y-auto pointer-events-none mt-12">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="relative flex flex-col bg-white shadow-lg rounded-xl pointer-events-auto">

            <!-- Body -->
            <div class="p-4 sm:p-7 overflow-y-auto">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Invoice from {{ env('APP_NAME') }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        Invoice #{{ number_format($membership->id) }}
                    </p>
                </div>

                <!-- Grid -->
                <div class="mt-5 sm:mt-10 grid grid-cols-2 sm:grid-cols-3 gap-5">
                    <div>
                        <span class="block text-xs uppercase text-gray-500">Amount paid:</span>
                        <span class="block text-sm font-medium text-gray-800">₹{{$membership->amount}}</span>
                    </div>
                    <!-- End Col -->

                    <div>
                        <span class="float-right py-.5 px-2 inline-flex items-center gap-x-1 text-md font-medium bg-teal-100 text-teal-800 rounded-full">
        <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
          <path d="m9 12 2 2 4-4"></path>
        </svg>
        Paid
      </span>
                        <span class="block text-xs uppercase text-gray-500">Date paid:</span>
                        <span class="block text-sm font-medium text-gray-800">
                            {{ $membership->created_at->format('d M, Y') }}
                        </span>
                    </div>
                    <!-- End Col -->

                    <div>
                        <span class="block mt-2 text-xs uppercase text-gray-500">Payment method:</span>
                        <div class="flex items-center gap-x-2">
                            <svg class="size-5" width="400" height="248" viewBox="0 0 400 248" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path d="M254 220.8H146V26.4H254V220.8Z" fill="#FF5F00"/>
                                    <path d="M152.8 123.6C152.8 84.2 171.2 49 200 26.4C178.2 9.2 151.4 0 123.6 0C55.4 0 0 55.4 0 123.6C0 191.8 55.4 247.2 123.6 247.2C151.4 247.2 178.2 238 200 220.8C171.2 198.2 152.8 163 152.8 123.6Z" fill="#EB001B"/>
                                    <path d="M400 123.6C400 191.8 344.6 247.2 276.4 247.2C248.6 247.2 221.8 238 200 220.8C228.8 198.2 247.2 163 247.2 123.6C247.2 84.2 228.8 49 200 26.4C221.8 9.2 248.6 0 276.4 0C344.6 0 400 55.4 400 123.6Z" fill="#F79E1B"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="400" height="247.2" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="block text-sm font-medium text-gray-800">
                                {{ $membership->payment_gateway }}
                            </span>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->

                <div class="mt-5 sm:mt-10">
                    <h4 class="text-xs font-semibold uppercase text-gray-800">Summary</h4>

                    <ul class="mt-3 flex flex-col">
                        <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg">
                            <div class="flex items-center justify-between w-full">
                                <span>Payment to Front</span>
                                <span>₹{{ $membership->amount }}</span>
                            </div>
                        </li>
                        <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg">
                            <div class="flex items-center justify-between w-full">
                                <span>Tax fee</span>
                                <span>₹0</span>
                            </div>
                        </li>
                        <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-semibold bg-gray-50 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg">
                            <div class="flex items-center justify-between w-full">
                                <span>Amount paid</span>
                                <span>₹{{ $membership->amount }}</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Button -->
                <div class="mt-5 flex justify-end gap-x-2">
                    <button class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
                            onclick="window.print()" type="button" title="Print invoice">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        Invoice PDF
                    </button>
                    <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            onclick="window.print()" type="button" title="Print invoice"
                    >
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                        Print
                    </button>
                </div>
                <!-- End Buttons -->

                <div class="mt-5 sm:mt-10">
                    <p class="text-sm text-gray-500">If you have any questions, please contact us at <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="#">example@site.com</a> or call at <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="tel:+1898345492">+1 898-34-5492</a></p>
                </div>
            </div>
            <!-- End Body -->
        </div>
    </div>
</div>
<!-- End Modal -->
</x-app-layout>
