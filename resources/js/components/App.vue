<template>

    <div class="header">

        <Header/>
        <router-view></router-view>
        <Footer/>

    </div>

</template>

<script>
    import Header from "./Header";
    import Footer from "./Footer";


    export default {
        components: {
            Header,
            Footer
        }
    }
</script>
