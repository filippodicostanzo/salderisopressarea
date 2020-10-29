<template>
    <div class="content-topbar container h-100">
        <div class="left-topbar">

        AAAAA
        </div>
        <div class="right-topbar">
            <div class="social">
                <a href="https://www.facebook.com/localidautore" target="_blank">
                    <span class="fab fa-facebook-f"></span>
                </a>

                <a href="#">
                    <span class="fab fa-instagram"></span>
                </a>

                <a href="https://www.youtube.com/user/localidautore" target="_blank">
                    <span class="fab fa-youtube"></span>
                </a>
            </div>


        </div>
    </div>
</template>

<script>


    export default {
        name: "TopBar",
        data() {
            return {
                info: {
                    weather: {
                        main: {
                            temp: ''
                        },
                        weather:
                            [{
                                id: 0
                            }]
                    },
                },
                weathericon: "wi wi-owm-",
            }
        },
        props:
            ['langs', 'locale'],

        beforeMount() {

        },


        async mounted() {

        },
        computed: {},
        methods: {}
        ,
        filters: {}

    }
</script>
