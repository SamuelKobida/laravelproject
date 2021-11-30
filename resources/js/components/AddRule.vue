<template>
    <form method="post" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="Názov pravidla"><br>
        <input type="text" name="value" placeholder="Vkladaná hodnota"><br>
        <input type="text" name="priority" placeholder="Priorita"><br>

        <select type="text" name="carrier_service_id">
            <option v-for="carrier_service in carrier_services" :value="carrier_service.id">
                {{ carrier_service.name }}
            </option>
        </select><br>

        <select type="text" name="eshop_id">
            <option v-for="eshop in eshops" :value="eshop.id">
                {{ eshop.name }}
            </option>
        </select><br>

        <select type="text" name="subject_id">
            <option v-for="subject in subjects" :value="subject.id">
                {{ subject.name }}
            </option>
        </select><br>

        <select type="text" name="predicate_id">
            <option v-for="predicate in predicates" :value="predicate.id">
                {{ predicate.name }}
            </option>
        </select><br>


        <input type="submit" value="Ulozit">

    </form>

</template>

<script>
import axios from 'axios';
export default {
    name: "AddRule",

    data() {
        return{
            predicates: [],
            subjects: [],
            carrier_services: [],
            eshops: [],
        }
    },
    mounted() {
    this.loadPredicates();
    this.loadSubjects();
    this.loadEshops();
    this.loadCarrier_services();
    },
    methods: {
        loadPredicates: function (){
            axios.get("http://localhost/laravelproject/public/api/predicates").then(response => {
                this.predicates = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        loadSubjects: function (){
            axios.get("http://localhost/laravelproject/public/api/subjects").then(response => {
                this.subjects = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        loadCarrier_services: function (){
            axios.get("http://localhost/laravelproject/public/api/carrier_services").then(response => {
                this.carrier_services = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        loadEshops: function (){
            axios.get("http://localhost/laravelproject/public/api/eshops").then(response => {
                this.eshops = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },
    }
}
</script>

<style scoped>

</style>
