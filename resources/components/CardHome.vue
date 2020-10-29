<template>

        <div class="card">
            <a :href="id">
            <div class="card-header">
                <img :src="'/images/card-'+id+'.jpg'">
            </div>
            <div class="card-body text-center">
                <h2 class="card-title">{{title}}</h2>
                <p>{{desc}}</p>
                <a class="btn btn-primary" :href="id">Vai alla sezione</a>
            </div>
            </a>
        </div>

</template>

<script>
    export default {
        name: "CardHome",
        props: ['id', 'title','desc'],
        mounted() {
            console.log(this.id);
        }
    }
</script>

<style scoped>

</style>
