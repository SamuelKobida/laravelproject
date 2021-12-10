<template>

    <div class="container-xl p-3">

        <h2>Welcome!</h2>

        <div class="card border-primary mb-3 mt-3 "> <!-- 1 -->

            <div class="card-header">
                Database informations:
            </div>

            <div class="card-body">
                <tr v-for="rule in rules" :value="rule.pocetRules">
                    <p class="card-text">Number of rules: {{rule.pocetRules}}</p>
                </tr>

                <tr v-for="eshop in eshops" :value="eshop.pocetEshops">
                    <p class="card-text">Number of eShops: {{eshop.pocetEshops}}</p>
                </tr>

                <tr v-for="courier in couriers" :value="courier.pocetCouriers">
                    <p class="card-text">Number of couriers: {{courier.pocetCouriers}}</p>
                </tr>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <div class="card border-primary mb-3 "> <!-- 2 -->
                    <div class="card-header">
                        Time & Date:
                    </div>
                    <div class="card-body">
                        <p class="card-text timeanddate">Tuesday 6.4.1944 06:30:13</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card border-primary mb-3 "> <!-- 3 -->
                    <div class="card-header">
                        Authors:
                    </div>
                    <div class="card-body">
                        <p class="card-text">Bc. Adrián Valko</p>
                        <p class="card-text">Bc. Samuel Kobida</p>
                        <p class="card-text">Bc. Ján Hudec</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</template>

<script>

    import axios from "axios";

    export default {
        name: "Home",
        components: {},

        data() {
            return {
                rules: [],
                couriers: [],
                eshops: []
            }
        },
        mounted() {

            axios.get("http://localhost/laravelproject/public/api/countrules").then(response => {
                this.rules = response.data;
                console.log(response.data);
            }).catch(function (error) {
                console.log(error);
            });

            axios.get("http://localhost/laravelproject/public/api/counteshops").then(response => {
                this.eshops = response.data;
                console.log(response.data);
            }).catch(function (error) {
                console.log(error);
            });

            axios.get("http://localhost/laravelproject/public/api/countcouriers").then(response => {
                this.couriers = response.data;
                console.log(response.data);
            }).catch(function (error) {
                console.log(error);
            });

        },

    }

    import $ from 'jquery';

    $(document).ready(function () {
        clockUpdate();
        setInterval(clockUpdate, 1000);
    })

    function clockUpdate() {
        let date = new Date();

        function addZero(x) {
            if (x < 10) {
                return x = '0' + x;
            } else {
                return x;
            }
        }

        let dayName = date.toLocaleDateString("EN", {weekday: 'long'});
        let year = date.getFullYear();
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let h = addZero(date.getHours());
        let m = addZero(date.getMinutes());
        let s = addZero(date.getSeconds());
        $('.day').text(dayName);
        $('.time').text(h + ':' + m + ':' + s);
        $('.date').text(day + '.' + month + '.' + year);
        $('.timeanddate').text(dayName + '  ' + day + '.' + month + '.' + year + '  ' + h + ':' + m + ':' + s);
    }

</script>

<style scoped>

</style>
