import './bootstrap';

import { Calendar } from '@fullcalendar/core'
window.Calendar = Calendar;

import interactionPlugin from '@fullcalendar/interaction'
window.interactionPlugin = interactionPlugin;

import dayGridPlugin from '@fullcalendar/daygrid'
window.dayGridPlugin = dayGridPlugin;

import timeGridPlugin from "@fullcalendar/timegrid";
window.timeGridPlugin = timeGridPlugin;
