<template>
    <div class="card">
        <div class="card-header">
            <img src="images/file-pdf.png">
        </div>
        <div class="card-body">
            <h2 class="text-center">{{doc.name}}</h2>
            <p class="text-justify" v-html="doc.description"></p>
            <div class="btn-container text-center">
                <a class="btn btn-primary" :href="doc.file" target="_blank">Download</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Document",
        props: ['doc'],
        mounted() {
            console.log(this.doc);
        }
    }
</script>

<style lang="scss" scoped>
    .card-header {
        padding: 20px;
        text-align: center;
    }

    img {
        width: 60%;
    }
</style>
