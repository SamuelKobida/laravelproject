<template>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <tr v-for="eshop in eshops" :value="eshop.id">
            <td>{{ eshop.id }}</td>
            <td>{{ eshop.name }}</td>
            <td> <button type="submit" class="btn btn-primary" @click="loadRules(eshop.id)"> Show rules </button> </td>
        </tr>


        </tbody>
    </table>


</template>

<script>
import axios from "axios";
import ConfirmDialogue from '../components/ConfirmDialogue.vue'
import InfoDialogue from '../components/InfoDialogue.vue'

export default {
    components: { ConfirmDialogue, InfoDialogue },

    name: "Index",

    data() {
        return{
            eshops: []
        }
    },
    mounted() {

        axios.get("http://localhost/laravelproject/public/api/eshops").then(response => {
            this.eshops = response.data;
            console.log(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    },

    methods: {
        loadRules($id) {
            this.$router.push({ name: 'rules', params: { id: $id }})
        }
    }

}
</script>

<style scoped>

</style>
