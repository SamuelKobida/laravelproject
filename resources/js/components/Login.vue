<template>


    <h1>Login to your account</h1>

    <label for="email">Your e-mail</label><br/>
    <input placeholder="Email" type="email" v-model="form.email"><br/>

    <label for="password">Password</label><br/>
    <input placeholder="Password" type="password" v-model="form.password" name="password"><br/>

    <button @click.prevent="loginUser" type="submit">Login</button>

</template>
<script>
export default {
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
             axios.post('./api/login', this.form).then(() =>{
                 this.$router.push({ name: "view"});
             }).catch((error) =>{
         this.errors = error.response.data.errors;
            })
         }
    }
}
</script>
