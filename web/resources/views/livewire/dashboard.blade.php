<div wire:poll.3s>
<div class="bg-white py-2">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto mt-2 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
                <h3 class="text-2xl font-bold tracking-tight text-gray-900">Welcome {{ Auth::user()->name }}</h3>
                <p class="mt-6 text-base leading-7 text-gray-600">
                    Thanks for using CampusX. We are glad to have you here. Keep track of your expenses and manage your wallet with ease.
                </p>
                <div class="mt-10 flex items-center gap-x-4">
                    <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">
                        Where can you use your wallet?
                    </h4>
                    <div class="h-px flex-auto bg-gray-100"></div>
                </div>
                <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Campus Stores
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Campus Gym
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Campus Canteen
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Campus Library
                    </li>
                </ul>
            </div>
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                    <div class="mx-auto max-w-xs px-8">
                        <p class="text-base font-semibold text-gray-600">Your Current Balance is :</p>
                        <p class="mt-6 flex items-baseline justify-center gap-x-2">
                            <span class="text-5xl font-bold tracking-tight text-gray-900">
                                ₹ {{ Auth::user()->balanceFloat }}
                            </span>
                        </p>
                        <button wire:click="openAddFundsModal" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Recharge Wallet
                        </button>
                        <p class="mt-6 text-xs leading-5 text-gray-600">
                            Invoices and receipts available for easy company reimbursement
                        </p>
                        <div class="px-3 my-6 flex flex-wrap justify-between">
                            <p class="pb-2 text-base font-semibold text-gray-600">
                                PIN Security
                            </p>
                            <div>
                                <label for="hs-basic-with-description" class="text-sm text-gray-500 me-3 dark:text-gray-400">Off</label>
                                <input type="checkbox" wire:click="toggle" id="hs-basic-usage" class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200"
                                       @if ($pinEnabled) checked @endif
                                >
                                <label for="hs-basic-usage" class="sr-only">switch</label>
                                <label for="hs-basic-with-description" class="text-sm text-gray-500 ms-3 dark:text-gray-400">On</label>
                            </div>
                        </div>
                        <div class="mt-8 rounded-2xl bg-gray-100 py-3 text-center ring-1 ring-inset ring-gray-900/5 items-center justify-center">
                            <p class="pb-2 text-base font-semibold text-gray-600">
                                Your PIN
                            </p>
                            <div class="flex justify-center space-x-3" data-hs-pin-input="">
                                <input type="text" class="block w-[38px] text-center border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" data-hs-pin-input-item="" wire:model="digit1">
                                <input type="text" class="block w-[38px] text-center border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" data-hs-pin-input-item="" wire:model="digit2">
                                <input type="text" class="block w-[38px] text-center border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" data-hs-pin-input-item="" wire:model="digit3">
                                <input type="text" class="block w-[38px] text-center border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" data-hs-pin-input-item="" wire:model="digit4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<x-transactions />

    <div>
        <x-dialog-modal wire:model.live="confirmingRecharge">
            <!-- Modal Title -->
            <x-slot name="title">
                {{ __('Add Funds') }}
            </x-slot>

            <!-- Modal Content -->
            <x-slot name="content">
                {{ __('Please enter the amount to recharge') }}

                <div class="mt-4">
                    <x-input type="number" class="mt-1 block w-3/4" placeholder="{{ __('Amount') }}" step="0.01"
                             wire:model="rechargeAmount" />
                    <x-input-error for="rechargeAmount" class="mt-2" />
                </div>
            </x-slot>

            <!-- Modal Footer -->
            <x-slot name="footer">
                <x-secondary-button wire:click="stopConfirmingRecharge" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ms-3" dusk="recharge-button" wire:click="rechargeFunds" wire:loading.attr="disabled">
                    {{ __('Recharge') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </div>





</div>
