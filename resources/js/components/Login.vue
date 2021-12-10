<template>


    <div class=" container-sm p-3">
        <div class="card border-primary ">

            <div class="card-header">
                Login:
            </div>

            <div class="card-body">
                <label for="email">Email</label>
                <input class="form-control" placeholder="Email" type="email" v-model="form.email"> <br/>

                <label for="password">Password</label>
                <input class="form-control" placeholder="Password" type="password" v-model="form.password"
                       name="password"> <br/>

                <button class="btn btn-primary" @click.prevent="loginUser" type="submit">Login</button>

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
                    email: '',
                    password: ''
                },
                errors: []
            }
        },
        methods: {
            loginUser() {
                let sprava = "";
                axios.post('./api/login', this.form).then(() => {
                    axios.get("http://localhost/laravelproject/public/api/authenticated/").then(() => {
                    this.$router.push({name: "index"});
                    }).catch(() => {
                        this.$refs.infoDialogue.show({
                            title: '',
                            message: "E-mail and/or password is incorrect. Please check your credentials and try again.",
                            okButton: 'Ok',
                        })
                    })
                }).catch((error) => {
                    this.errors = error.response.data.errors;
                    if (this.errors.email) {
                        sprava = sprava + this.errors.email + "\n"
                    }
                    if (this.errors.password) {
                        sprava = sprava + this.errors.password + "\n"
                    }
                    this.$refs.infoDialogue.show({
                        title: '',
                        message: sprava,
                        okButton: 'Ok',
                    })
                    //this.errors = error.response.data.errors;
                })
            }
        }
    }
</script>
