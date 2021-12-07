<template>

    <h1>Register an account</h1><br/>

    <label for="name">Name</label>
    <span v-if="errors.name">{{ errors.name[0] }}</span><br/>
    <input placeholder="Name" type="text" v-model="form.name"><br/>

    <label for="email">Your e-mail</label><br/>
    <input placeholder="Email" type="email" v-model="form.email"><br/>

    <label for="password">Password</label><br/>
    <input placeholder="Password" type="password" v-model="form.password" name="password"><br/>

    <label for="confirm_password">Confirm Password</label><br/>
    <input placeholder="Confirm Password" type="password" v-model="form.password_confirmation" name="password_confirmation"><br/>

    <button @click.prevent="saveForm" type="submit">Register</button>

</template>
<script>
export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password:'',
                password_confirmation:''
            },
            errors:[]
        }
    },
    methods:{
        saveForm(){
            axios.post('./api/register', this.form).then(() =>{
                console.log('saved');
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>
