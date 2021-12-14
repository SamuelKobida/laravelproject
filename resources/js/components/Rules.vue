<template>

    <div class=" container-fluid p-3">
        <div class="card border-primary ">

            <table class="table table-responsive-lg ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Value</th>
                    <th scope="col">Priority</th>
                    <th scope="col">eShop</th>
                    <th scope="col">Courier</th>
                    <th scope="col">Service</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Predicate</th>
                    <th scope="col">Parent rule</th>
                    <th scope="col">Status</th>
                    <th scope="col"><input type="text" placeholder="Filter rows"  v-model="filter" /></th>
                    <th scope="col"><button class="btn btn-primary" @click="back">Back</button></th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="rule in filteredRows" :value="rule.id">
                    <td>{{ rule.id }}</td>
                    <td>{{ rule.name }}</td>
                    <td>{{ rule.name_value }}</td>
                    <td>{{ rule.priority }}</td>
                    <td>{{ rule.eshop }}</td>
                    <td>{{ rule.courier }}</td>
                    <td>{{ rule.service }}</td>
                    <td>{{ rule.subject }}</td>
                    <td>{{ rule.predicate }}</td>
                    <td>{{ rule.parentrule }}</td>
                    <td class="text-success" v-if="rule.isActive">Active</td>
                    <td class="text-danger" v-else>Inactive</td>
                    <td>
                        <button type="submit" class="btn btn-primary" @click="changeStatus(rule.id)"> Change status
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" @click="deleteRule(rule.id)">Delete</button>
                    </td>

                    <confirm-dialogue ref="confirmDialogue"></confirm-dialogue>
                    <info-dialogue ref="infoDialogue"></info-dialogue>
                </tr>
                </tbody>

            </table>

        </div>
    </div>

</template>

<script>
    import axios from "axios";
    import ConfirmDialogue from '../components/ConfirmDialogue.vue'
    import InfoDialogue from '../components/InfoDialogue.vue'

    export default {
        components: {ConfirmDialogue, InfoDialogue},

        name: "Rules",

        data() {
            return {
                filter: "",
                rules: []
            }
        },
        mounted() {

            axios.get("http://localhost/laravelproject/public/api/specificRules/" + this.$route.params.id).then(response => {
                this.rules = response.data;
                console.log(response.data);
            }).catch(function (error) {
                console.log(error);
            });
        },
        computed: {
            filteredRows() {
                return this.rules.filter(row => {
                    const name = row.name.toString().toLowerCase();
                    const name_value = row.name_value.toString().toLowerCase();
                    const priority = row.priority.toString().toLowerCase();
                    const eshop = row.eshop.toString().toLowerCase();
                    const courier = row.courier.toString().toLowerCase();
                    const service = row.service.toString().toLowerCase();
                    const subject = row.subject.toString().toLowerCase();
                    const predicate = row.predicate.toString().toLowerCase();
                    const searchTerm = this.filter.toLowerCase();
                    return name.includes(searchTerm) ||
                        name_value.includes(searchTerm) ||
                        priority.includes(searchTerm) ||
                        eshop.includes(searchTerm) ||
                        courier.includes(searchTerm) ||
                        service.includes(searchTerm) ||
                        subject.includes(searchTerm) ||
                        predicate.includes(searchTerm);
                });
            }
        },
        methods: {
            back(){
                this.$router.push({name: "eshoplist"});
            },
            async deleteRule(id) {
                const ok = await this.$refs.confirmDialogue.show({
                    title: 'Delete rule',
                    message: `Are you sure, you want to delete rule ${id} ?`,
                    okButton: 'Delete rule',
                })
                if (ok) {
                    axios.delete(`../api/rules/delete/${id}`)
                        .then(async (response) => {
                            const ok = await this.$refs.infoDialogue.show({
                                title: 'Delete rule',
                                message: `Rule successfully deleted! `,
                                okButton: 'Ok',
                            })
                            window.location.reload()
                        }).catch(function (error) {
                        console.log(error);
                    });
                } else {
                }
            },
            async changeStatus(id) {
                const ok = await this.$refs.confirmDialogue.show({
                    title: 'Change rule status',
                    message: `Are you sure, you want to change status for rule ${id} ?`,
                    okButton: 'Change status',
                })
                if (ok) {
                    axios.post(`../api/rules/changeStatus/${id}`)
                        .then(async (response) => {
                            const ok = await this.$refs.infoDialogue.show({
                                title: 'Status changed',
                                message: `Rule status successfully changed!`,
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
