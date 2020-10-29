<template>
    <div class="card">
        <div class="card-header" :class="[type==='pdf' ? 'pdfHeader' : '',]">

            <img src="images/file-pdf.png" v-if="type=='pdf'">
            <img :src="logo.image" v-else>

        </div>
        <div class="card-body">
            <h2 class="text-center">{{logo.name}}</h2>
            <p class="text-justify" v-html="logo.description"></p>
            <div class="btn-container text-center">
                <button @click="dowloadImage(logo.name, logo.image)" class="btn btn-primary">Download</button>
            </div>
        </div>
    </div>
</template>

<script>
    import path from 'path'

    export default {
        name: "Logo",
        props: ['logo'],
        data: () => {
            return {
                type: ''
            }
        },
        mounted() {
            console.log(path.extname(this.logo.image));
            if (path.extname(this.logo.image) === '.pdf') {
                this.type = 'pdf'
            }
        },
        methods: {
            dowloadImage(name, image) {

                this.$http({
                    method: 'get',
                    url: image,
                    responseType: 'arraybuffer'
                })
                    .then(response => {
                        this.forceFileDownload(response, name, image)
                    })
                    .catch(() => console.log('error occured'))
            },

            forceFileDownload(response, name, image) {
                const url = window.URL.createObjectURL(new Blob([response.data]))
                const link = document.createElement('a')
                link.href = url
                link.setAttribute('download', name + path.extname(image)) //or any other extension
                document.body.appendChild(link)
                link.click()
            },
        }

    }
</script>

<style lang="scss" scoped>

    .pdfHeader {
        padding: 20px;
        text-align: center;
        img {
            max-width: 60%;
        }
    }

    img {
        width: 100%;
    }
</style>
