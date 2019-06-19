<template>
	<div>
		<form @submit.prevent="submit" novalidate v-if="!success">
			<div class="row">
				<div class="col-lg-6">
					<h6 class="my-3">Enter your details.</h6>

					<div class="form-group row">
					    <label class="col-sm-2 col-form-label">Name:</label>
					    <div class="col-sm-10">
					      <input
		                    class="form-control badge-pill p-2"
		                    type="text"
		                    placeholder="John Smith"
		                    v-model="$v.form.name.$model"
		                    :class="{
		                        'is-invalid': $v.form.name.$error,
		                        'is-valid': !$v.form.name.$invalid
		                    }"
		                >
					    </div>
					  </div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">E-mail:</label>
					    <div class="col-sm-10">
							<input
			                    class="form-control badge-pill p-2"
			                    type="email"
			                    placeholder="name@company.com"
			                    v-model="$v.form.email.$model"
			                    :class="{
			                        'is-invalid': $v.form.email.$error,
			                        'is-valid': !$v.form.email.$invalid
			                    }"
			                >
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Phone:</label>
					    <div class="col-sm-10">
							<input
			                    class="form-control badge-pill p-2"
			                    type="tel"
			                    placeholder="+61412345678"
			                    v-model="$v.form.phone.$model"
			                    :class="{
			                        'is-invalid': $v.form.phone.$error,
			                        'is-valid': !$v.form.phone.$invalid
			                    }"
			                >
						</div>
					</div>
				</div>

				<div class="col-lg-12 py-3">
					<h6>Select a time slot below to schedule a call.</h6>
					<appointment-table @appointmentClicked="set"></appointment-table>
				</div>
			</div>
		</form>

		<div v-if="success">
			<div class="container">
			    <div class="row justify-content-center">
			        <div class="col-md-8 my-4 text-center">
			            <p class="h1">Thank you for scheduling a call.</p>
			            <p>Please check your e-mail for details.</p>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</template>

<script>
import { alpha, required, email, alphaNum } from 'vuelidate/lib/validators'

export default {
	data () {
		return {
			success: false,
			form: {
				name: '',
				email: '',
				phone: '',
				booking: '',
			},
		};
	},
	validations: {
        form: {
            name: {
                required	
            },
            email: {
                required, email
            },
            phone: {
                required
            }
        }
    },
	methods: {
		submit () {
			this.$v.$touch()

            if (this.$v.$invalid) {
                return
            }  

			axios.post('/appointments', {
                    name: this.form.name,
                    email: this.form.email,
                    phone: this.form.phone,
                    booking: this.form.booking
                })
                .then(response => {
                	this.success = true
                })
                .catch(error => {
                    if (error.response) {
                    	console.error(error.response.data)
                    }
                })
		},
		set (id) {
			this.form.booking = id
		}
	}
};
</script>
