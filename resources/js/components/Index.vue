<template>

    <table>
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Názov pravidla
            </th>
            <th>
                Vkladaná hodnota
            </th>
            <th>
                Priorita
            </th>
            <th>
                Kurierska služba
            </th>
            <th>
                Eshop
            </th>
            <th>
                Subject
            </th>
            <th>
                Predicate
            </th>


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

        </tr>

        </tbody>
    </table>


</template>

<script>
import axios from "axios";

export default {
    name: "Index",

    data() {
        return{
            rules: []
        }
    },
    mounted() {

        axios.get("http://localhost/laravelproject/public/api/rules").then(response => {
            this.rules = response.data;
            console.log(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    },

}
</script>

<style scoped>

</style>
