<template>

    <Header/>
    <router-view/>
    <Footer/>

</template>

<script>
    import Footer from "./Footer";
    import Login from "./Login";
    import Register from "./Register";
    import Header from "./Header";

    export default {
        components: {
            Header,
            Footer,
            Login,
            Register
        }
    }
</script>
