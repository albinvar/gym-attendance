// Function to generate the calendar
function generateCalendar(year, month, blueDates, greenDates) {
    const container = document.getElementById('calendarContainer');
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDayOfMonth = new Date(year, month, 1).getDay();
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    let calendarHTML = `
        <div class="md:p-8 p-5 bg-white rounded-t">
            <div class="px-4 flex items-center justify-between">
                <span class="focus:outline-none text-base font-bold text-gray-800">${monthNames[month]} ${year}</span>
                <!-- Add your forward/backward buttons here -->
            </div>
            <div class="flex items-center justify-between pt-12 overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Su</th>
                            <th>Mo</th>
                            <th>Tu</th>
                            <th>We</th>
                            <th>Th</th>
                            <th>Fr</th>
                            <th>Sa</th>
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
                // Check if the current date is in the blueDates array
                if (blueDates.includes(dayCounter)) {
                    calendarHTML += `<td><div class="px-2 py-2 cursor-pointer flex w-full justify-center"><p class="text-base text-green-500 font-medium">${dayCounter}</p></div></td>`;
                }
                // Check if the current date is in the greenDates array
                else if (greenDates.includes(dayCounter)) {
                    calendarHTML += `<td><div class="w-full h-full">
                                            <div class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                <a  role="link" tabindex="0" class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-red-400 focus:bg-red-500 hover:bg-red-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-red-600 rounded-full">
                                                ${dayCounter}
                                                </a>
                                            </div>
                                        </div></td>`;
                }
                // Default styling for other dates
                else {
                    calendarHTML += `<td><div class="px-2 py-2 cursor-pointer flex w-full justify-center"><p class="text-base text-gray-500 font-medium">${dayCounter}</p></div></td>`;
                }
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

// Retrieve blue and green dates from the HTML attributes
const blueDates = JSON.parse(document.getElementById('blueDates').getAttribute('data-dates'));
const greenDates = JSON.parse(document.getElementById('greenDates').getAttribute('data-dates'));

// Call the function with current month and year, along with blue and green dates
const currentDate = new Date();
generateCalendar(currentDate.getFullYear(), currentDate.getMonth(), blueDates, greenDates);
