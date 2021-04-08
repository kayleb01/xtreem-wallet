require('./bootstrap');

// Import modules...
import Vue from 'vue';
import VueRouter from 'vue-router';

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import { routes } from './routes';
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router,

    data ()	{
    	return {

    	};
    },




});

