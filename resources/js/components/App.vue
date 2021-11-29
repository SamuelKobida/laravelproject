<template>
    <div class="header">

        <Header/>
        <AddRule/>

    <div class="container">
        hello im app.vue
    </div>

    </div>
</template>

<script>
    import Header from "./Header"
    import AddRule from "./AddRule";
    export default {
        components: {
            Header,
            AddRule
        }
    }
</script>
