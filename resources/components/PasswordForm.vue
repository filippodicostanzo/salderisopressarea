<template>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <form class="col-12" @submit.prevent="submit">
                <div class="form-group text-center">
                    <img src="/images/logo-blue.png">
                </div>
                <div class="form-group text-center">
                    <input type="password" class="m-auto w-50 form-control text-center" id="formGroupExampleInput2"
                           placeholder="Inserisci Password" v-model="fields.password">
                </div>

                <div class="font-weight-bold text-danger text-center mb-2" v-if="!response">
                    Password Errata
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Invia" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    export default {

        name: "PasswordForm",
        data() {
            return {
                fields: {},
                response:{}
            }
        },
        methods: {
            submit() {
                this.$http.post('/submit', this.fields).then((response) => {

                    if (response.data==='success') {
                        window.location.href = '/home';
                    }
                    else {
                        this.response = false;
                        console.log('failed');
                    }
                })

            }
        }
    }
</script>

<style scoped>

</style>
