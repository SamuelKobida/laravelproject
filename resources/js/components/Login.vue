<template>


    <h1>Login to your account</h1>

    <label for="email">Your e-mail</label><br/>
    <input placeholder="Email" type="email" v-model="form.email"><br/>

    <label for="password">Password</label><br/>
    <input placeholder="Password" type="password" v-model="form.password" name="password"><br/>

    <button @click.prevent="loginUser" type="submit">Login</button>
    <info-dialogue ref="infoDialogue"></info-dialogue>

</template>
<script>
import InfoDialogue from "./InfoDialogue";

export default {
    components: {InfoDialogue},
    data(){
        return{
            form:{
                email: '',
                password: ''
            },
            errors: []
        }
    },
    methods:{
         loginUser(){
             let sprava = "";
             axios.post('./api/login', this.form).then(() =>{
                 this.$router.push({ name: "home"});
             }).catch((error) =>{
                 this.errors = error.response.data.errors;
                 if(this.errors.email) {
                     sprava = sprava + this.errors.email + "\n"
                 }
                 if(this.errors.password) {
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
