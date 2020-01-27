require('./bootstrap');
import VueRouter from "vue-router";
import router from "./route";
import App from './components/App.vue';

window.Vue = require('vue');
Vue.use(VueRouter);


const app = new Vue(
    Vue.util.extend(
 { router },
    App))
    .$mount('#app');
