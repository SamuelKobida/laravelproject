<template>

    <div class=" container-sm p-3">
        <div class="card border-primary ">
            <div class="card-body">

                <form @submit.prevent="submit">

                    <div class="form-group">
                        <label class="m-1">Rule name</label>
                        <input class="form-control" v-model="fields.name" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label class="m-1">Value</label>
                        <input class="form-control" v-model="fields.value" placeholder="Enter value">
                    </div>

                    <div class="form-group">
                        <label class="m-1">Priority</label>
                        <input class="form-control" v-model="fields.priority" placeholder="Enter priority">
                    </div>

                    <div class="form-group">
                        <label class="m-1">eShop</label>
                        <select class="form-control" v-model="fields.eshop_id"
                                @change="loadCarriers(this.fields.eshop_id)">
                            <option v-for="eshop in eshops" :value="eshop.id"> {{ eshop.name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="m-1">Courier</label>
                        <select class="form-control" v-model="fields.carrier_id"
                                @change="loadCarrierServices(this.fields.carrier_id)">
                            <option v-for="carrier in carriers" :value="carrier.id"> {{ carrier.name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="m-1">Service</label>
                        <select class="form-control" v-model="fields.carrier_service_id">
                            <option v-for="carrier_service in carrier_services" :value="carrier_service.id"> {{
                                carrier_service.name }}
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="m-1">Subject</label>
                        <select class="form-control" v-model="fields.subject_id">
                            <option v-for="subject in subjects" :value="subject.id"> {{ subject.name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="m-1">Predicate</label>
                        <select class="form-control" v-model="fields.predicate_id">
                            <option v-for="predicate in predicates" :value="predicate.id"> {{ predicate.name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="m-1">Parent rule</label>
                        <select class="form-control" v-model="fields.parentrule_id">
                            <option v-for="parentrule in parentrules" :value="parentrule.id"> {{ parentrule.value }}
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" @click="submit">Submit</button>
                    <confirm-dialogue ref="confirmDialogue"></confirm-dialogue>
                    <info-dialogue ref="infoDialogue"></info-dialogue>

                </form>

            </div>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    import ConfirmDialogue from '../components/ConfirmDialogue.vue'
    import InfoDialogue from '../components/InfoDialogue.vue'

    export default {
        components: {ConfirmDialogue, InfoDialogue},

        name: "AddRule",

        data() {
            return {
                /// Loading to AddRule(CHOICES)
                predicates: [],
                subjects: [],
                carrier_services: [],
                eshops: [],
                carriers: [],
                parentrules: [],
                /// Sending (POST-FORM) to RulesController
                fields: {
                    name: '',
                    value: '',
                    priority: '',
                    predicate_id: '',
                    subject_id: '',
                    carrier_service_id: '',
                    carrier_id: '',
                    parentrule_id: '',
                    eshop_id: '',
                    isActive: '1',
                }
            }
        },
        mounted() {
            this.loadEshops();
            this.loadSubjects();
            this.loadPredicates();
            this.loadParentrules();
        },

        methods: {
            loadPredicates: function () {
                axios.get("http://localhost/laravelproject/public/api/predicates").then(response => {
                    this.predicates = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            loadSubjects: function () {
                axios.get("http://localhost/laravelproject/public/api/subjects").then(response => {
                    this.subjects = response.data;
                    //console.log(response.data);
                }).catch(function (error) {
                    console.log(error);
                });
            },

            loadEshops: function () {
                this.eshops = ""
                this.carriers = ""
                this.carrier_services = ""
                axios.get("http://localhost/laravelproject/public/api/eshops").then(response => {
                    this.eshops = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            loadParentrules: function () {
                axios.get("http://localhost/laravelproject/public/api/specificParentrules").then(response => {
                    console.log(response.data);
                    this.parentrules = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            inputTest() {
                let sprava = ""
                if (this.fields.name.length < 1) {
                    sprava = sprava + `'Rule name' cannot be empty!\n`
                }
                if (this.fields.value.length < 1) {
                    sprava = sprava + `'Value' cannot be empty!\n`
                }
                if (this.fields.priority % 1 !== 0) {
                    sprava = sprava + `'Priority' must be integer!\n`
                }
                if (this.fields.priority <= 0) {
                    sprava = sprava + `'Priority' must be more than 0!\n`
                }
                if (!this.fields.eshop_id) {
                    sprava = sprava + `'eShop' was not selected!\n`
                }
                if (!this.fields.carrier_id) {
                    sprava = sprava + `'Courier' was not selected!\n`
                }
                if (!this.fields.carrier_service_id) {
                    sprava = sprava + `'Service' was not selected!\n`
                }
                if (!this.fields.subject_id) {
                    sprava = sprava + `'Subject' was not selected!\n`
                }
                if (!this.fields.predicate_id) {
                    sprava = sprava + `'Predicate' was not selected!\n`
                }
                if (sprava === "") {
                    return true
                } else {
                    this.$refs.infoDialogue.show({
                        title: '',
                        message: sprava,
                        okButton: 'Ok',
                    })
                    return false
                }
            },

            async submit() {
                if (this.inputTest()) {
                    const ok = await this.$refs.confirmDialogue.show({
                        title: 'Submit rule',
                        message: `Are you sure you want to submit a new rule?`,
                        okButton: 'Submit rule',
                    })
                    if (ok) {
                        axios.post("./api/rulestore", this.fields)
                            .then(async (response) => {
                                const ok = await this.$refs.infoDialogue.show({
                                    title: 'Submit rule',
                                    message: `Rule successfully submitted!`,
                                    okButton: 'Ok',
                                })
                                window.location.reload()
                            }).catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        window.location.reload()
                    }
                }
            },

            loadCarriers: function (x) {
                this.carriers = ""
                this.fields.carrier_id = ""
                this.carrier_services = ""
                this.fields.carrier_service_id = ""
                axios.get(`http://localhost/laravelproject/public/api/specificCarriers/${x}`).then(response => {
                    this.carriers = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            loadCarrierServices: function (x) {
                this.carrier_services = ""
                this.fields.carrier_service_id = ""
                axios.get(`http://localhost/laravelproject/public/api/specificCarrierServices/${x}`).then(response => {
                    this.carrier_services = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
