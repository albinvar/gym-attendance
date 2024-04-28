<div>
<div class="bg-white py-2">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto mt-2 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
                <h3 class="text-2xl font-bold tracking-tight text-gray-900">Welcome {{ Auth::user()->name }}</h3>
                <p class="mt-6 text-base leading-7 text-gray-600">
                    Thanks for using CampusX. We are glad to have you here. Keep track of your expenses and manage your wallet with ease.
                </p>
                <img src="https://cdn.devdojo.com/images/november2020/welcome.png" class="hidden h-48 lg:block mt-10 float-right" alt="Welcome to CampusX">
                <div class="mt-10 flex items-center gap-x-4">
                   <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">
                        How we help you
                    </h4>
                    <div class="h-px flex-auto bg-gray-100"></div>
                </div>
                <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Fitness Tracking
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Recommend Workouts
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Personal Trainer
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Diet Plan
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Gym Equipments
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        Personalized Workouts
                    </li>
                </ul>
                <h4 class="mt-12 flex-none text-sm font-semibold leading-6 text-indigo-600">
                    Attendance Report
                </h4>
                <div id="chart" class="mt-12"></div>
            </div>
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                <div class="rounded-2xl bg-white py-10 text-center ring-1 ring-inset ring-gray-900/10 lg:flex lg:flex-col lg:justify-center lg:py-16">

                    <div class="mx-auto max-w-xs px-8">
                        <h4 class="text-lg mb-12 font-semibold text-gray-900">Membership</h4>
                        <img src="{{ asset('assets/images/gym.svg') }}" class="h-48 mx-auto" alt="Wallet">
                        <button wire:click="openAddFundsModal" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Renew Membership
                        </button>
                        <p class="mt-6 text-xs leading-5 text-gray-600">
                            Your attendance report will be updated here. Keep track of your attendance and stay updated.
                        </p>
                    </div>
                    <div class="mx-4">
                        <div class="px-4 my-6 flex flex-wrap justify-between">
                            <p class="pb-2 text-base font-semibold text-gray-600">
                                Recent Checkins
                            </p>
                        </div>
                        <div class="px-4 mt-8 rounded-2xl bg-gray-100 py-3 text-center ring-1 ring-inset ring-gray-900/5 items-center justify-center">
                            <ul class="divide-y divide-gray-200">
                                @foreach($checkins as $checkin)
                                    <li class="flex items-center justify-between py-3 w-full">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">Attendance Marked</p>
                                                <p class="text-sm text-gray-500">8 minutes ago</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Checked In
                    </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
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
                {{ __('Upgrade Membership') }}
            </x-slot>

            <!-- Modal Content -->
            <x-slot name="content">

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/gym.svg') }}" class="h-12 w-12" alt="Wallet">
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Membership</h4>
                            <p class="text-sm text-gray-600">Upgrade your membership to enjoy more features.</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <p class="text-lg font-semibold text-gray-900">$50</p>
                        <p class="text-sm text-gray-600">/month</p>
                    </div>
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


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

    var options = {
        series: [{
            name: 'Series 1',
            data: [20, 100, 40, 30, 50, 80, 33],
        }],
        chart: {
            height: 350,
            type: 'radar',
        },
        dataLabels: {
            enabled: true
        },
        plotOptions: {
            radar: {
                size: 140,
                polygons: {
                    strokeColors: '#e9e9e9',
                    fill: {
                        colors: ['#f8f8f8', '#fff']
                    }
                }
            }
        },

        colors: ['#FF4560'],
        markers: {
            size: 4,
            colors: ['#fff'],
            strokeColor: '#FF4560',
            strokeWidth: 2,
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val
                }
            }
        },
        xaxis: {
            categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        },
        yaxis: {
            tickAmount: 7,
            labels: {
                formatter: function(val, i) {
                    if (i % 2 === 0) {
                        return val
                    } else {
                        return ''
                    }
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
</div>
