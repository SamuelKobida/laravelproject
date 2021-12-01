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

    export default {
        components: {
            Header,
            AddRule,
            Index
        }
    }
</script>
