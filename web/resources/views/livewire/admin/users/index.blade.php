@php $count = 0 @endphp
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <!-- Table Section -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <!-- Card -->
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                                <!-- Header -->
                                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-800">
                                            Manage Users
                                        </h2>
                                        <p class="text-sm text-gray-600">
                                            List of all users in the system.
                                        </p>
                                    </div>

                                    <div>
                                        <div class="inline-flex gap-x-2">
                                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                                View all
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Header -->


                                @if(session()->has('success'))
                                    <div class="mx-4 mt-6 my-2 bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                                        <span class="font-bold">Success</span> {{ session('success') }}
                                    </div>
                                @endif

                                @if(session()->has('error'))
                                    <div class="mx-4 mt-6 my-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
                                        <span class="font-bold">Error</span> {{ session('error') }}
                                    </div>
                                @endif


                                <!-- Table -->
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="ps-6 py-3 text-start">
                                            <label for="hs-at-with-checkboxes-main" class="flex">
                                                <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-main">
                                                <span class="sr-only">Si No :</span>
                                            </label>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Name
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Type
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Email
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Income
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Actions
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Last Edit
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="hidden px-6 py-3 text-end"></th>
                                    </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200">
                                    @forelse(\App\Models\User::role('user')->get() as $user)
                                        @php $count++ @endphp
                                        <tr>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="ps-6 py-3">
                                                    <label for="hs-at-with-checkboxes-1" class="flex">
                                                        <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-1">
                                                        <span class="sr-only">Checkbox</span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600 flex items-center gap-3">
                                                        <img class="w-8 h-8 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                                        <span class="font-semibold text-gray-800">
                                                            {{ $user->name ?? 'Non' }}
                                                        </span>
                                                    </span>
                                                    @if($user->membership()->exists())
                                                        <span class="mt-2 py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                                </svg>
                                                                Subscribed User
                                                            </span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        @if($user->hasRole('user'))
                                                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                      <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
                      User
                    </span>
                                                        @else
                                                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                      <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                      Admin
                    </span>
                                                </div>
                                                @endif
                                                </span>
                            </div>
                            </td>

                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        <a class="text-gray-500" href="mailto:{{ $user->email }}">
                                                            {{ $user->email }}
                                                        </a>
                                                    </span>
                                </div>
                            </td>

                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        <a class="text-gray-700 font-semibold" href="mailto:{{ $user->email }}">
                                                            ₹ {{ $user->income }}
                                                        </a>
                                                    </span>
                                </div>
                            </td>

                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">

                                    <a href="{{ route('admin.users.attendance', ['user' => $user,]) }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                                        Attendance
                                    </a>

                                    <button data-hs-overlay="#hs-notifications-{{ $user->id }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M16 12a4 4 0 0 1-8 0"/></svg>
                                        Edit Card ID
                                    </button>

                                </div>
                            </td>

                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">
                                                        <span class="font-medium text-gray-800">
                                                            {{ $user->updated_at->diffForHumans() }}
                                                        </span>
                                                    </span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-1.5">
                                    <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                        <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2" aria-labelledby="hs-table-dropdown-1">
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span class="mb-3 flex rounded-lg gap-x-3 text-sm text-gray-800 font-semibold py-2 px-3 bg-gray-100">
                                                    Card ID : {{ $user->card }}
                                                </span>
                                                <a
                                                    href="{{ route('admin.users.attendance', ['user' => $user,]) }}"
                                                    class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                >
                                                    Attendance
                                                </a>
                                                <a
                                                    data-hs-overlay="#hs-notifications-{{ $user->id }}"
                                                    class="flex grow items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                >
                                                    Edit
                                                </a>

                                                @if($user->membership()->exists())
                                                <a
                                                    href="{{ route('invoice.show', ['id' => $user->membership->id]) }}"
                                                    class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                >
                                                    Download Invoice
                                                </a>
                                                @endif
                                            </div>
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>


                            <!-- Notification Modal -->

                            <div id="hs-notifications-{{ $user->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                    <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
                                        <div class="absolute top-2 end-2">
                                            <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-notifications-{{ $user->id }}">
                                                <span class="sr-only">Close</span>
                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                            </button>
                                        </div>

                                        <div class="p-4 sm:p-10 overflow-y-auto">
                                            <div class="mb-6 text-center">
                                                <h3 class="mb-2 text-xl font-bold text-gray-800">
                                                    Assigner Mode
                                                </h3>
                                                <p class="text-gray-500">
                                                    Please be aware that you are in assigner mode. You can assign students bus pass from particular cbms machine attached to the bus.
                                                </p>
                                            </div>

                                            <!-- Form -->
                                            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="mt-6 grid gap-4 lg:gap-6">
                                                    <div>
                                                        <label for="hs-work-email-hire-us-1" class="block mb-4 text-sm text-gray-700 font-medium">Card ID</label>
                                                        <input type="text" name="card" value="{{ $user->card }}" id="hs-work-email-hire-us-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                    </div>


                                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-notifications-{{ $user->id }}">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                        Save
                                                    </button>
                                                </div>
                                            </form>
                                            <!-- End Form -->
                                    </div>
                                </div>
                            </div>

                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="7">
                                    <div class="text-sm text-center text-gray-500">
                                        No attendance records found.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                            </tbody>
                            </table>
                            <!-- End Table -->

                            <!-- Footer -->
                            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                                <div>
                                    <p class="text-sm text-gray-600 ">
                                        Total of
                                        <span class="font-semibold text-gray-800">
                                                {{ $count }}
                                                </span> results
                                    </p>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">

                                        <a href="" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                            Prev
                                        </a>

                                        <a href="" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                            Next
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
</div>
</div>
</div>
