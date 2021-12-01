<template>

    <nav class="navbar">
        <ul class="navBar_link">
            <li><router-link :to="{ name: 'index' }">index</router-link></li>
            <li><router-link :to="{ name: 'addrule' }">addrule</router-link></li>



        </ul>
    </nav>

</template>

<script>

export default {
    name: "Header",
    components: {

    }
}
</script>

<style scoped>

</style>
