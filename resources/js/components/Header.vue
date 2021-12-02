<template>

    <nav>
        <ul>
            <li><router-link :to="{ name: 'home' }">home</router-link></li>
            <li><router-link :to="{ name: 'index' }">index</router-link></li>
            <li><router-link :to="{ name: 'addrule' }">addrule</router-link></li>
        </ul>
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
