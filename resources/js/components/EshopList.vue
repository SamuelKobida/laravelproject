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
        <info-dialogue ref="infoDialogue"></info-dialogue>


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
            eshops: [],
            rules: []
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
            axios.get("http://localhost/laravelproject/public/api/specificRules/" + $id).then(response => {
                this.rules = response.data;
                if(this.rules.length !== 0) {
                    this.$router.push({ name: 'rules', params: { id: $id }})
                } else {
                    this.$refs.infoDialogue.show({
                        title: 'No rules found',
                        message: `There are no rules available for this eshop `,
                        okButton: 'Ok',
                    })
                }
            }).catch(function (error) {
                console.log(error);
            });
        },
        }

}
</script>

<style scoped>

</style>
