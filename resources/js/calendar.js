// Function to generate the calendar for a specific month and year
function generateCalendar(year, month) {
    const calendarElement = document.getElementById('calendar');
    const planificacion = JSON.parse(calendarElement.dataset.publicaciones);
    console.log(planificacion);
    const currentMonthElement = document.getElementById('currentMonth');

    // Create a date object for the first day of the specified month
    const firstDayOfMonth = new Date(year, month, 1);
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Clear the calendar
    calendarElement.innerHTML = '';

    // Set the current month text
    const monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'August', 'September', 'October', 'November', 'December'];
    currentMonthElement.innerText = `${monthNames[month]} ${year}`;

    // Calculate the day of the week for the first day of the month (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
    const firstDayOfWeek = firstDayOfMonth.getDay();

    // Create headers for the days of the week
    const daysOfWeek = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
    daysOfWeek.forEach(day => {
        const dayElement = document.createElement('div');
        dayElement.className = 'text-center font-semibold';
        dayElement.innerText = day;
        calendarElement.appendChild(dayElement);
    });

    // Create empty boxes for days before the first day of the month
    for (let i = 0; i < firstDayOfWeek; i++) {
        const emptyDayElement = document.createElement('div');
        calendarElement.appendChild(emptyDayElement);
    }

    // Create boxes for each day of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayElementContainer = document.createElement('div');
        dayElementContainer.className = ' flex flex-col w-auto h-full border cursor-pointer transition-colors duration-300 ease-in-out hover:bg-gray-200';

        const dayElement = document.createElement('div');
        dayElement.className = 'text-start px-2 py-2 ';
        dayElement.innerText = day;
      
        // Check if this date is the current date
        const currentDate = new Date();
        if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
            dayElementContainer.classList.add('bg-azul-normal', 'text-white' ); // Add classes for the indicator
        }

        // Check if there is a publication for this day
        const publication = planificacion.find(item => {
            const date = new Date(item.date_public_facebook);
            console.log(date);
            return date.getFullYear() === year && date.getMonth() === month && date.getDate() === day;
            
        });

        if (publication) {
            const messageElementContainer = document.createElement('div');
            messageElementContainer.className='flex flex-row p-2 space-x-2 '
            const iconElement =document.createElement('img');
            iconElement.src ='<svg xmlns="http://www.w3.org/2000/svg" with="8" height="8" viewBox="0 0 512 512"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>'
            const messageElement =document.createElement('p');
            messageElement.className='text-xs text-left justify-start text-gris';
            messageElement.innerText = 'f ';

            dayElementContainer.appendChild(dayElement);
            dayElement.appendChild(messageElementContainer);
            messageElementContainer.appendChild(iconElement);
            messageElementContainer.appendChild(messageElement);
        } else {
            dayElementContainer.appendChild(dayElement);
        }

        // Agrega evento hover a los días del calendario
        dayElement.addEventListener('mouseover', function () {
            dayElement.classList.add('bg-gray-200'); // Cambia el color de fondo al pasar el mouse
        });

        dayElement.addEventListener('mouseout', function () {
            dayElement.classList.remove('bg-gray-200'); // Reestablece el color de fondo al salir del hover
        });

        calendarElement.appendChild(dayElementContainer);
    }
}

// Resto del código para inicializar el calendario y otros eventos...

// Initialize the calendar with the current month and year
const currentDate = new Date();
let currentYear = currentDate.getFullYear();
let currentMonth = currentDate.getMonth();
generateCalendar(currentYear, currentMonth);

// Event listeners for previous and next month buttons
document.getElementById('prevMonth').addEventListener('click', () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    generateCalendar(currentYear, currentMonth);
});

document.getElementById('nextMonth').addEventListener('click', () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    generateCalendar(currentYear, currentMonth);
});

// Function to show the modal with the selected date
function showModal(selectedDate) {
    const modal = document.getElementById('myModal');
    const modalDateElement = document.getElementById('modalDate');
    modalDateElement.innerText = selectedDate;
    modal.classList.remove('hidden');
}

// Function to hide the modal
function hideModal() {
    const modal = document.getElementById('myModal');
    modal.classList.add('hidden');
}

// Event listener for date click events
const dayElements = document.querySelectorAll('.cursor-pointer');
dayElements.forEach(dayElement => {
    dayElement.addEventListener('click', () => {
        const day = parseInt(dayElement.innerText);
        const selectedDate = new Date(currentYear, currentMonth, day);
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = selectedDate.toLocaleDateString(undefined, options);
        showModal(formattedDate);
    });
});

// Event listener for closing the modal
document.getElementById('closeModal').addEventListener('click', () => {
    hideModal();
});
