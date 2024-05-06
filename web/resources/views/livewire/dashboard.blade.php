<div>
<div class="bg-white py-2">
    @if(!auth()->user()->hasRole('admin'))
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto mt-2 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
                <h3 class="text-2xl font-bold tracking-tight text-gray-900">Welcome {{ Auth::user()->name }}</h3>
                <p class="mt-6 text-base leading-7 text-gray-600">
                    Thanks for using Fit Flow Access. We are glad to have you here. Keep track of your expenses and manage your wallet with ease.
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
                        Personalized Workouts
                    </li>
                </ul>


                <h3 class="text-2xl mt-12 font-bold tracking-tight text-gray-900">
                    Your Stats
                </h3>

                <!-- Card Section -->
                <div class="max-w-[85rem] px-4 py-10 sm:px-1 lg:px-8 lg:py-14 mx-auto">
                    <!-- Grid -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-1 sm:gap-6">
                        <!-- Card -->
                        <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                            <div class="inline-flex justify-center items-center">
                                <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                                <span class="text-xs font-semibold uppercase text-gray-600">
                                    Total Time Spend
                                </span>
                            </div>

                            <div class="text-center">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                                    {{ round(auth()->user()->attendances()->totalHoursWorked() / 60, 1) }}
                                    <span class="text-sm font-normal text-gray-500">hours</span>
                                </h3>
                            </div>

                            <dl class="flex justify-center items-center divide-x divide-gray-200">
                                <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              1.7%
            </span>
          </span>
                                    <span class="block text-sm text-gray-500">change</span>
                                </dt>
                                <dd class="text-start ps-3">
                                    <span class="text-sm font-semibold text-gray-800">5</span>
                                    <span class="block text-sm text-gray-500">last week</span>
                                </dd>
                            </dl>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                            <div class="inline-flex justify-center items-center">
                                <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
                                <span class="text-xs font-semibold uppercase text-gray-600">Calories Burned</span>
                            </div>

                            <div class="text-center">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                                    {{ round(auth()->user()->attendances()->caloriesBurned()) }}
                                    <span class="text-sm font-normal text-gray-500">calories</span>
                                </h3>
                            </div>

                            <dl class="flex justify-center items-center divide-x divide-gray-200">
                                <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
                                    <span class="block text-sm text-gray-500">change</span>
                                </dt>
                                <dd class="text-start ps-3">
                                    <span class="text-sm font-semibold text-gray-800">7</span>
                                    <span class="block text-sm text-gray-500">last week</span>
                                </dd>
                            </dl>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                            <div class="inline-flex justify-center items-center">
                                <span class="size-2 inline-block bg-red-500 rounded-full me-2"></span>
                                <span class="text-xs font-semibold uppercase text-gray-600">Leaves Taken ({{ now()->format('M-Y') }})</span>
                            </div>

                            <div class="text-center">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                                    {{ count(auth()->user()->attendances()->absentDays()) }}
                                </h3>
                            </div>

                            <dl class="flex justify-center items-center divide-x divide-gray-200">
                                <dt class="pe-3">
          <span class="text-red-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
                                    <span class="block text-sm text-gray-500">change</span>
                                </dt>
                                <dd class="text-start ps-3">
                                    <span class="text-sm font-semibold text-gray-800">
                                        0
                                    </span>
                                    <span class="block text-sm text-gray-500">last week</span>
                                </dd>
                            </dl>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                            <div class="inline-flex justify-center items-center">
                                <span class="size-2 inline-block bg-orange-500 rounded-full me-2"></span>
                                <span class="text-xs font-semibold uppercase text-gray-600">
                                    Total Workouts
                                </span>
                            </div>

                            <div class="text-center">
                                <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                                    {{ auth()->user()->attendances()->count() }}
                                </h3>
                            </div>

                            <dl class="flex justify-center items-center divide-x divide-gray-200">
                                <dt class="pe-3">
          <span class="text-red-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
                                    <span class="block text-sm text-gray-500">change</span>
                                </dt>
                                <dd class="text-start ps-3">
                                    <span class="text-sm font-semibold text-gray-800">7</span>
                                    <span class="block text-sm text-gray-500">last week</span>
                                </dd>
                            </dl>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Grid -->
                </div>
                <!-- End Card Section -->


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
                       @if(!$membershipActive)
                            <button wire:click="openAddFundsModal" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Subscribe
                            </button>
                        @else

                           <div class="mt-10">
                               <p class="text-sm text-gray-600 font-semibold text-green-600">Your membership is active. Enjoy the benefits.</p>
                               <a class="py-2 px-3 my-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
                                  href="{{ route('invoice.show', ['id' => Auth::user()->membership->id]) }}">
                                   <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                   Invoice PDF
                               </a>
                               <div class="mt-4">
                                   <p class="text-sm text-gray-600">Membership : <span class="text-gray-900 font-semibold">Active</span></p>
                                   <p class="text-sm text-gray-600">Amount Paid : <span class="text-gray-900 font-semibold">₹{{ env('MEMBERSHIP_AMOUNT') }}</span></p>
                                   <p class="text-sm text-gray-600">Next Payment : <span class="text-gray-900 font-semibold">{{ Auth::user()->membership->ends_at->format('d M, Y') }}</span></p>
                               </div>
                            </div>
                       @endif
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
                                            <div class="ml-4 text-left">
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $checkin->note ?? "Attendance - Checked In" }}
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    {{ $checkin->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            @if($checkin->status == 'checked_out')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Checked Out
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Checked In
                                                </span>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    {{-- Calendar Start--}}

                    <!-- Calendar -->

                    <div class="flex items-center justify-center py-8 px-4">
                        <div class="max-w-sm w-full shadow-lg" id="calendarContainer">
                            <div class="md:p-8 p-5 bg-white rounded-t">
                                <div class="px-4 flex items-center justify-between">
                                    <span  tabindex="0" class="focus:outline-none text-base font-bold text-gray-800">October 2020</span>
                                    <div class="flex items-center">
                                        <button aria-label="calendar backward" class="focus:text-gray-400 hover:text-gray-400 text-gray-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="15 6 9 12 15 18" />
                                            </svg>
                                        </button>
                                        <button aria-label="calendar forward" class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="9 6 15 12 9 18" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-12 overflow-x-auto">
                                    <table class="w-full">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="w-full flex justify-center">
                                                    <p class="text-base font-medium text-center text-gray-800">Mo</p>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="w-full flex justify-center">
                                                    <p class="text-base font-medium text-center text-gray-800">Tu</p>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="w-full flex justify-center">
                                                    <p class="text-base font-medium text-center text-gray-800">We</p>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="w-full flex justify-center">
                                                    <p class="text-base font-medium text-center text-gray-800">Th</p>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="w-full flex justify-center">
                                                    <p class="text-base font-medium text-center text-gray-800">Fr</p>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="w-full flex justify-center">
                                                    <p class="text-base font-medium text-center text-gray-800">Sa</p>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="w-full flex justify-center">
                                                    <p class="text-base font-medium text-center text-gray-800">Su</p>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                            </td>
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                            </td>
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">1</p>
                                                </div>
                                            </td>
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">2</p>
                                                </div>
                                            </td>
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">3</p>
                                                </div>
                                            </td>
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">4</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">5</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">6</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">7</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="w-full h-full">
                                                    <div class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                        <a  role="link" tabindex="0" class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full">8</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">9</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">10</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">11</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">12</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">13</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">14</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">15</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">16</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">17</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">18</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">19</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">20</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">21</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">22</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">23</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">24</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500">25</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">26</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">27</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">28</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">29</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                    <p class="text-base text-gray-500 font-medium">30</p>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden md:py-8 py-5 md:px-16 px-5 dark:bg-gray-700 bg-gray-50 rounded-b">
                                <div class="px-4">
                                    <div class="border-b pb-4 border-gray-400 border-dashed">
                                        <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">9:00 AM</p>
                                        <a tabindex="0" class="focus:outline-none text-lg font-medium leading-5 text-gray-800 dark:text-gray-100 mt-2">Zoom call with design team</a>
                                        <p class="text-sm pt-2 leading-4 leading-none text-gray-600 dark:text-gray-300">Discussion on UX sprint and Wireframe review</p>
                                    </div>
                                    <div class="border-b pb-4 border-gray-400 border-dashed pt-5">
                                        <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">10:00 AM</p>
                                        <a tabindex="0" class="focus:outline-none text-lg font-medium leading-5 text-gray-800 dark:text-gray-100 mt-2">Orientation session with new hires</a>
                                    </div>
                                    <div class="border-b pb-4 border-gray-400 border-dashed pt-5">
                                        <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">9:00 AM</p>
                                        <a tabindex="0" class="focus:outline-none text-lg font-medium leading-5 text-gray-800 dark:text-gray-100 mt-2">Zoom call with design team</a>
                                        <p class="text-sm pt-2 leading-4 leading-none text-gray-600 dark:text-gray-300">Discussion on UX sprint and Wireframe review</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Calendar -->


                </div>
            </div>
        </div>
    </div>
        @else
        <!-- Card Section -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <!-- Card -->
                <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                    <div class="inline-flex justify-center items-center">
                        <span class="size-2 inline-block bg-gray-500 rounded-full me-2"></span>
                        <span class="text-xs font-semibold uppercase text-gray-600">Trainees</span>
                    </div>

                    <div class="text-center">
                        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                            {{ \App\Models\User::role('user')->count() }}
                        </h3>
                    </div>

                    <dl class="flex justify-center items-center divide-x divide-gray-200">
                        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              1.7%
            </span>
          </span>
                            <span class="block text-sm text-gray-500">change</span>
                        </dt>
                        <dd class="text-start ps-3">
                            <span class="text-sm font-semibold text-gray-800">5</span>
                            <span class="block text-sm text-gray-500">last week</span>
                        </dd>
                    </dl>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl">
                    <div class="inline-flex justify-center items-center">
                        <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
                        <span class="text-xs font-semibold uppercase text-gray-600">Total Checkins Today</span>
                    </div>

                    <div class="text-center">
                        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800">
                            {{ \App\Models\Attendance::whereDate('created_at', today())->count() }}
                        </h3>
                    </div>

                    <dl class="flex justify-center items-center divide-x divide-gray-200">
                        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
                            <span class="block text-sm text-gray-500">change</span>
                        </dt>
                        <dd class="text-start ps-3">
                            <span class="text-sm font-semibold text-gray-800">7</span>
                            <span class="block text-sm text-gray-500">last week</span>
                        </dd>
                    </dl>
                </div>
                <!-- End Card -->



            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Section -->
    @endif
</div>

    <!-- Pass blue and green dates dynamically -->
    <div id="blueDates" data-dates='@json(array_values(auth()->user()->attendances()->presentDays()))'></div>
    <div id="greenDates" data-dates='@json(array_values(auth()->user()->attendances()->absentDays()))'></div>

    <div>
        <x-dialog-modal wire:model.live="confirmingRecharge">
            <!-- Modal Title -->
            <x-slot name="title">

            </x-slot>

            <!-- Modal Content -->
            <x-slot name="content">

                <!-- Card -->
                <div class="shadow-xl shadow-gray-200 p-5 relative z-10 bg-white border rounded-xl md:p-10">
                    <h3 class="text-xl font-bold text-gray-800">Purchase Membership</h3>
                    <div class="text-sm text-gray-500">For wide range of benefits towards your physical and mental health</div>
                    <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3">Most popular</span>

                    <div class="mt-5">
                        <span class="text-6xl font-bold text-gray-800">₹{{ env('MEMBERSHIP_AMOUNT') }}</span>
                        <span class="text-lg font-bold text-gray-800">.00</span>
                        <span class="ms-3 text-gray-500">INR / monthly</span>
                    </div>

                    <div class="mt-5 grid sm:grid-cols-2 gap-y-2 py-4 first:pt-0 last:pb-0 sm:gap-x-6 sm:gap-y-0">
                        <!-- List -->
                        <ul class="space-y-2 text-sm sm:text-base">
                            <li class="flex space-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                <span class="text-gray-800">
                    Access to all gym equipments
                  </span>
                            </li>

                            <li class="flex space-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                <span class="text-gray-800">
                    Personalized workouts
                  </span>
                            </li>

                            <li class="flex space-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                <span class="text-gray-800">
                    Diet plan
                  </span>
                            </li>
                        </ul>
                        <!-- End List -->

                        <!-- List -->
                        <ul class="space-y-2 text-sm sm:text-base">
                            <li class="flex space-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                <span class="text-gray-800">
                    Personal trainer
                  </span>
                            </li>

                            <li class="flex space-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                <span class="text-gray-800">
                    Recommend workouts
                  </span>
                            </li>

                            <li class="flex space-x-3">
                  <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600">
                    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </span>
                                <span class="text-gray-800">
                    Fitness tracking
                  </span>
                            </li>
                        </ul>
                        <!-- End List -->
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-x-4 py-4 first:pt-0 last:pb-0">
                        <div>
                            <p class="text-sm text-gray-500">Cancel anytime.</p>
                            <p class="text-sm text-gray-500">No card required.</p>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" wire:click="rechargeFunds" wire:loading.attr="disabled" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Subscribe</button>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </x-slot>

            <!-- Modal Footer -->
            <x-slot name="footer">

            </x-slot>
        </x-dialog-modal>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        series: [{
            name: 'Series 1',
            data: {{ json_encode(auth()->user()->attendances()->dayWiseAttendance()->values()->toArray()) }},
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
