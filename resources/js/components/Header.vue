<template>

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <li>
                    <router-link :to="{  name: 'home' }" class="nav-link text-light font-weight-bold">Home</router-link>
                </li>
                <li>
                    <router-link :to="{  name: 'index' }" class="nav-link text-light font-weight-bold">Rules
                    </router-link>
                </li>
                <li>
                    <router-link :to="{  name: 'parentrules' }" class="nav-link text-light font-weight-bold">Parent rules
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'addrule' }" class="nav-link text-light font-weight-bold">Add a rule
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'eshoplist' }" class="nav-link text-light font-weight-bold">eShops
                    </router-link>
                </li>
                <li>
                    <router-link v-if="this.checklogin === 0" :to="{ name: 'login' }"
                                 class="nav-link text-light font-weight-bold border-left">Login
                    </router-link>
                </li>
                <li>
                    <a style="cursor: pointer" v-if="this.checklogin === 1" class="nav-link text-light font-weight-bold border-left "
                       @click.prevent="logout">Logout</a>
                </li>
                <li>
                    <router-link v-if="this.checklogin === 0" :to="{ name: 'register' }"
                                 class="nav-link text-light font-weight-bold ">Register
                    </router-link>
                </li>

            </div>
        </div>

    </nav>

</template>


<script>
    import AddRule from "./AddRule";
    import Index from "./Index";
    import Home from "./Home";
    import EshopList from "./EshopList";
    import Login from "./Login";
    import Register from "./Register";
    import ParentRules from "./ParentRules";

    export default {
        name: "Header",
        components: {
            Home,
            AddRule,
            Index,
            EshopList,
            Login,
            Register,
            ParentRules
        },

        data() {
            return {
                checklogin: ""
            }
        },

        methods: {
            logout() {
                axios.post('http://localhost/laravelproject/public/api/logout').then(() => {
                    this.$router.push({name: "home"})
                    this.checklogin = 0
                })
            }
        },
        watch: {
            $route() {
                axios.get("http://localhost/laravelproject/public/api/authenticated/").then(() => {
                    this.checklogin = 1
                }).catch(() => {
                    this.checklogin = 0
                })
            },
        },
        created() {
            axios.get("http://localhost/laravelproject/public/api/authenticated/").then(() => {
                this.checklogin = 1
            }).catch(() => {
                this.checklogin = 0
            })
        },
    }

</script>

<style scoped>

</style>
