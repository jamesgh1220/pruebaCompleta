require('./bootstrap');
import Vue from 'vue';

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from './components/citas/Home.vue';
import Citas from './components/citas/Mostrar.vue';
import Editar from './components/citas/Editar.vue';



const routes = [
        { path: '/', component: Home },
        { path: '/citalist', component: Citas },
        { path: '/edit/:id', component: Editar }
    ]
    /**
     * Next, we will create a fresh Vue application instance and attach it to
     * the page. Then, you may begin adding components to this application
     * or customize the JavaScript scaffolding to fit your unique needs.
     */
const router = new VueRouter({ routes });

const app = new Vue({
    el: '#app',
    router
});