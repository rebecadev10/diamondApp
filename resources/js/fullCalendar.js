import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';


document.addEventListener('DOMContentLoaded',function(){
  let calendarEl = document.getElementById('calendar');
let calendar = new Calendar(calendarEl, {
  plugins: [ dayGridPlugin, timeGridPlugin, listPlugin ],
  initialView: 'dayGridMonth',
  locale: 'es',
  height: 580,
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,listWeek',
   
  },
  events: 'planificacion/events',
});
calendar.render();
})
// let calendarEl = document.getElementById('calendar');
// let calendar = new Calendar(calendarEl, {
//   plugins: [ dayGridPlugin, timeGridPlugin, listPlugin ],
//   initialView: 'dayGridMonth',
//   locale: 'es',
//   height: 580,
//   headerToolbar: {
//     left: 'prev,next today',
//     center: 'title',
//     right: 'dayGridMonth,timeGridWeek,listWeek',
   
//   },
//   events:@json($events)
// });
// calendar.render();