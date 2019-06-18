<template>
	<FullCalendar
		defaultView="timeGridWeek"
		:plugins="calendarPlugins"
		:minTime="calendar.minTime"
		:maxTime="calendar.maxTime"
		@select="handleSelect"
		:selectable="true"
	/>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction'; // for selectable

export default {
	components: {
		FullCalendar
	},
	data() {
		return {
			availability: [],
			calendar: {
				minTime: "10:00:00",
				maxTime: "18:00:00"
			},
			calendarPlugins: [timeGridPlugin, interactionPlugin]
		};
	},
	methods: {
		handleSelect(arg) {
			axios.post('/bookings', {
                    start: arg.start,
                    end: arg.end
                })
                .then(response => {
                	console.log(response.data)
                	this.availability = response.data
                })
                .catch(error => {
                    if (error.response) {
                    	console.error(error.response.data)
                    }
                })
		},
		handleDateClick(arg) {
			alert(arg.date);
		}
	}
};
</script>

<style lang="scss">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";
@import "~@fullcalendar/timegrid/main.css";
</style>
