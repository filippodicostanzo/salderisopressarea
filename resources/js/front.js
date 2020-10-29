import Header from "../components/Header";
window.Vue = require('vue');
import TopBar from "../components/TopBar";
import PasswordForm from "../components/PasswordForm";
import axios from 'axios';
import VueRouter from 'vue-router'
import VueScrollTo from 'vue-scrollto';
import CardHome from "../components/CardHome";
import Document from "../components/Document";
import Video from "../components/Video";
import Logo from "../components/Logo";
import Gallery from "../components/Gallery";
import TabGallery from "../components/TabGallery";
import Footer from "../components/Footer";


Vue.prototype.$http = axios;
Vue.use(VueRouter);
Vue.use(VueScrollTo);


const router = new VueRouter({
    mode: 'history'
});

const app = new Vue({
    router,
    el: '#app',

    data() {
        return {}
    },
    created() {
        //this.$store.dispatch("fetchUsers", {self: this})
    },
    components: {
        'header-slide': Header,
        'app-footer' : Footer,
        'top-bar': TopBar,
        'password-form': PasswordForm,
        'card-home': CardHome,
        'app-document': Document,
        'app-video': Video,
        'app-logo': Logo,
        'app-gallery': Gallery,
        'tab-gallery': TabGallery
    }
});
