<template>
    <div class="footer">
        <div class="elipsed-border-down">
            <svg id="ellipse-down" data-name="ellipse-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 92">
                <path class="cls-1" d="M0,92V0H1440V92S990.89,2,715,2,0,92,0,92Z"></path>
            </svg>
        </div>
        <!-- Copyrights
            ============================================= -->
        <a id="back-to-top" class="back-to-top back-to-top-fixed" v-scroll-to="'#slider'"><span><i
            class="fa fa-chevron-up"></i></span></a>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <span>© 2020 made with <i class="fa fa-heart"></i> by</span> Locali D'Autore
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Footer.vue",
        created () {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed () {
            window.removeEventListener('scroll', this.handleScroll);
        },
        methods: {
            handleScroll (event) {
                let scroll = window.scrollY;
                const element = window.document.getElementById('back-to-top');
                if (scroll>500) {
                    element.classList.add("show");
                }
                else {
                    element.classList.remove("show");
                }
            }
        }
    }
</script>

<style scoped lang="scss">

    .footer {
        overflow: hidden;
        background-color: #2d3d8c;
        position: relative;
        color: white;
        padding-top: 50px;
        padding-bottom: 50px;

        .elipsed-border-down {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 9;

            .cls-1 {
                fill: #ffffff;
                fill-rule: evenodd;
            }
        }
    }

    .back-to-top {
        opacity: 0;
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 99999;
        width: 50px;
        height: 50px;
        padding: 10px 18px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        background-color: #2d3d8c;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        -webkit-transition: opacity .15s ease-in-out;
        -moz-transition: opacity .15s ease-in-out;
        -ms-transition: opacity .15s ease-in-out;
        -o-transition: opacity .15s ease-in-out;
        transition: opacity .15s ease-in-out;
    }

    .show {
        opacity: 1;
    }





</style>
