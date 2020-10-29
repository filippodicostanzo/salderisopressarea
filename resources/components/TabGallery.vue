<template>
    <div>
        <div class="row pt-50">
            <div class="col-12 text-center">
                <h2>{{this.item.name}}</h2>
            </div>
        </div>
        <div class="row pt-50">
            <div class="col-12 text-center">
                <p v-html="this.item.description"></p>
            </div>
        </div>
        <div class="row pt-50" v-if="!this.photos.length">
            <div class="m-b-30">
                No images
            </div>
        </div>

        <div class="m-b-30" v-else>
            <CoolLightBox
                :items="this.photos"
                :index="index"
                :effect="'fade'"
                @close="index = null">
            </CoolLightBox>

            <div class="images-wrapper row pt-50">

                <div
                    class="col-sm-3 m-b-30"
                    v-for="(image, imageIndex) in this.photos" :key="imageIndex">

                    <div class="image" @click="index = imageIndex"
                         :style="{ 'background-image': 'url('+image.replace(/ /g,'%20')+')' }">
                    </div>
                    <p class="text-center mt-2">{{image.split('/').pop().split('?')[0].split('#')[0]}}</p>

                </div>
            </div>

        </div>
    </div>
</template>

<script>

    import CoolLightBox from 'vue-cool-lightbox'
    import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css'

    export default {
        name: "TabGallery",
        components: {CoolLightBox},
        props: ['gallery'],
        data: () => {
            return {
                item: [],
                index: null,
                photos: []
            }
        },
        mounted() {
            this.item = JSON.parse(this.gallery);
            this.photos = this.item.images.split(',');
        }
    }
</script>

<style scoped>
    .image {
        cursor: pointer;
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        height: 250px;
    }
</style>
