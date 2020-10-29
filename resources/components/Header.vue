<template>
    <section id="slider" class="section slider relative">
        <div class="slide--item bg-overlay bg-overlay-theme bg-section"
             style="background-image: url('/images/background-slider.jpg')">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="slide--logo mt-100 wow fadeInUp animated" data-wow-duration="1s"
                             style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                            <a href="/home">
                                <img src="/images/logo.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="slide--container col-xs-12 col-sm-6 col-md-6 pt-100 wow fadeInUp animated"
                         data-wow-duration="1s"
                         style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <div class="slide--headline font-optimus">
                            <h1 class="text-light">Press Area<br>
                            </h1>
                        </div>
                        <div class="slide--bio mt-5 text-light">In questa sezione sono presenti i comunicati stampa
                            diffusi dall'Ufficio Comunicazione della Sal De Riso Costa d'Amalfi, la rassegna stampa,
                            logo aziendale, un archivio video e fotografico.
                        </div>
                        <div class="slide--action mt-5">
                            <a v-scroll-to="'#main'">
                                <button class="btn btn-orange">Vai alle Sezioni</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </div>
        <!-- .slide-item end -->
        <div class="elipsed-border-small">
            <svg id="elipsed" data-name="elipsed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 92">
                <path class="cls-1" d="M715,90c275.89,0,725-90,725-90V92H0V0S439.11,90,715,90Z"></path>
            </svg>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Header.vue"
    }
</script>

<style scoped>

</style>
