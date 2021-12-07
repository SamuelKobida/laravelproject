<template>

    <div class="container-xl p-3">

        <h2> Hello world, Welcome to the BEST courier rule definition system!</h2>

        <div class="card border-primary mb-3 mt-3 "> <!-- 1 -->

            <div class="card-header">
                Informations:
            </div>

            <div class="card-body">
                <p class="card-text">text</p>
            </div>
        </div>

    <div class="row">

        <div class="col">


            <div class="card border-primary mb-3 "> <!-- 2 -->

                <div class="card-header">
                        Time & Date
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

    export default {
        name: "Home",
        components: {
        },
    }

    import $ from 'jquery';
    $(document).ready(function() {
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
        let dayName = date.toLocaleDateString("EN", { weekday: 'long' });
        let year = date.getFullYear();
        let day = date.getDate();
        let month = date.getMonth()+1;
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
