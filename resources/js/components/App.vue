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
    import AddRule from "./AddRule";
    import Index from "./Index";
    import Home from "./Home";

    export default {
        components: {
            Home,
            Header,
            AddRule,
            Index
        }
    }
</script>
