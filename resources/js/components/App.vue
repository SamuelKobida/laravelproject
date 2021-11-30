<template>
    <div class="header">

        <Header/>
<AddRule/>
        <Index/>

    <div class="container">
        hello im app.vue
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
