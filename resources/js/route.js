import IndexComponent from './components/company/IndexComponent.vue';
import DetailsComponent from './components/company/DetailsComponent.vue';
import VueRouter from "vue-router";

const routes = [
    {
        name: 'home',
        path: '/',
        component: IndexComponent
    },
    {
        name: 'details',
        path: '/details/:id',
        component: DetailsComponent
    },
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
