<template>
    <form @submit.prevent="submit" novalidate>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <input
                        class="form-control badge-pill py-2 px-3"
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
            <div class="col pt-md-0 pt-2">
                <div class="input-group">
                    <button 
                            class="btn text-uppercase badge-pill py-1 px-3 w-75"
                            type="submit"
                            :class="{
                                'btn-dark': form.buttonStatus === 0,
                                'btn-success': form.buttonStatus === 2,
                            }"
                            :disabled="form.buttonStatus === 1"
                        >{{ form.buttonText }}</button>
                </div>
            </div>
        </div>
            
        <div class="input-group m-1" v-if="errors">
            <p class="text-danger"v-for="error in errors">{{error[0]}}</p>
        </div>
    </form>
</template>

<script>
    import { required, email } from 'vuelidate/lib/validators'

    export default {
        props: {
            title: String
        },
        data () {
            return {
                errors: {},
                form: {
                    email: '',
                    buttonStatus: 0,
                    buttonText: '',
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
        mounted () {
            this.form.buttonText = this.$props.title
        },
        methods: {
            submit () {
                this.$v.$touch()

                if (this.$v.$invalid) {
                    return
                }  

                // submitting
                this.form.buttonStatus = 1

                this.$recaptcha(this.slugify(this.$props.title))
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
                    this.form.email = ''
                    this.$v.$reset()

                    this.form.buttonStatus = 2
                    this.form.buttonText = 'Success'

                    setTimeout(() =>  {
                        this.form.buttonText = 'Check Your E-mail'
                        this.clear()
                    }, 3000);
                })
                .catch(error => {
                    if (error.response) {
                        this.form.buttonText = 'Error'
                        this.clear()

                        if (error.response.status === 422) {
                            this.clear()
                        }
                    }
                })
            },
            clear () {
                setTimeout(() =>  {
                    this.form.buttonStatus = 0
                    this.form.buttonText = this.$props.title
                }, 6000);
            },
            slugify(string) {
                const a = 'àáäâãåăæçèéëêǵḧìíïîḿńǹñòóöôœøṕŕßśșțùúüûǘẃẍÿź·/_,:;'
                const b = 'aaaaaaaaceeeeghiiiimnnnooooooprssstuuuuuwxyz______'
                const p = new RegExp(a.split('').join('|'), 'g')
                return string.toString().toLowerCase()
                .replace(/\s+/g, '_') // Replace spaces with -
                .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
                .replace(/&/g, '_and_') // Replace & with ‘and’
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '_') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, '') // Trim - from end of text
            }
        }
    }
</script>
