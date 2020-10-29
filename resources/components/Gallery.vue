<template>
    <div class="card">
        <div class="card-header">
            <img :src="gallery.cover">
        </div>
        <div class="card-body">
            <h2 class="text-center">{{gallery.name}}</h2>
            <p class="text-justify" v-html="gallery.description"></p>
            <div class="btn-container">
                <div class="col-md-6 text-center">
                    <a :href="'galleries/'+ gallery.id_code" class="btn btn-primary">Vedi Photo</a>
                </div>
                <div class="col-md-6 text-center">
                    <a class="btn btn-primary" :href="'galleries/download-zip/'+gallery.id_code">Download</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Gallery",
        props: ['gallery'],
        mounted() {

        },
        methods: {
            download() {
                this.$http()
                console.log('download');
            }
        }

    }
</script>

<style lang="scss" scoped>

    img {
        width: 100%;
    }
    .btn-primary {
        width: 130px;
    }
</style>
