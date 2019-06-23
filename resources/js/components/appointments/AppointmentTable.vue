<template>
	<div id="contact">
		<p class="text-muted text-right">Timezone: <strong>Australia/Sydney</strong></p>

		<div class="row border">
			<div class="col-xs-12 col-lg  p-2 m-1" v-for="appointment in appointments" v-if="appointments.length">
				<div class="text-center border-bottom">
					<h5 class="mb-1">{{ appointment.name }}</h5>
					<h6>{{ appointment.date }}</h6>
				</div>
				<div class="text-center" v-for="slot in appointment.slots">
					<button
						class="btn btn-slot my-1"
						type="submit"
						:id="slot.id"
						:class="{
							'btn-success': slot.is_available,
							'btn-muted': !slot.is_available,
						}"
						:disabled="!slot.is_available"
						@click="$emit('appointmentClicked', $event.target.id)"
					>
						{{ slot.time }}
					</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

export default {
	data () {
		return {
			timer: '',
			appointments: [],
		};
	},
    created() {
    	this.fetch()
    	this.timer = setInterval(this.fetch, 1000 * 4)
    },
	methods: {
		fetch () {
			axios.get('/appointments')
	            .then(response => {
	            	this.appointments = response.data
	            })
	            .catch(error => {
	                if (error.response) {
	                	console.error(error.response.data)
	                }
	            })
		},
	}
};
</script>
