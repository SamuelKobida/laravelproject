<template>
    <form @submit.prevent="submit">

        <input type="text" v-model="fields.name" placeholder="Názov pravidla"><br>
        <input type="text" v-model="fields.value" placeholder="Vkladaná hodnota"><br>
        <input type="text" v-model="fields.priority" placeholder="Priorita"><br>

        <select type="text" v-model="fields.eshop_id" @change="nacitajKurierov(this.fields.eshop_id)">
            <option v-for="eshop in eshops" :value="eshop.id">
                {{ eshop.name }}
            </option>
        </select><br>

        <select type="text" v-model="fields.carrier_id" @change="nacitajKurierskeSluzby(this.fields.carrier_id)">
            <option v-for="carrier in carriers" :value="carrier.id">
                {{ carrier.name }}
            </option>
        </select><br>

        <select type="text" v-model="fields.carrier_service_id">
            <option v-for="carrier_service in carrier_services" :value="carrier_service.id">
                {{ carrier_service.name }}
            </option>
        </select><br>

        <select type="text" v-model="fields.subject_id">
            <option v-for="subject in subjects" :value="subject.id">
                {{ subject.name }}
            </option>
        </select><br>

        <select type="text" v-model="fields.predicate_id">
            <option v-for="predicate in predicates" :value="predicate.id">
                {{ predicate.name }}
            </option>
        </select><br>


        <button
            type="submit"
            className="btn btn-primary"
            @click="submit">
            Submit rule
        </button>
        <confirm-dialogue ref="confirmDialogue"></confirm-dialogue>
        <info-dialogue ref="infoDialogue"></info-dialogue>

    </form>

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
            /// Loading to AddRule
            predicates: [],
            subjects: [],
            carrier_services: [],
            eshops: [],
            carriers: [],
            /// Sending to RulesController
            fields: {
                name: '',
                value: '',
                priority: '',
                predicate_id: '',
                subject_id: '',
                carrier_service_id: '',
                carrier_id: '',
                eshop_id: '',
                isActive: '1',
            }

        }
    },
    mounted() {

        this.loadEshops();
        this.loadSubjects()
        this.loadPredicates()

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

        loadCarrier_services: function () {
            axios.get("http://localhost/laravelproject/public/api/carrier_services").then(response => {
                this.carrier_services = response.data;
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

        loadCarriers: function () {
            axios.get("http://localhost/laravelproject/public/api/carriers").then(response => {
                this.carriers = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        testicek() {
            let testicek = ""
            let sprava = ""
            if (this.fields.name.length < 1) {
                sprava = sprava + `Pole "Názov pravidla" nesmie byť prázdne!\n`
            } else {
                testicek = testicek + "j"
            }
            if (this.fields.value.length < 1) {
                sprava = sprava + `Pole "Vkladaná hodnota" nesmie byť prázdne!\n`
            } else {
                testicek = testicek + "e"
            }
            if (this.fields.priority % 1 !== 0) {
                sprava = sprava + `Pole "Priorita" musí obsahovať celé číslo!\n`
            } else {
                testicek = testicek + "t"
            }
            if (this.fields.priority <= 0) {
                sprava = sprava + `Pole "Priorita" musí obsahovať číslo väčšie ako 0!\n`
            } else {
                testicek = testicek + "o"
            }
            if (!this.fields.eshop_id) {
                sprava = sprava + `Eshop nebol vybraný!\n`
            } else {
                testicek = testicek + "o"
            }
            if (!this.fields.carrier_id) {
                sprava = sprava + `Kuriér nebol vybraný!\n`
            } else {
                testicek = testicek + "k"
            }
            if (!this.fields.carrier_service_id) {
                sprava = sprava + `Kuriérska služba nebola vybraná!\n`
            } else {
                testicek = testicek + "k"
            }
            if (!this.fields.subject_id) {
                sprava = sprava + `Subjekt nebol vybraný!\n`
            } else {
                testicek = testicek + ":"
            }
            if (!this.fields.predicate_id) {
                sprava = sprava + `Predikát nebol vybraný!\n`
            } else {
                testicek = testicek + ")"
            }
            if (testicek === "jetookk:)") {
                console.log(testicek)
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
            if (this.testicek()) {
                const ok = await this.$refs.confirmDialogue.show({
                    title: 'Submit rule',
                    message: `Naozaj chcete pridať nové pravidlo ?`,
                    okButton: 'Pridať',
                })
                if (ok) {
                    axios.post("./api/rulestore", this.fields)
                        .then(async (response) => {
                            const ok = await this.$refs.infoDialogue.show({
                                title: 'Submit rule',
                                message: `Úspešne ste pridali pravidlo`,
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

        nacitajKurierov: function (x) {
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

        nacitajKurierskeSluzby: function (x) {
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
