// Function to generate the calendar
function generateCalendar(year, month) {
    const container = document.getElementById('calendarContainer');
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDayOfMonth = new Date(year, month, 1).getDay();
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    let calendarHTML = `
        <div class="md:p-8 p-5 bg-white rounded-t">
            <div class="px-4 flex items-center justify-between">
                <span class="focus:outline-none text-base font-bold text-gray-800">${monthNames[month]} ${year}</span>
                <!-- Add your forward/backward buttons here -->
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
                            <th>Mo</th>
                            <th>Tu</th>
                            <th>We</th>
                            <th>Th</th>
                            <th>Fr</th>
                            <th>Sa</th>
                            <th>Su</th>
                        </tr>
                    </thead>
                    <tbody>
    `;

    let dayCounter = 1;

    // Loop through weeks
    for (let i = 0; i < 6; i++) {
        calendarHTML += '<tr>';

        // Loop through days of the week
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDayOfMonth) {
                calendarHTML += '<td></td>';
            } else if (dayCounter > daysInMonth) {
                calendarHTML += '<td></td>';
            } else {
                calendarHTML += `<td><div class="px-2 py-2 cursor-pointer flex w-full justify-center"><p class="text-base text-gray-500 font-medium">${dayCounter}</p></div></td>`;
                dayCounter++;
            }
        }

        calendarHTML += '</tr>';
    }

    calendarHTML += `
                    </tbody>
                </table>
            </div>
        </div>
    `;

    container.innerHTML = calendarHTML;
}

// Call the function with current month and year
const currentDate = new Date();
generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
