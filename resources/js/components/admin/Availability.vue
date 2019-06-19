<template>
	<FullCalendar
		defaultView="timeGridWeek"

		:plugins="calendar.plugins"
		:minTime="calendar.minTime"
		:maxTime="calendar.maxTime"
		:events="calendar.events"
		:slotDuration="calendar.slotDuration"
		:timeZone="calendar.timeZone"

		:weekends="false"
		:nowIndicator=true
		:selectable=true

		@select="handleSelect"
	/>
</template>

<script>

import FullCalendar from "@fullcalendar/vue"
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
	components: {
		FullCalendar
	},
	data() {
		return {
			timer: '',
			calendar: {
				events: [],
				slotDuration: "01:00:00",
				timeZone: "Australia/Sydney",
				minTime: "9:00:00",
				maxTime: "18:00:00",
				plugins: [ timeGridPlugin, interactionPlugin ]
			},
		}
	},
	created() {
    	this.fetch()

    	this.timer = setInterval(this.fetch, 1000 * 5)
    },
	methods: {
		fetch () {
			axios.get('/bookings')
	            .then(response => {
	            	this.calendar.events = response.data
	            })
	            .catch(error => {
	                if (error.response) {
	                	console.error(error.response.data)
	                }
	            })
		},
		handleSelect (arg) {
			axios.post('/bookings', {
                    start: arg.start,
                    end: arg.end,
                    timezone: this.timeZone
                })
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
@import "~@fullcalendar/timegrid/main.css";
</style>
