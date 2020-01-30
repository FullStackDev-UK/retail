<script>  
    import {HTTP} from '../http-common';

    export default {
        data() {
            return {
                errors: [],
                error: null,
                response: null,
                form: {
                    name: '',
                    email: '',
                    subject: null,
                    message: '',
                    checked: []
                },
                subjects: [{ text: 'Select One', value: null }, 'Product information', 'Order queries', 'Account support', 'Other - Specified below'],
                show: true,
                customMessages: []
            }
        },
        created(){
            console.log("Contact form created");
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                let data = {}
                data.name = this.form.name
                data.email = this.form.email
                data.subject = this.form.subject
                data.message = this.form.message

                HTTP.post('contact', data)
                    .then(response => {
                        this.response = response
                        if(response.status!==201){
                            this.errors.push(response.customMessages)
                        } else {
                            console.log(response.status, response.statusText, response.data)
                        }
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })

            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.email = ''
                this.form.name = ''
                this.form.subject = null
                this.form.message = ''
                this.form.checked = []
                // Trick to reset/clear native browser form validation state
                this.show = false
                this.$nextTick(() => {
                this.show = true
                })
            }
        }
    }
</script> 
<template>
    <div class="card justify-content-center">

        <div class="card-header"><h4>Contact us...</h4></div>

        <div class="card-body">

            <div class="panel panel-default">


                <h4 class="panel-heading vliheading">Please fill in and submit the form...</h4>

                <div class="panel-body">

                    <div class="shadow-md light-grey-bg mb-3">

                        <div v-if="errors.length">
                            <h5>Please correct the following...</h5>
                            <ul>
                                <li v-for="error in errors">
                                    {{error}}
                                    <!-- <div v-if="'{{error.data[0]}}'!==null"></div> -->
                                    <!-- <div v-if="error.email!==null">{{error.email[0]}}</div>
                                    <div v-if="error.subject!==null">{{error.subject[0]}}</div>
                                    <div v-if="error.message!==null">{{error.message[0]}}</div> -->
                                </li>
                            </ul>
                            <div v-if="this.response !== null">
                                {{this.response}}
                            </div>
                            <div v-if="this.customMessages.length!=0">
                                {{this.customMessages}}
                            </div>
                        </div>

                        <div v-else>
                            <b-form class="p-3" @submit="onSubmit" @reset="onReset" v-if="show">

                                <b-form-group id="input-group-1" label="Your Name:" label-for="input-1" description="Max. 50 chars.">

                                    <b-form-input id="input-1" v-model="form.name" required placeholder="Enter name"></b-form-input>

                                </b-form-group>

                                <b-form-group id="input-group-2" label="Email address:" label-for="input-2" description="We'll never share your email with anyone else.">

                                    <b-form-input id="input-2" v-model="form.email" type="email" required placeholder="Enter email"></b-form-input>

                                </b-form-group>

                                <b-form-group id="input-group-3" label="Subject:" label-for="input-3">

                                    <b-form-select id="input-3" v-model="form.subject" :options="subjects" required></b-form-select>

                                </b-form-group>

                                <b-form-group id="input-group-4" label="Message:" label-for="input-4" description="Max. 1000 chars.">

                                    <b-form-input id="input-4" v-model="form.message" required></b-form-input>

                                </b-form-group>

                                <b-form-group id="input-group-5">
                                    <b-form-checkbox-group v-model="form.checked" id="checkboxes-5">
                                        <b-form-checkbox value="YesContact">Would you like us to contact you back?</b-form-checkbox>
                                        <b-form-checkbox value="YesNewsletter">Subscribe to newsletter?</b-form-checkbox>
                                    </b-form-checkbox-group>
                                </b-form-group>

                                <b-button type="submit" variant="primary">Submit</b-button>
                                <b-button type="reset" variant="danger">Reset</b-button>                                    
                            </b-form>

                            <b-card class="mt-3" header="Form Data Result">
                                <pre class="m-0">{{ form }}</pre>
                            </b-card>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    
</template>

<style scoped>
</style>