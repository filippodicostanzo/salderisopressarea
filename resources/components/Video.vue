<template>
    <div class="card">
        <div class="card-header">
            <iframe width="560" height="315" :src="url_correct" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen v-if="source==='youtube'"></iframe>
            <div class="embed-responsive embed-responsive-16by9" v-else>
                <iframe class="embed-responsive-item" :src="url_correct"
                        frameborder='0' webkitAllowFullScreen mozallowfullscreen
                        allowFullScreen></iframe>
            </div>
        </div>
        <div class="card-body">
            <h2 class="text-center">{{vid.name}}</h2>
            <p class="text-justify" v-html="vid.description"></p>
        </div>
    </div>
</template>

<script>

    import url from 'url'


    export default {
        name: "Video",
        props: ['vid'],
        data: () => {
            return {
                source: '',
                url_correct: ''
            }
        },
        mounted() {
            var q = url.parse(this.vid.url, true);
            if (q.hostname.includes('youtu')){
                this.source = 'youtube';
                this.url_correct = 'https://www.youtube.com/embed'+q.pathname;
            }
            else {
                this.source = 'vimeo'
                this.url_correct='https://player.vimeo.com/video'+q.pathname
            }


        }
    }
</script>

<style lang="scss" scoped>
    iframe{
        width:100%;
        display: block;
    }
</style>
