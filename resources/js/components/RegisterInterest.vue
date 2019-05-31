<template>
    <form @submit.prevent="submit" novalidate>
        <div class="input-group">
            <input
                class="form-control badge-pill py-3 pl-md-3 pl-2"
                type="email"
                placeholder="name@company.com"
                v-model="$v.form.email.$model"
                :class="{
                    'is-invalid': $v.form.email.$error,
                    'is-valid': !$v.form.email.$invalid
                }"
            >
            <div class="input-group-append">
                <button 
                    class="btn text-uppercase badge-pill py-2 pl-md-3 pr-md-3 pl-2 pr-2"
                    type="submit"
                    :class="{
                        'btn-danger': form.buttonStatus === 0,
                        'btn-success': form.buttonStatus === 1,
                    }"
                >{{form.buttonText}}</button>
            </div>
        </div>

        <div class="input-group m-1" v-if="errors">
            <p class="text-danger"v-for="error in errors">{{error[0]}}</p>
        </div>

        <small class="mt-2 text-secondary" >This site is protected by reCAPTCHA and the Google 
            <a href="https://policies.google.com/privacy">Privacy Policy</a> and
            <a href="https://policies.google.com/terms">Terms of Service</a> apply.
        </small>
    </form>

</template>

<script>
    import { required, email } from 'vuelidate/lib/validators'

    export default {
        data () {
            return {
                errors: {},
                form: {
                    email: '',
                    buttonText: "I'm Interested",
                    buttonStatus: 0,
                }
            }
        },
        validations: {
            form: {
                email: {
                    required, email
                }
            }
        },
        methods: {
            submit () {
                this.$v.$touch()

                if (this.$v.$invalid) {
                    return
                }  

                this.form.buttonText = "Registering..."

                this.$recaptcha('register_interest')
                    .then((token) => {
                        this.verify(token)
                    })
                    .then(() => {
                        this.store()
                    })
            },
            verify (token) {
                axios.post('auth/recaptcha', {
                    token: token
                })
            },
            store () {
                axios.post('leads', {
                    email: this.form.email
                })
                .then(response => {
                    this.form.buttonStatus = 1
                    this.form.buttonText = "Registered!"

                    this.clear()
                })
                .catch(error => {
                    if (error.response) {
                        this.form.buttonText = "Error"
                        this.form.buttonStatus = 0
                        this.clear()

                        if (error.response.status === 422) {
                            this.form.buttonText = "Already Registered"
                        }
                    }
                })
            },
            clear () {
                setTimeout(() =>  {
                    this.form.email = ''
                    this.$v.$reset()

                    this.form.buttonStatus = 0
                    this.form.buttonText = "I'm Interested"
                }, 5000);
            }
        }
    }
</script>
