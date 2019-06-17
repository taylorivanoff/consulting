<template>
	<div class="row">
		<div class="col" v-for="day in days">
			<p>{{ day.name }}</p>
			<p>{{ day.date }}</p>
			<div class="row" v-for="slot in day.slots">
				<button
					class="btn w-100 m-1"
					:class="{
						'btn-success': slot.is_available,
						'btn-muted': !slot.is_available
					}"
					:disabled="!slot.is_available"
				>
					{{ slot.time }}
				</button>
			</div>
		</div>
	</div>
</template>

<script>
import moment from "moment";

export default {
	data () {
		return {
			days: []
		};
	},
	mounted() {
		axios.get('bookings')
            .then(response => {
            	this.days = response.data
            })
            .catch(error => {
                if (error.response) {
                	console.error(error.response.data)
                }
            })




		// get all times from next 5 days including today
		// this.addTimes();

		//
	},
	methods: {
		// addWeekdays(date, days) {
		// 	date = moment(date); // use a clone
		// 	while (days > 0) {
		// 		date = date.add(1, "days");
		// 		// decrease "days" only if it's a weekday.
		// 		if (date.isoWeekday() !== 6 && date.isoWeekday() !== 7) {
		// 			days -= 1;
		// 		}
		// 	}
		// 	return date;
		// },
		// addTimes() {
		// 	for (let day = 0; day < 5; day++) {
		// 		let date = moment().add()
		// 		date = this.addWeekdays(date, day)
		// 		this.days.push({
		// 			name: date.format("dddd"),
		// 			date: date.format("D/M/YY"),
		// 			hours: this.addHours()
		// 		});
		// 	}
		// },
		// addHours() {
		// 	let hours = [];
		// 	for (let hour = 10; hour < 19; hour++) {
		// 		hours.push(moment({ hour }).format("h:mm A"));
		// 	}
		// 	return hours;
		// }
	}
};
</script>
