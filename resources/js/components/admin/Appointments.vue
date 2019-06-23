<template>
	<div class="my-3">
		<p class="h1">Upcoming Appointments</p>

		<FullCalendar
			defaultView="timeGridWeek"
			:minTime="calendar.minTime"
			:maxTime="calendar.maxTime"
			:plugins="calendar.plugins"
			:events="calendar.events"
			:timeZone="calendar.timeZone"
		
		/>
	</div>
</template>

<script>

import FullCalendar from "@fullcalendar/vue"
import timeGridPlugin from '@fullcalendar/timegrid'

export default {
	components: {
		FullCalendar
	},
	data() {
		return {
			timer: '',
			calendar: {
				events: [],
				minTime: "9:00:00",
				maxTime: "19:00:00",
				timeZone: "Australia/Sydney",
				plugins: [ timeGridPlugin ]
			},
		}
	},
	created() {
    	this.fetch()

    	this.timer = setInterval(this.fetch, 1000 * 4)
    },
	methods: {
		fetch () {
			axios.get('appointments')
	            .then(response => {
	            	this.calendar.events = response.data
	            })
	            .catch(error => {
	                if (error.response) {
	                	console.error(error.response.data)
	                }
	            })
		}
	}
}
</script>

<style lang="scss">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";
</style>
