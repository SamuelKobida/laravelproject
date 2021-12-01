<template>

    <div class="header">

        <Header/>
        <router-view></router-view>
        <div class="container">

        </div>

    </div>

</template>

<script>
    import Header from "./Header";


    export default {
        components: {

            Header,

        }
    }
</script>
