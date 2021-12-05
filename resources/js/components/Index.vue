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
                E-shop
            </th>
            <th>
                Kuriérska služba
            </th>
            <th>
                Predicate
            </th>
            <th>
                Subject
            </th>
            <th>
                Status
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
            <td style="color: green" v-if="rule.isActive">Active</td>
            <td style="color: red" v-else>Inactive</td>
            <button
                type="submit"
                class="btn btn-primary"
                @click="editRule(rule.id)">
                Change status
            </button>
            <button class="btn btn-danger" @click="deleteRule(rule.id)">Delete rule</button>
            <confirm-dialogue ref="confirmDialogue"></confirm-dialogue>
            <info-dialogue ref="infoDialogue"></info-dialogue>
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

    methods: {
        async deleteRule(id) {
            const ok = await this.$refs.confirmDialogue.show({
                title: 'Delete rule',
                message: `Naozaj chcete odstrániť pravidlo s ID ${id} ?`,
                okButton: 'Odstrániť',
            })
            if (ok) {
                axios.delete(`./api/rules/delete/${id}`)
                    .then(async (response) => {
                        const ok = await this.$refs.infoDialogue.show({
                            title: 'Delete rule',
                            message: `Úspešne ste odstránili pravidlo`,
                            okButton: 'Ok',
                        })
                        window.location.reload()
                    }).catch(function (error) {
                    console.log(error);
                });
            } else {
            }
        },
        async editRule(id) {
            const ok = await this.$refs.confirmDialogue.show({
                title: 'Change rule status',
                message: `Naozaj chcete zmeniť stav pravidla s ID ${id} ?`,
                okButton: 'Zmeniť',
            })
            if (ok) {
                axios.post(`./api/rules/changeStatus/${id}`)
                    .then(async (response) => {
                        const ok = await this.$refs.infoDialogue.show({
                            title: 'Delete rule',
                            message: `Úspešne ste zmenili stav pravidla`,
                            okButton: 'Ok',
                        })
                        window.location.reload()
                    }).catch(function (error) {
                    console.log(error);
                });
            } else {
            }
        },
    }

}
</script>

<style scoped>

</style>
