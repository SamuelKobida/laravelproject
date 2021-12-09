<template>

    <div class=" container-sm p-3">
        <div class="card border-primary ">

            <div class="card-header">
                Register:
            </div>

            <div class="card-body">
                <label for="name">Name</label>
                <input class="form-control" placeholder="Name" type="text" v-model="form.name"><br/>

                <label for="email">Your e-mail</label>
                <input class="form-control" placeholder="Email" type="email" v-model="form.email"><br/>

                <label for="password">Password</label>
                <input class="form-control" placeholder="Password" type="password" v-model="form.password"
                       name="password"><br/>

                <label for="confirm_password">Confirm Password</label>
                <input class="form-control" placeholder="Confirm Password" type="password"
                       v-model="form.password_confirmation" name="password_confirmation"><br/>

                <button class="btn btn-primary" @click.prevent="saveForm" type="submit">Register</button>
                <info-dialogue ref="infoDialogue"></info-dialogue>
            </div>

        </div>
    </div>

</template>
<script>
    import InfoDialogue from "./InfoDialogue";

    export default {
        components: {InfoDialogue},
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: []
            }
        },
        methods: {
            saveForm() {
                let sprava = "";
                axios.post('./api/register', this.form).then(() => {
                    console.log('saved');
                }).catch((error) => {
                    this.errors = error.response.data.errors;
                    if (this.errors.name) {
                        sprava = sprava + this.errors.name + "\n"
                    }
                    if (this.errors.password) {
                        sprava = sprava + this.errors.password + "\n"
                    }
                    if (this.errors.email) {
                        sprava = sprava + this.errors.email + "\n"
                    }
                    sprava = sprava.replace(',', '\n');
                    this.$refs.infoDialogue.show({
                        title: '',
                        message: sprava,
                        okButton: 'Ok',
                    })
                })
            }
        }
    }
</script>
