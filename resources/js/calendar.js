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
        const messageElementContainer = document.createElement('div');
        messageElementContainer.className='flex flex-row p-2 justify-between space-x-2  '
        // Check if this date is the current date
        const currentDate = new Date();
        if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
            dayElementContainer.classList.add('bg-azul-normal', 'text-white' ); // Add classes for the indicator
        }

        // verificar si existe una publicacion programada facebook 
        const publicationFacebook = planificacion.find(item => {
            const date = new Date(item.date_public_facebook);
            
            const publicar=date.getFullYear()+"-"+("0"+(date.getMonth()+1)).slice(-2)+"-"+("0" + (date.getDate()+1)).slice(-2);
            // console.log(publicar);
            const fecha = new Date (publicar);
            // console.log(fecha);
            return fecha.getFullYear() === year && fecha.getMonth() === month && fecha.getUTCDate() === day;
            
            
    
});

  // verificar si existe una publicacion programada instagram
  const publicationInstagram = planificacion.find(item => {
    const date = new Date(item.date_public_instagram);
    console.log(date)
    const publicar=date.getFullYear()+"-"+("0"+(date.getMonth()+1)).slice(-2)+"-"+("0" + (date.getDate()+1)).slice(-2);
    console.log(publicar);
    const fecha = new Date (publicar);
    console.log(fecha);
    return fecha.getFullYear() === year && fecha.getUTCMonth() === month && fecha.getUTCDate() === day;
    
    

});


        if (publicationFacebook) {
            
            const iconElement =document.createElement('div');
            iconElement.innerHTML ='<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>';
            
            iconElement.classList.add('fill-social-facebook');
            const messageElement =document.createElement('p');
            messageElement.className='text-xs text-left justify-start text-gris';
            
            const currentDate = new Date();
            if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
                iconElement.classList.add('fill-blanco' ); // Add classes for the indicator
            }
            dayElementContainer.appendChild(dayElement);
            dayElement.appendChild(messageElementContainer);
            messageElementContainer.appendChild(iconElement);
            // messageElementContainer.appendChild(messageElement);
        }
         else {
            dayElementContainer.appendChild(dayElement);
        }

       
        if (publicationInstagram) {
            // const messageElementContainer = document.createElement('div');
            // messageElementContainer.className='flex flex-row p-2 space-x-2  '
            const iconElement =document.createElement('div');
            
                iconElement.innerHTML ='<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>'
            
            
            iconElement.classList.add('fill-social-instagram');
            
            
            const currentDate = new Date();
            if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
                iconElement.classList.add('fill-blanco' ); // Add classes for the indicator
            }
            dayElementContainer.appendChild(dayElement);
            dayElement.appendChild(messageElementContainer);
            messageElementContainer.appendChild(iconElement);
           
        }
         else {
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

// REVISAR E IMPLENTAR MODAL CON INFORMACION RELEVANTE DE LAS PUBLICACIONES 
// function showModal(selectedDate) {
//     const modal = document.getElementById('myModal');
//     const modalDateElement = document.getElementById('modalDate');
//     const modalContentElement = document.getElementById('modalContent');
    
//     // Mostrar la fecha seleccionada en el modal
//     modalDateElement.innerText = selectedDate;

//     // Verificar si hay una publicación asociada con la fecha seleccionada
//     const selectedDateObj = new Date(selectedDate);
//     const selectedYear = selectedDateObj.getFullYear();
//     const selectedMonth = selectedDateObj.getMonth();
//     const selectedDay = selectedDateObj.getDate();

//     const publicationFacebook = planificacion.find(item => {
//         const date = new Date(item.date_public_facebook);
//         return date.getFullYear() === selectedYear && date.getMonth() === selectedMonth && date.getDate() === selectedDay;
//     });

//     const publicationInstagram = planificacion.find(item => {
//         const date = new Date(item.date_public_instagram);
//         return date.getFullYear() === selectedYear && date.getMonth() === selectedMonth && date.getDate() === selectedDay;
//     });

//     // Mostrar información correspondiente en el modal
//     if (publicationFacebook || publicationInstagram) {
//         // Si hay una publicación, mostrar información relevante
//         modalContentElement.innerHTML = 'Aquí va la información de la publicación.';
//     } else {
//         // Si no hay una publicación, mostrar un mensaje indicando que no hay publicación programada
//         modalContentElement.innerText = 'No hay una publicación programada para este día.';
//     }

//     // Mostrar el modal
//     modal.classList.remove('hidden');
// }
