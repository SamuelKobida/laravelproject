<template>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Value</th>
            <th scope="col">Priority</th>
            <th scope="col">eShop</th>
            <th scope="col">Service</th>
            <th scope="col">Predicate</th>
            <th scope="col">Subject</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>

        <tr v-for="rule in rules" :value="rule.id">
            <td>{{ rule.id }}</td>
            <td>{{ rule.name }}</td>
            <td>{{ rule.name_value }}</td>
            <td>{{ rule.priority }}</td>
            <td>{{ rule.eshop }}</td>
            <td>{{ rule.service }}</td>
            <td>{{ rule.predicate }}</td>
            <td>{{ rule.subject }}</td>
            <td class="text-success" v-if="rule.isActive">Active</td>
            <td class="text-danger" v-else>Inactive</td>

            <td> <button type="submit" class="btn btn-primary" @click="changeStatus(rule.id)">  Change status </button> </td>
            <td> <button class="btn btn-danger" @click="deleteRule(rule.id)">Delete</button> </td>

        </tr>


        </tbody>
    </table>


</template>

<script>
import axios from "axios";

export default {

    name: "Rules",

    data() {
        return{
            rules: [],
        }
    },

    props: {
        idEshopu: Number,
    },

    mounted() {
        console.log(this.$route.query)
        axios.get("http://localhost/laravelproject/public/api/specificRules/" + this.idEshopu).then(response => {
            this.rules = response.data;
            console.log(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    },

    methods: {

    }

}
</script>

<style scoped>

</style>
