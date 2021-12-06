<template>


        <nav class="navbar sticky-top navbar-expand-lg bg-primary"  >

                <div class="collapse navbar-collapse container-fluid" >

                    <ul class="navbar-nav ">

                        <li >
                            <router-link :to="{  name: 'home' }" class="nav-link text-light font-weight-bold">Home</router-link>
                        </li>
                        <li >
                            <router-link :to="{  name: 'index' }" class="nav-link text-light font-weight-bold">Rules</router-link>
                        </li>
                        <li >
                            <router-link :to="{ name: 'addrule' }" class="nav-link text-light font-weight-bold">AddRule</router-link>
                        </li>


                    </ul>
                </div>
        </nav>



</template>


<script>
import AddRule from "./AddRule";
import Index from "./Index";
import Home from "./Home";
export default {
    name: "Header",
    components: {
        Home,
        AddRule,
        Index
    }
}



</script>

<style scoped>

</style>
